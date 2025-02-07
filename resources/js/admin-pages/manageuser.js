import { Grid, h } from "gridjs/dist/gridjs.umd.js";
import 'gridjs/dist/gridjs.umd.js';

class GridDatatable {
    init() {
        this.GridjsTableInit();

        // Add event listener for inventory button clicks
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('inventory-btn')) {
                e.preventDefault();
                const userId = e.target.getAttribute('data-user-id');
                this.loadInventoryData(userId);
            }
        });
    }

    GridjsTableInit() {
        var access_token = localStorage.getItem('access_token');
        var data_key, data_value;
        const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;

        // Fetch accounts data
        fetch(endpoint + '/api/admin/data/accounts/get', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${access_token}`,
            }
        }).then((response) => {
            return response.json();
        }).then((data) => {
            data_key = Object.keys(data[0]);

            // Add the 'Actions' column dynamically
            data_key.push({
                name: 'Actions',
                formatter: (cell, row) => {
                    const rowId = row._cells[0].data;  // Get the ID from the first cell

                    const editUrl = manageUserUrl.replace('id-from-table', rowId);
                    const deleteUrl = `/delete/${rowId}`;

                    return h('div', {},
                        [
                            h('button', {
                                className: 'btn btn-outline-warning me-1',
                                onclick: () => window.location.href = editUrl // Redirect to edit page
                            }, 'Edit'),

                            h('button', {
                                className: 'btn btn-outline-info me-1 inventory-btn',
                                'data-user-id': rowId, // Store user ID in a data attribute
                                onclick: (event) => {
                                    event.preventDefault(); // Prevent default behavior
                                    new GridDatatable().loadInventoryData(rowId); // Call function
                                }
                            }, 'Inventory'),

                            h('button', {
                                className: 'btn btn-outline-danger me-1',
                                onclick: () => {
                                    if (confirm("Are you sure you want to delete this?")) {
                                        window.location.href = deleteUrl; // Redirect to delete
                                    }
                                }
                            }, 'Delete'),
                        ]

                    );
                },
            });

            // Map the data for the table
            data_value = data.map(obj => Object.values(obj));

            if (document.getElementById("table-search")) {
                // Initialize the Grid.js table with data
                new Grid({
                    columns: data_key,
                    pagination: {
                        limit: 5
                    },
                    search: true,
                    autoWidth: false,
                    data: data_value,
                }).render(document.getElementById("table-search"));
            }
        }).catch((error) => {
            console.error('Error fetching accounts data:', error);
        });
    }

    // Function to load inventory data
loadInventoryData(userId) {
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const access_token = localStorage.getItem('access_token');

    fetch(`${endpoint}/api/admin/templates/get/${userId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${access_token}`,
        }
    })
    .then((response) => response.json())
    .then((data) => {
        const availableTable = document.querySelector('.inventory-table');
        const usedTable = document.querySelector('.used-table');

        availableTable.innerHTML = ''; // Clear available inventory
        usedTable.innerHTML = ''; // Clear used inventory

        const availableItems = data.available || []; 
        const usedItems = data.used || []; 

        // Helper function to create Grid.js tables
        function createInventoryTable(container, items, title) {
            if (items.length > 0) {
                new Grid({
                    columns: [
                        { name: "ID", sort: true },
                        { name: "Name", sort: true },
                        { name: "Price", sort: true },
                        { 
                            name: "Preview",
                            formatter: (cell) => 
                                `<img src="${endpoint}/${cell}" width="50" height="50" style="border-radius:5px;">`
                        }
                    ],
                    data: items.map(item => [
                        item.id,
                        item.name,
                        `Rp ${parseInt(item.price).toLocaleString()}`, 
                        item['template-preview']
                    ]),
                    pagination: { limit: 5 },
                    search: true,
                    autoWidth: false
                }).render(container);
            } else {
                container.innerHTML = `<p class="text-muted mb-0">${title} is empty.</p>`;
            }
        }

        createInventoryTable(availableTable, availableItems, "Available Inventory");
        createInventoryTable(usedTable, usedItems, "Used Inventory");

    })
    .catch((error) => {
        console.error('Error fetching inventory data:', error);
        document.querySelector('.inventory-table').innerHTML = 
            '<p class="text-muted mb-0">Failed to load inventory data.</p>';
        document.querySelector('.used-table').innerHTML = 
            '<p class="text-muted mb-0">Failed to load inventory data.</p>';
    });
}

}

document.addEventListener('DOMContentLoaded', function () {
    new GridDatatable().init();
});
