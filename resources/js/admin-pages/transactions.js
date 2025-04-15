import { Grid, h } from "gridjs";

const access_token = localStorage.getItem("access_token");
const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;

let tableInstance;

function completeTransaction(id) {
    fetch(`${endpoint}/api/admin/transactions/complete/${id}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${access_token}`,
        },
    }).then(() => {
        tableInstance.refresh(); // Refresh the table
    });
}

function declineTransaction(id) {
    fetch(`${endpoint}/api/admin/transactions/decline/${id}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${access_token}`,
        },
    }).then(() => {
        tableInstance.refresh(); // Refresh the table
    });
}

class GridDatatable {
    init() {
        this.GridjsTableInit();
    }

    refresh() {
        this.GridjsTableInit();
    }

    GridjsTableInit() {
        fetch(`${endpoint}/api/admin/transactions/get/all-transactions`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${access_token}`,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (!data.length) return;

                const dataKeys = Object.keys(data[0]);

                const columns = [
                    ...dataKeys,
                    {
                        id: "actions",
                        name: "Actions",
                        formatter: (_, row) => {
                            const id = row.cells[0].data; // assuming ID is first column
                            return h("div", { className: "flex gap-2" }, [
                                h(
                                    "button",
                                    {
                                        className: "btn btn-outline-primary",
                                        onClick: () => completeTransaction(id),
                                    },
                                    "Complete"
                                ),
                                h(
                                    "button",
                                    {
                                        className: "btn btn-outline-warning",
                                        onClick: () => declineTransaction(id),
                                    },
                                    "Decline"
                                ),
                            ]);
                        },
                    },
                ];

                const dataValues = data.map((obj) => Object.values(obj));

                const tableContainer = document.getElementById("table-search");
                tableContainer.innerHTML = ""; // Clear previous grid

                new Grid({
                    columns: columns,
                    pagination: { limit: 5 },
                    search: true,
                    autoWidth: false,
                    data: dataValues,
                }).render(tableContainer);
            });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    tableInstance = new GridDatatable();
    tableInstance.init();
});
