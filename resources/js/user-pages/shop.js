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
            : "text-white hover:text-gray-300";
        const priceTag =
            template.price > 0
                ? `<button class="p-2 bg-gray-800 bg-opacity-80 text-white rounded-full shadow-md hover:bg-opacity-100 transition">
                    <i class="fas fa-money-bill-wave text-sm"></i>
                  </button>`
                : "";

        const card = `
            <div class="max-w-[240px] bg-white rounded-lg shadow-xl overflow-hidden border border-gray-300">
                <div class="relative aspect-[3/4]">
                    <img class="w-full h-full object-cover" src="${endpoint}/${template["template-preview"]}" alt="${template.name}">
                    <div class="absolute bottom-2 right-2 flex space-x-2">
                        <button class="favorite-btn ${isFavorite} p-2 bg-gray-800 bg-opacity-80 text-white rounded-full shadow-md hover:bg-opacity-100 transition" data-id="${template.id}">
                            <i class="fas fa-heart text-lg"></i>
                        </button>
                        ${priceTag}
                        <a href="${endpoint}/${template["template-link"]}" class="p-2 bg-gray-800 bg-opacity-80 text-white rounded-full shadow-md hover:bg-opacity-100 transition">
                            <i class="fas fa-edit text-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="p-3">
                    <span class="text-[#6E24FF] font-semibold text-xs">${template.name}</span>
                    <div>${template.price}</div>
                    <p class="text-gray-600 text-xs mt-1">
                        ${template.price > 0 ? "Premium CV Template" : "Free CV Template"}
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
                this.classList.add("text-white", "hover:text-gray-300");
            } else {
                favorites.push(templateId);
                this.classList.add("text-red-500");
                this.classList.remove("text-white", "hover:text-gray-300");
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

document.addEventListener("DOMContentLoaded", fetchTemplates);
