import { data } from "autoprefixer";
import { Grid, h } from "gridjs/dist/gridjs.umd.js";
import gridjs from 'gridjs/dist/gridjs.umd.js'
import 'gridjs/dist/gridjs.umd.js'

class GridDatatable {

    init() {
         this.GridjsTableInit();
    }

GridjsTableInit() {
    var access_token = localStorage.getItem('access_token');
    var data_key, data_value;
    const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT; 

    fetch(endpoint + '/api/admin/data/accounts/get', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${access_token}`,
        }
    }).then((response) => {
        var response_data = response.json();

        console.log(response_data);
        response_data.then((data) => {
            data_key = Object.keys(data[0]);
            console.log(data_key);

            // Add the 'Actions' column dynamically
            data_key.push({
                name: 'Actions',
                formatter: (cell, row) => {
                    console.log(row);
                    // Ensure row.id is correctly being passed as the ID for the URL
                    const rowId = row._cells[0].data;
                    console.log('Row ID from first cell:', rowId); // Log the row ID from first cell
                    const updatedUrl = manageUserUrl.replace('id-from-table', rowId);
                    return h('a', {
                        className: 'py-2 mb-4 px-4 border rounded-md text-white bg-blue-600',
                        href: updatedUrl,  // Use the updated URL
                    }, 'Edit');
                },
            });

            // Map the data for the table
            data_value = data.map(obj => Object.values(obj));

            console.log(data_key);
            console.log(data_value);

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
        });
    });
}


}

document.addEventListener('DOMContentLoaded', function (e) {
    new GridDatatable().init();
});


