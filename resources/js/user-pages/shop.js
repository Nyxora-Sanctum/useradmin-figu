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
    let currentOrderId = null;
    let pollInterval = null;

    // Payment Confirmation Modal
    const paymentConfirmModal = document.getElementById("paymentConfirmModal");
    const confirmModalTitle = document.getElementById("confirmModalTitle");
    const confirmModalDesc = document.getElementById("confirmModalDesc"); // <- this was missing
    const confirmPayBtn = document.getElementById("confirmPayBtn");

    // Invoice Overlay
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
            const response = await fetch(
                `${endpoint}/api/templates/get/all-templates`,
                {
                    method: "GET",
                    headers: { Authorization: `Bearer ${accessToken}` },
                }
            );

            if (!response.ok) throw new Error("Failed to fetch templates");

            templatesData = await response.json();
            displayTemplates();
        } catch (error) {
            console.error("Error fetching templates:", error);
        }
    }

    function displayTemplates() {
        templateList.innerHTML = "";
        const searchText = searchInput ? searchInput.value.toLowerCase() : "";
        const selectedFilter = filterSelect ? filterSelect.value : "all";

        const filteredTemplates = templatesData.filter((template) => {
            const isMatchingName = template.name
                .toLowerCase()
                .includes(searchText);
            const isMatchingCategory =
                selectedFilter === "all" ||
                (selectedFilter === "free" && template.price == 0) ||
                (selectedFilter === "premium" && template.price > 0);

            return isMatchingName && isMatchingCategory;
        });

        filteredTemplates.forEach((template) => {
            const priceText =
                template.price > 0 ? `Rp ${template.price}` : "Gratis";
            const categoryText =
                template.price > 0 ? "Premium CV Template" : "Free CV Template";

            const templateCard = `
                <div class="max-w-[240px] bg-white rounded-lg shadow-xl overflow-hidden border border-gray-300">
                    <div class="relative aspect-[3/4]">
                        <img class="w-full h-full object-cover" src="${endpoint}/${
                template["template-preview"]
            }" alt="${template.name}">
                    </div>
                    
                    <div class="p-3">
                        <span class="text-[#6E24FF] font-semibold text-xs">${
                            template.name
                        }</span>
                        <div>${priceText}</div>
                        <p class="text-gray-600 text-xs mt-1">${categoryText}</p>

                        <div class="mt-3 flex justify-between">
                            ${
                                template.price > 0
                                    ? ` 
                                <button class="buy-btn px-3 py-1 bg-[#6E24FF] text-white rounded-full shadow-md hover:bg-[#4A1AB0] transition"
                                    data-template-id="${template.unique_cv_id}">
                                    Beli
                                </button>
                            ` : ""
                            }

                            <button class="preview-btn px-3 py-1 bg-gray-800 text-white rounded-full shadow-md hover:bg-[#141920] transition"
                                data-template-id="${template.unique_cv_id}">
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
                const template = templatesData.find(
                    (t) => t.unique_cv_id == templateId
                );

                if (!template) return;

                selectedTemplate = template;

                modalImage.src = `${endpoint}/${template["template-preview"]}`;
                modalTitle.textContent = template.name;
                modalCategory.textContent =
                    template.price > 0
                        ? "Premium CV Template"
                        : "Free CV Template";
                modalPrice.textContent =
                    template.price > 0 ? `Rp ${template.price}` : "Gratis";

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

    // Buy from preview modal
    if (buyButton) {
        buyButton.addEventListener("click", function () {
            if (!selectedTemplate) {
                alert("Template tidak valid.");
                return;
            }

            previewModal.classList.add("hidden");

            confirmModalTitle.textContent = `Beli Template: ${selectedTemplate.name}`;
            confirmModalDesc.textContent = `Harga: ${
                selectedTemplate.price > 0
                    ? "Rp " + selectedTemplate.price
                    : "Gratis"
            }`;

            paymentConfirmModal.classList.remove("hidden");
        });
    }

    // Buy from card
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("buy-btn")) {
            const templateId = event.target.getAttribute("data-template-id");
            const template = templatesData.find(
                (t) => t.unique_cv_id == templateId
            );

            if (template) {
                selectedTemplate = template;

                confirmModalTitle.textContent = `Beli Template: ${template.name}`;
                confirmModalDesc.textContent = `Harga: ${
                    template.price > 0 ? "Rp " + template.price : "Gratis"
                }`;

                paymentConfirmModal.classList.remove("hidden");
            }
        }
    });

    // Confirm payment
    if (confirmPayBtn) {
        confirmPayBtn.addEventListener("click", async function () {
            if (!selectedTemplate) {
                alert("Template tidak ditemukan.");
                return;
            }

            paymentConfirmModal.classList.add("hidden");
            console.log(selectedTemplate.unique_cv_id)
            
            try {
                const response = await fetch(`${endpoint}/api/transaction/buy/`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${accessToken}`,
                    },
                    body: JSON.stringify({
                        unique_cv_id: selectedTemplate.unique_cv_id,
                    }),
                });

                const data = await response.json();

                if (data && data.redirect_url) {
                    window.open(data.redirect_url, "_blank");

                    if (data.order_id) {
                        startTransactionPolling(data.order_id);
                    }

                    loadingOverlay.classList.add("active"); // show loading while waiting
                } else {
                    alert("Gagal mendapatkan link pembayaran dari server.");
                }
            } catch (error) {
                console.error("Error saat proses pembayaran:", error);
                alert("Terjadi kesalahan saat memproses pembayaran.");
            }
        });
    }

    function startTransactionPolling(orderId) {
        currentOrderId = orderId;

        if (pollInterval) clearInterval(pollInterval);
        pollInterval = setInterval(
            () => checkTransactionStatus(orderId),
            10000
        );

        document.addEventListener("visibilitychange", () => {
            if (document.visibilityState === "visible") {
                checkTransactionStatus(orderId);
            }
        });
    }

    // Check transaction status
    async function checkTransactionStatus(orderId) {
        if (!orderId) return;

        loadingOverlay.classList.add("active");

        try {
            const response = await fetch(
                `${endpoint}/api/transaction/${orderId}`,
                {
                    method: "GET",
                    headers: {
                        Authorization: `Bearer ${accessToken}`,
                    },
                }
            );

            const data = await response.json();
            console.log("Status check:", data);

            if (data.status === "paid") {
                clearInterval(pollInterval);
                pollInterval = null;
                loadingOverlay.classList.remove("active");

                invoiceCode.textContent =
                    data.invoice_id ||
                    "INV-" + Math.floor(Math.random() * 999999);
                invoiceOverlay.classList.remove("hidden");
            } else {
                // Keep loading overlay active until success
                loadingOverlay.classList.add("active");
            }
        } catch (error) {
            console.error("Error fetching transaction status:", error);
        }
    }


    // Close overlays/modals
    if (closeInvoiceOverlay) {
        closeInvoiceOverlay.addEventListener("click", () =>
            invoiceOverlay.classList.add("hidden")
        );
    }
    if (closeModal)
        closeModal.addEventListener("click", () =>
            previewModal.classList.add("hidden")
        );
    if (closeModalBtn)
        closeModalBtn.addEventListener("click", () =>
            previewModal.classList.add("hidden")
        );

    // Check if elements exist before adding event listeners
    if (searchInput) searchInput.addEventListener("input", displayTemplates);
    if (filterSelect) filterSelect.addEventListener("change", displayTemplates);

    fetchTemplates();
});
