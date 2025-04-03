document.addEventListener("DOMContentLoaded", function () {
    const accessToken = localStorage.getItem("access_token");
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const templateList = document.getElementById("template-list");
    const searchInput = document.getElementById("search");
    const filterSelect = document.getElementById("filter");
    const badge = document.getElementById("favBadge");

    if (!templateList) {
        console.error("Element #template-list tidak ditemukan di halaman.");
        return;
    }

    let templatesData = [];

    // Modal Elements
    const previewModal = document.getElementById("previewModal");
    const modalImage = document.getElementById("modalImage");
    const modalTitle = document.getElementById("modalTitle");
    const modalCategory = document.getElementById("modalCategory");
    const modalPrice = document.getElementById("modalPrice");
    const buyButton = document.getElementById("buyButton");
    const closeModal = document.getElementById("closeModal");
    const closeModalBtn = document.getElementById("closeModalBtn");

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
                                <button class="px-3 py-1 bg-purple-600 text-white rounded-full shadow-md hover:bg-purple-700 transition">
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
                previewModal.classList.remove("hidden");
            });
        });
    }


    document.addEventListener("DOMContentLoaded", function () {
        const paymentModal = document.getElementById("paymentModal");
        const closePaymentModal = document.getElementById("closePaymentModal");
        const closePaymentBtn = document.getElementById("closePaymentBtn");
        const confirmPayment = document.getElementById("confirmPayment");
    
        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("buy-btn")) {
                paymentModal.classList.remove("hidden");
            }
        });
    
        closePaymentModal.addEventListener("click", () => paymentModal.classList.add("hidden"));
        closePaymentBtn.addEventListener("click", () => paymentModal.classList.add("hidden"));
    
        confirmPayment.addEventListener("click", function () {
            window.location.href = "https://midtrans.com/payment-link";
        });
    });
    
    // Event Listener untuk pencarian
    searchInput.addEventListener("input", displayTemplates);

    // Event Listener untuk filter kategori
    filterSelect.addEventListener("change", displayTemplates);

    // Event Listener untuk Menutup Modal
    closeModal.addEventListener("click", () => previewModal.classList.add("hidden"));
    closeModalBtn.addEventListener("click", () => previewModal.classList.add("hidden"));

    fetchTemplates();
});
