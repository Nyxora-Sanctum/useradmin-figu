document.addEventListener("DOMContentLoaded", function () {
    const accessToken = localStorage.getItem("access_token");
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const loadingOverlay = document.getElementById("loadingOverlay");
    const templateList = document.getElementById("template-list");
    const searchInput = document.getElementById("search");

    let templatesData = [];

    async function fetchTemplates() {
        loadingOverlay.classList.add("active");
        try {
            const response = await fetch(`${endpoint}/api/templates/inventory`,
                {
                    method: "GET",
                    headers: {
                        Authorization: `Bearer ${accessToken}`,
                    },
                }
            );

            if (!response.ok) throw new Error("Gagal mengambil data template");

            templatesData = await response.json();
            displayTemplates();
        } catch (error) {
            console.error("Error:", error);
        }
    }

    function displayTemplates() {

        if (!templateList) return;

        const searchText = searchInput?.value.toLowerCase() || "";

        const filteredTemplates = templatesData.filter((template) => {
            return template.name.toLowerCase().includes(searchText);
        });

        templateList.innerHTML = "";

        filteredTemplates.forEach((template) => {
            const card = `
            <div class="bg-white border p-3 rounded shadow text-sm max-w-[240px]">
                <img class="w-full aspect-[3/4] object-cover mb-2 cursor-pointer preview-trigger" 
                     src="${endpoint}/${template["template-preview"]}" 
                     alt="${template.name}" 
                     data-src="${endpoint}/${template["template-preview"]}">
                <div class="font-semibold mb-2">${template.name}</div> <!-- Menambahkan margin bottom di sini -->
                <div class="flex gap-2 flex-wrap">
                    <button class="preview-btn bg-gray-700 text-white px-2 py-1 rounded text-xs" 
                            data-src="${endpoint}/${template["template-preview"]}">Preview</button>
                    <button class="edit-btn bg-blue-600 text-white px-2 py-1 rounded text-xs" 
                            data-id="${template.unique_cv_id}">Gunakan</button>
                    <button class="delete-btn bg-red-600 text-white px-2 py-1 rounded text-xs" 
                            data-id="${template.unique_cv_id}">Hapus</button>
                </div>
            </div>
        `;
            templateList.innerHTML += card;
        });
        loadingOverlay.classList.remove("active");
        addInventoryEventListeners();
    }

    function addInventoryEventListeners() {
        document.querySelectorAll(".edit-btn").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                const id = e.target.getAttribute("data-id");
                window.location.href = `/editor/${id}`;
            });
        });

        document.querySelectorAll(".delete-btn").forEach((btn) => {
            btn.addEventListener("click", async (e) => {
                const id = e.target.getAttribute("data-id");
                const confirmed = confirm("Yakin ingin menghapus template ini?");
                if (confirmed) {
                    try {
                        const res = await fetch(`${endpoint}/api/templates/delete/${id}`, {
                            method: "DELETE",
                            headers: {
                                Authorization: `Bearer ${accessToken}`,
                            },
                        });

                        if (!res.ok) throw new Error("Gagal menghapus template");

                        alert("Template berhasil dihapus.");
                        fetchTemplates();
                    } catch (error) {
                        console.error("Gagal hapus template:", error);
                        alert("Terjadi kesalahan saat menghapus.");
                    }
                }
            });
        });

        document.querySelectorAll(".preview-btn, .preview-trigger").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                const src = e.currentTarget.getAttribute("data-src");
                const modal = document.getElementById("preview-modal");
                const img = document.getElementById("preview-image");
                img.src = src;
                modal.classList.remove("hidden");
            });
        });

        document.getElementById("close-modal")?.addEventListener("click", () => {
            document.getElementById("preview-modal").classList.add("hidden");
        });

        document.getElementById("preview-modal")?.addEventListener("click", (e) => {
            if (e.target.id === "preview-modal") {
                e.target.classList.add("hidden");
            }
        });
    }

    // Trigger search
    searchInput?.addEventListener("input", () => {
        displayTemplates();
    });

    // Panggil fetch pertama kali
    fetchTemplates();
});
