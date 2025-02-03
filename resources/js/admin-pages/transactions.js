import { data } from "autoprefixer";
import { Grid, h } from "gridjs/dist/gridjs.umd.js";
import gridjs from 'gridjs/dist/gridjs.umd.js'
import 'gridjs/dist/gridjs.umd.js'

const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
const access_token = localStorage.getItem('access_token');

function completeTransaction(id){
     fetch(endpoint + '/api/admin/transactions/complete/' + id, {
          method: 'POST',
          headers: {
               'Content-Type': 'application/json',
               'Authorization': `Bearer ${access_token}`,
          }});
}
function declineTransaction(id){
     fetch(endpoint + '/api/admin/transactions/decline/' + id, {
          method: 'POST',
          headers: {
               'Content-Type': 'application/json',
               'Authorization': `Bearer ${access_token}`,
          }});
}

class GridDatatable {
    init() {
         this.GridjsTableInit();
    }

    GridjsTableInit() {
          var access_token = localStorage.getItem('access_token');
          var data_key, data_value;
          const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT; 

          fetch(endpoint + '/api/admin/transactions/get/all-transactions',{
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
                    data_key.push({ 
                    id: 'actions',  // Ensure the column has a valid id
                    name: 'Actions',
                    formatter: (cell, row) => {
                         return h('div', { className: 'flex gap-2' }, [  // Wrap buttons in a div for layout
                              h('button', {
                                   className: 'btn btn-outline-primary',
                                   onClick: () => completeTransaction(row.cells[1].data),
                              }, 'Complete'),
                              h('button', {
                                   className: 'btn btn-outline-warning',
                                   onClick: () => declineTransaction(row.cells[1].data),
                              }, 'Decline'),
                         ]);
                    }
                    });


                    data_value = data.map(obj => Object.values(obj));

                    console.log(data_key);
                    console.log(data_value);

                    if (document.getElementById("table-search")) {
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


