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

          fetch(endpoint + '/api/admin/invoices/get/all-invoices',{
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
                    data_value = data.map(obj => Object.values(obj));

                    console.log(data_key);
                    console.log(data_value);

                    if (document.getElementById("table-search-invoices")) {
                         new Grid({
                              columns: data_key,
                              pagination: {
                                   limit: 5
                              },
                              search: true,
                              data: data_value,
                         }).render(document.getElementById("table-search-invoices"));
                    }
               });
          });
    }

}

document.addEventListener('DOMContentLoaded', function (e) {
    new GridDatatable().init();
});


