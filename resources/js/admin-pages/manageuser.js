import { Grid, h } from "gridjs/dist/gridjs.umd.js";
import 'gridjs/dist/gridjs.umd.js';

var userid;

function showToast(message, delay = 5000) {
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        document.body.appendChild(toastContainer);
    }

    let toastId = 'toast-' + new Date().getTime();
    let toastHTML = `
        <div id="${toastId}" class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="${delay}">
            <div class="toast-header">
                <div class="auth-logo me-auto">
                    <img class="logo-dark" src="/images/logo-dark.png" alt="logo-dark" height="18" />
                    <img class="logo-light" src="/images/logo-light.png" alt="logo-light" height="18" />
                </div>
                <small class="text-muted">Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">${message}</div>
        </div>
    `;

    toastContainer.insertAdjacentHTML('beforeend', toastHTML);
    let toastElement = document.getElementById(toastId);
    let toast = new bootstrap.Toast(toastElement);
    toast.show();

    toastElement.addEventListener('hidden.bs.toast', function () {
        toastElement.remove();
    });
}

class GridDatatable {
    init() {
        this.GridjsTableInit();

        document.addEventListener('click', (e) => {
            const btn = e.target.closest('.inventory-btn');
            if (btn) {
                e.preventDefault();
                const userId = btn.getAttribute('data-user-id');
                if (userId) {
                    this.loadInventoryData(userId);
                }
            }
        });
    }

    GridjsTableInit() {
        var access_token = localStorage.getItem('access_token');
        const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
        var data_key, data_value;

        fetch(endpoint + '/api/admin/data/accounts/get', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${access_token}`,
            }
        })
        .then(response => response.json())
        .then(data => {
            data_key = Object.keys(data[0]);
            data_key.push({
                name: 'Actions',
                formatter: (cell, row) => {
                    const rowId = row._cells[0].data;

                    const editUrl = manageUserUrl.replace('id-from-table', rowId);
                    const deleteUrl = endpoint+`/api/admin/accounts/delete/${rowId}`;

                    return h('div', {},
                        [
                            h('button', {
                                className: 'btn btn-outline-warning me-1',
                                onclick: () => window.location.href = editUrl
                            }, 'Edit'),

                            h('button', {
                                className: 'btn btn-outline-info me-1 inventory-btn',
                                'data-user-id': rowId
                            }, 'Inventory'),

                            h('button', {
                                className: 'btn btn-outline-danger me-1',
                                onclick: () => {
                                    if (confirm("Are you sure you want to delete this?")) {
                                        fetch(deleteUrl, {
                                            method: 'DELETE',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': `Bearer ${localStorage.getItem('access_token')}`
                                            }
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Failed to delete the account.');
                                            }
                                            return response.json();
                                        })
                                        .then(() => {
                                            showToast("User deleted successfully", 3000);
                                            location.reload(); // Refresh the table to reflect changes
                                        })
                                        .catch(error => {
                                            console.error('Error deleting account:', error);
                                            showToast("Failed to delete the user.", 5000);
                                        });
                                    }
                                }
                            }, 'Delete')
                            ,
                        ]
                    );
                },
            });

            data_value = data.map(obj => Object.values(obj));

            if (document.getElementById("table-search")) {
                new Grid({
                    columns: data_key,
                    pagination: { limit: 5 },
                    search: true,
                    autoWidth: false,
                    data: data_value,
                }).render(document.getElementById("table-search"));
            }
        })
        .catch(error => {
            console.error('Error fetching accounts data:', error);
        });
    }

loadInventoryData(userId) {
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const access_token = localStorage.getItem('access_token');
    userid = userId;

    fetch(`${endpoint}/api/admin/templates/get/${userId}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${access_token}`,
        }
    })
    .then(response => response.json())
    .then(data => {
        const availableTable = document.querySelector('.inventory-table');
        const usedTable = document.querySelector('.used-table');

        availableTable.innerHTML = '';
        usedTable.innerHTML = '';

        const availableItems = data.available || []; 
        const usedItems = data.used || []; 

        if (availableItems.length === 0 && usedItems.length === 0) {
            showToast("No inventory data available.", 3000);
        } else {
            showToast("Inventory data loaded successfully.", 3000);
        }

        function createInventoryTable(container, items, title, allowDelete) {
            if (items.length > 0) {
                new Grid({
                    columns: [
                        { name: "ID", sort: true },
                        { name: "Name", sort: true },
                        { name: "Price", sort: true },
                        { 
                            name: "Preview",
                            formatter: (cell) => 
                                h('img', { 
                                    src: `${endpoint}/${cell}`, 
                                    width: 250,     
                                    style: "border-radius:0px;"
                                })
                        },
                        ...(allowDelete ? [{
                            name: "Actions",
                            formatter: (cell, row) => {
                                const cvUniqueId = row._cells[0].data;
                                return h('div', {}, [
                                    h('button', {
                                        className: 'btn btn-outline-danger',
                                        onclick: () => deleteTemplate(userId, cvUniqueId)
                                    }, 'Delete')
                                ]);
                            }
                        }] : [])
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

        createInventoryTable(availableTable, availableItems, "Available Inventory", true);
        createInventoryTable(usedTable, usedItems, "Used Inventory", false);

    })
    .catch(error => {
        console.error('Error fetching inventory data:', error);
        showToast("Failed to load inventory data. Please try again.", 5000);

        document.querySelector('.inventory-table').innerHTML = 
            '<p class="text-muted mb-0">Failed to load inventory data.</p>';
        document.querySelector('.used-table').innerHTML = 
            '<p class="text-muted mb-0">Failed to load inventory data.</p>';
    });
}

}
function deleteTemplate(userId, cvUniqueId) {
    if (!confirm("Are you sure you want to delete this template?")) return;

    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
    const access_token = localStorage.getItem('access_token');

    fetch(`${endpoint}/api/admin/templates/delete/${userId}/${cvUniqueId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${access_token}`,
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to delete the template.');
        }
        return response.json();
    })
    .then(() => {
        showToast("Template deleted successfully!", 3000);
        new GridDatatable().loadInventoryData(userId); // Refresh inventory list
    })
    .catch(error => {
        console.error('Error deleting template:', error);
        showToast("Failed to delete the template.", 5000);
    });
}

document.addEventListener('DOMContentLoaded', function () {
    new GridDatatable().init();
});
