document.addEventListener("DOMContentLoaded", function () {
    const accessToken = localStorage.getItem("access_token");
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;

    const templateList = document.getElementById("template-list");
    const searchInput = document.getElementById("search");
    const filterSelect = document.getElementById("filter");
    const loadingOverlay = document.getElementById("loadingOverlay");
    // Modal Preview Elements
    const previewModal = document.getElementById("previewModal");
    const modalImage = document.getElementById("modalImage");
    const modalTitle = document.getElementById("modalTitle");
    const modalCategory = document.getElementById("modalCategory");
    const modalPrice = document.getElementById("modalPrice");
    const buyButton = document.getElementById("buyButton");
    const closeModal = document.getElementById("closeModal");
    const closeModalBtn = document.getElementById("closeModalBtn");

    // Modal Konfirmasi
    const paymentConfirmModal = document.getElementById("paymentConfirmModal");
    const confirmModalTitle = document.getElementById("confirmModalTitle");
    
    const confirmPayBtn = document.getElementById("confirmPayBtn");

    // Overlay Invoice
    const invoiceOverlay = document.getElementById("invoiceOverlay");
    const invoiceCode = document.getElementById("invoiceCode");
    const closeInvoiceOverlay = document.getElementById("closeInvoiceOverlay");

    if (!templateList) {
        console.error("Element #template-list tidak ditemukan di halaman.");
        return;
    }

    let templatesData = [];
    let selectedTemplate = null;

    async function fetchTemplates() {
        loadingOverlay.classList.add("active");
        try {
            const response = await fetch(`${endpoint}/api/templates/get/all-templates`, {
                method: "GET",
                headers: { Authorization: `Bearer ${accessToken}` },
            });

            if (!response.ok) throw new Error("Failed to fetch templates");

            templatesData = await response.json();
            displayTemplates();
        } catch (error) {
            console.error("Error fetching templates:", error);
        }
    }

    function displayTemplates() {
        templateList.innerHTML = "";
        const searchText = searchInput.value.toLowerCase();
        const selectedFilter = filterSelect.value;

        const filteredTemplates = templatesData.filter(template => {
            const isMatchingName = template.name.toLowerCase().includes(searchText);
            const isMatchingCategory = selectedFilter === "all" ||
                (selectedFilter === "free" && template.price == 0) ||
                (selectedFilter === "premium" && template.price > 0);

            return isMatchingName && isMatchingCategory;
        });

        filteredTemplates.forEach((template) => {
            const priceText = template.price > 0 ? `Rp ${template.price}` : "Gratis";
            const categoryText = template.price > 0 ? "Premium CV Template" : "Free CV Template";

            const templateCard = `
                <div class="max-w-[240px] bg-white rounded-lg shadow-xl overflow-hidd    en border border-gray-300">
                    <div class="relative aspect-[3/4]">
                        <img class="w-full h-full object-cover" src="${endpoint}/${template["template-preview"]}" alt="${template.name}">
                    </div>
                    
                    <div class="p-3">
                        <span class="text-[#6E24FF] font-semibold text-xs">${template.name}</span>
                        <div>${priceText}</div>
                        <p class="text-gray-600 text-xs mt-1">${categoryText}</p>

                        <div class="mt-3 flex justify-between">
                            ${template.price > 0 ? ` 
                                <button class="buy-btn px-3 py-1 bg-[#6E24FF] text-white rounded-full shadow-md hover:bg-[#4A1AB0] transition"
                                    data-template-id="${template.id}">
                                    Beli
                                </button>
                            ` : ""}

                            <button class="preview-btn px-3 py-1 bg-gray-800 text-white rounded-full shadow-md hover:bg-[#141920] transition"
                                data-template-id="${template.id}">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            `;
            templateList.innerHTML += templateCard;
        });
        loadingOverlay.classList.remove("active");
        addPreviewEventListeners();
    }

    function addPreviewEventListeners() {
        document.querySelectorAll(".preview-btn").forEach((btn) => {
            btn.addEventListener("click", function () {
                const templateId = this.getAttribute("data-template-id");
                const template = templatesData.find(t => t.id == templateId);

                if (!template) return;

                selectedTemplate = template;

                modalImage.src = `${endpoint}/${template["template-preview"]}`;
                modalTitle.textContent = template.name;
                modalCategory.textContent = template.price > 0 ? "Premium CV Template" : "Free CV Template";
                modalPrice.textContent = template.price > 0 ? `Rp ${template.price}` : "Gratis";

                // Tampilkan tombol beli hanya jika template berbayar
                if (buyButton) {
                    if (template.price > 0) {
                        buyButton.classList.remove("hidden");
                    } else {
                        buyButton.classList.add("hidden");
                    }
                }

                previewModal.classList.remove("hidden");
            });
        });
    }

    // Tombol Beli dalam Modal Preview
    if (buyButton) {
        buyButton.addEventListener("click", function () {
            if (!selectedTemplate) {
                alert("Template tidak valid.");
                return;
            }

            previewModal.classList.add("hidden");

            confirmModalTitle.textContent = `Beli Template: ${selectedTemplate.name}`;
            confirmModalDesc.textContent = `Harga: ${selectedTemplate.price > 0 ? 'Rp ' + selectedTemplate.price : 'Gratis'}`;

            paymentConfirmModal.classList.remove("hidden");
        });
    }

    // Klik tombol "Beli" dari Card
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("buy-btn")) {
            const templateId = event.target.getAttribute("data-template-id");
            const template = templatesData.find(t => t.id == templateId);

            if (template) {
                selectedTemplate = template;

                confirmModalTitle.textContent = `Beli Template: ${template.name}`;
                confirmModalDesc.textContent = `Harga: ${template.price > 0 ? 'Rp ' + template.price : 'Gratis'}`;

                paymentConfirmModal.classList.remove("hidden");
            }
        }
    });

    // Tombol Bayar Sekarang
    if (confirmPayBtn) {
        confirmPayBtn.addEventListener("click", async function () {
            if (!selectedTemplate) {
                alert("Template tidak ditemukan.");
                return;
            }

            paymentConfirmModal.classList.add("hidden");

            try {
                const response = await fetch(`${endpoint}/api/templates/buy/${selectedTemplate.id}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${accessToken}`
                    }
                });

                const data = await response.json();

                if (data && data.payment_url) {
                    window.open(data.payment_url, '_blank');

                    setTimeout(() => {
                        invoiceCode.textContent = data.invoice || "INV-" + Math.floor(Math.random() * 999999);
                        invoiceOverlay.classList.remove("hidden");
                    }, 3000);
                } else {
                    alert("Gagal mendapatkan link pembayaran dari server.");
                }
            } catch (error) {
                console.error("Error saat proses pembayaran:", error);
                alert("Terjadi kesalahan saat memproses pembayaran.");
            }
        });
    }

    // Tutup overlay invoice
    if (closeInvoiceOverlay) {
        closeInvoiceOverlay.addEventListener("click", () => invoiceOverlay.classList.add("hidden"));
    }

    // Tutup modals
    if (closeModal) closeModal.addEventListener("click", () => previewModal.classList.add("hidden"));
    if (closeModalBtn) closeModalBtn.addEventListener("click", () => previewModal.classList.add("hidden"));

    if (searchInput) searchInput.addEventListener("input", displayTemplates);
    if (filterSelect) filterSelect.addEventListener("change", displayTemplates);

    fetchTemplates();
});
