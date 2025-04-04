document.addEventListener("DOMContentLoaded", function () {
    const accessToken = localStorage.getItem("access_token");
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const templateList = document.getElementById("template-list");
    const searchInput = document.getElementById("search");
    const filterSelect = document.getElementById("filter");

    if (!templateList) {
        console.error("Element #template-list tidak ditemukan di halaman.");
        return;
    }

    let templatesData = [];
    let selectedTemplate = null;

    // Modal Elements
    const previewModal = document.getElementById("previewModal");
    const modalImage = document.getElementById("modalImage");
    const modalTitle = document.getElementById("modalTitle");
    const modalCategory = document.getElementById("modalCategory");
    const modalPrice = document.getElementById("modalPrice");
    const buyButton = document.getElementById("buyButton");
    const closeModal = document.getElementById("closeModal");
    const closeModalBtn = document.getElementById("closeModalBtn");

    // Modal Konfirmasi Pembayaran
    const paymentConfirmModal = document.getElementById("paymentConfirmModal");
    const confirmModalTitle = document.getElementById("confirmModalTitle");
    const confirmModalDesc = document.getElementById("confirmModalDesc");
    const confirmPayBtn = document.getElementById("confirmPayBtn");

    // Overlay Invoice
    const invoiceOverlay = document.getElementById("invoiceOverlay");
    const invoiceCode = document.getElementById("invoiceCode");
    const closeInvoiceOverlay = document.getElementById("closeInvoiceOverlay");

    async function fetchTemplates() {
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
                <div class="max-w-[240px] bg-white rounded-lg shadow-xl overflow-hidden border border-gray-300">
                    <div class="relative aspect-[3/4]">
                        <img class="w-full h-full object-cover" src="${endpoint}/${template["template-preview"]}" alt="${template.name}">
                    </div>
                    
                    <div class="p-3">
                        <span class="text-[#6E24FF] font-semibold text-xs">${template.name}</span>
                        <div>${priceText}</div>
                        <p class="text-gray-600 text-xs mt-1">${categoryText}</p>

                        <div class="mt-3 flex justify-between">
                            ${template.price > 0 ? ` 
                                <button class="buy-btn px-3 py-1 bg-purple-600 text-white rounded-full shadow-md hover:bg-purple-700 transition"
                                    data-template-id="${template.id}">
                                    Beli
                                </button>
                            ` : ""}

                            <button class="preview-btn px-3 py-1 bg-gray-800 text-white rounded-full shadow-md hover:bg-gray-900 transition"
                                data-image="${endpoint}/${template["template-preview"]}" 
                                data-title="${template.name}" 
                                data-category="${categoryText}" 
                                data-price="${priceText}">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
            `;
            templateList.innerHTML += templateCard;
        });

        addPreviewEventListeners();
    }

    function addPreviewEventListeners() {
        document.querySelectorAll(".preview-btn").forEach((btn) => {
            btn.addEventListener("click", function () {
                modalImage.src = this.getAttribute("data-image");
                modalTitle.textContent = this.getAttribute("data-title");
                modalCategory.textContent = this.getAttribute("data-category");
                modalPrice.textContent = this.getAttribute("data-price");

                const template = templatesData.find(t => t.name === this.getAttribute("data-title"));
                selectedTemplate = template || null;

                previewModal.classList.remove("hidden");
            });
        });
    }

    // Beli langsung dari card
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

    // Beli dari dalam modal preview
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

    // Klik tombol "Bayar Sekarang"
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

                    // Simulasi delay (anggap Midtrans sukses setelah 3 detik)
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
