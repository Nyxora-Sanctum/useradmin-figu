const accessToken = localStorage.getItem("access_token");
const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
const cardContainer = document.getElementById("cardContainer");

async function fetchTemplates() {
    try {
        const response = await fetch(
            `${endpoint}/api/templates/get/all-templates`,
            {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${accessToken}`,
                },
            }
        );

        if (!response.ok) {
            throw new Error("Failed to fetch templates");
        }

        const templates = await response.json();
        renderCards(templates);
    } catch (error) {
        console.error("Error fetching templates:", error);
    }
}

function renderCards(templates) {
    cardContainer.innerHTML = ""; // Bersihkan sebelum render ulang

    const favorites = JSON.parse(localStorage.getItem("favorites")) || [];

    templates.forEach((template) => {
        const isFavorite = favorites.includes(template.id.toString())
            ? "text-red-500"
            : "text-[#6E24FF] hover:text-[#5A1EDB]";
        const priceTag =
            template.price > 0
                ? `<button class="text-[#6E24FF] hover:text-[#5A1EDB] p-1 bg-white rounded-full shadow-md">
            <i class="fas fa-money-bill-wave text-sm"></i>
        </button>`
                : "";

        const card = `
            <div class="max-w-[240px] bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                <div class="relative aspect-[3/4]">
                    
                    <img class="w-full h-full object-cover" src="${endpoint}/${
            template["template-preview"]
        }" alt="${template.name}">
                    <div class="absolute top-2 right-2 flex space-x-2">
                        <button class="favorite-btn ${isFavorite} p-1 bg-white rounded-full shadow-md" data-id="${
            template.id
        }">
                            <i class="fas fa-heart text-sm"></i>
                        </button>
                        ${priceTag}
                        <a href="${endpoint}/${
            template["template-link"]
        }" class="text-[#6E24FF] hover:text-[#5A1EDB] p-1 bg-white rounded-full shadow-md">
                            <i class="fas fa-edit text-sm"></i>
                        </a>
                    </div>
                </div>
                <div class="p-3">
                    <span class="text-[#6E24FF] font-semibold text-xs">${
                        template.name
                    }</span>
                    <div>${template.price}</div>
                    <p class="text-gray-600 text-xs mt-1">
                        ${
                            template.price > 0
                                ? "Premium CV Template"
                                : "Free CV Template"
                        }
                    </p>
                </div>
            </div>
        `;
        cardContainer.innerHTML += card;
    });

    addFavoriteEventListeners();
}

function addFavoriteEventListeners() {
    const favoriteButtons = document.querySelectorAll(".favorite-btn");
    favoriteButtons.forEach((btn) => {
        btn.addEventListener("click", function () {
            const templateId = this.getAttribute("data-id");
            let favorites = JSON.parse(localStorage.getItem("favorites")) || [];

            if (favorites.includes(templateId)) {
                favorites = favorites.filter((id) => id !== templateId);
                this.classList.remove("text-red-500");
                this.classList.add("text-[#6E24FF]", "hover:text-[#5A1EDB]");
            } else {
                favorites.push(templateId);
                this.classList.add("text-red-500");
                this.classList.remove("text-[#6E24FF]", "hover:text-[#5A1EDB]");
            }

            localStorage.setItem("favorites", JSON.stringify(favorites));
            updateFavoriteBadge();
        });
    });
}

function updateFavoriteBadge() {
    let favorites = JSON.parse(localStorage.getItem("favorites")) || [];
    const badge = document.getElementById("favBadge");
    if (badge) {
        badge.textContent = favorites.length;
        badge.classList.toggle("hidden", favorites.length === 0);
    }
}

// Panggil fetchTemplates saat halaman dimuat
document.addEventListener("DOMContentLoaded", fetchTemplates);
