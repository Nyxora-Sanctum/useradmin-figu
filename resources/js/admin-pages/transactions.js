let tableInstance;

function completeTransaction(id) {
    fetch(endpoint + "/api/admin/transactions/complete/" + id, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${access_token}`,
        },
    }).then(() => {
        tableInstance.GridjsTableInit(); // Refresh the table
    });
}

function declineTransaction(id) {
    fetch(endpoint + "/api/admin/transactions/decline/" + id, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${access_token}`,
        },
    }).then(() => {
        tableInstance.GridjsTableInit(); // Refresh the table
    });
}

class GridDatatable {
    init() {
        this.GridjsTableInit();
    }

    GridjsTableInit() {
        const access_token = localStorage.getItem("access_token");
        const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;

        fetch(endpoint + "/api/admin/transactions/get/all-transactions", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${access_token}`,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                const data_key = Object.keys(data[0]);

                // Add actions column
                data_key.push({
                    id: "actions",
                    name: "Actions",
                    formatter: (cell, row) => {
                        return h("div", { className: "flex gap-2" }, [
                            h(
                                "button",
                                {
                                    className: "btn btn-outline-primary",
                                    onClick: () =>
                                        completeTransaction(row.cells[1].data),
                                },
                                "Complete"
                            ),
                            h(
                                "button",
                                {
                                    className: "btn btn-outline-warning",
                                    onClick: () =>
                                        declineTransaction(row.cells[1].data),
                                },
                                "Decline"
                            ),
                        ]);
                    },
                });

                const data_value = data.map((obj) => Object.values(obj));

                const tableContainer = document.getElementById("table-search");
                tableContainer.innerHTML = ""; // Clear previous grid

                new Grid({
                    columns: data_key,
                    pagination: {
                        limit: 5,
                    },
                    search: true,
                    autoWidth: false,
                    data: data_value,
                }).render(tableContainer);
            });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    tableInstance = new GridDatatable();
    tableInstance.init();
});
