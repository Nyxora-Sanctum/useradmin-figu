import ApexCharts from "apexcharts";
import jsVectorMap from "jsvectormap/dist/jsvectormap.js";
import "jsvectormap/dist/maps/world-merc.js";
import "jsvectormap/dist/maps/world.js";

var usersTotalData, incomesTotalData, ordersTotalData, templateTotalData;
const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
var accessToken = localStorage.getItem('access_token');

// Define the endpoints array with placeholders
const endpoints = [
    { url: "/api/admin/data/get/total-users" },
    { url: "/api/admin/data/get/total-incomes" },
    { url: "/api/admin/data/get/total-orders" },
    { url: "/api/admin/data/get/total-templates" }
];

// Make multiple requests using Promise.all
Promise.all(
    endpoints.map(({ url }) => 
        fetch(`${endpoint}${url}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${accessToken}`,
            },
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
    )
)
.then((results) => {
    // Destructure the results and assign the data to variables
    const [usersData, incomesData, ordersData, templatesData] = results;

    usersTotalData = usersData;
    incomesTotalData = incomesData;
    ordersTotalData = ordersData;
    templateTotalData = templatesData;

    // You now have the entire data returned from each API
    console.log("Users Data:", usersData);
    console.log("Incomes Data:", incomesData);
    console.log("Orders Data:", ordersData);
    console.log("Templates Data:", templatesData);

    renderChart(); // Call your chart rendering function here
})
.catch((error) => {
    console.error("Error fetching data:", error);
});



    
function renderChart() {
    document.getElementById("total-users").innerText = `${usersTotalData.total}`;
    document.getElementById("total-incomes").innerText = `Rp ${Math.round(incomesTotalData.total).toLocaleString()}`;
    document.getElementById("total-orders").innerText = `${ordersTotalData.total}`;
    document.getElementById("total-templates").innerText = `${templateTotalData.total}`;

    var options1 = {
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        series: [
            {
                data: usersTotalData.per_day,
            },
        ],
        stroke: {
            width: 2,
            curve: "smooth",
        },
        markers: {
            size: 0,
        },
        colors: ["#7e67fe"],
        tooltip: {
            fixed: {
                enabled: false,
            },
            x: {
                show: false,
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return "";
                    },
                },
            },
            marker: {
                show: false,
            },
        },
        fill: {
            opacity: [1],
            type: ["gradient"],
            gradient: {
                type: "vertical",
                //   shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 100],
            },
        },
    };

    new ApexCharts(document.querySelector("#chart01"), options1).render();

    var options1 = {
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        series: [
            {
                data: incomesTotalData.per_day,
            },
        ],
        stroke: {
            width: 2,
            curve: "smooth",
        },
        markers: {
            size: 0,
        },
        colors: ["#7e67fe"],
        tooltip: {
            fixed: {
                enabled: false,
            },
            x: {
                show: false,
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return "";
                    },
                },
            },
            marker: {
                show: false,
            },
        },
        fill: {
            opacity: [1],
            type: ["gradient"],
            gradient: {
                type: "vertical",
                //   shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 100],
            },
        },
    };

    new ApexCharts(document.querySelector("#chart02"), options1).render();

    var options1 = {
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        series: [
            {
                data: ordersTotalData.per_day,
            },
        ],
        stroke: {
            width: 2,
            curve: "smooth",
        },
        markers: {
            size: 0,
        },
        colors: ["#7e67fe"],
        tooltip: {
            fixed: {
                enabled: false,
            },
            x: {
                show: false,
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return "";
                    },
                },
            },
            marker: {
                show: false,
            },
        },
        fill: {
            opacity: [1],
            type: ["gradient"],
            gradient: {
                type: "vertical",
                //   shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 100],
            },
        },
    };

    new ApexCharts(document.querySelector("#chart03"), options1).render();

    var options1 = {
        chart: {
            type: "area",
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        series: [
            {
                data: templateTotalData.per_day,
            },
        ],
        stroke: {
            width: 2,
            curve: "smooth",
        },
        markers: {
            size: 0,
        },
        colors: ["#7e67fe"],
        tooltip: {
            fixed: {
                enabled: false,
            },
            x: {
                show: false,
            },
            y: {
                title: {
                    formatter: function (seriesName) {
                        return "";
                    },
                },
            },
            marker: {
                show: false,
            },
        },
        fill: {
            opacity: [1],
            type: ["gradient"],
            gradient: {
                type: "vertical",
                //   shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 100],
            },
        },
    };

    new ApexCharts(document.querySelector("#chart04"), options1).render();


    
    fetch(endpoint + '/api/admin/data/accounts/get/latest/10', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${accessToken}`
        }
    })
    .then(response => response.json()) // Pastikan JSON sudah diambil
    .then(latestUsers => {
        const tbody = document.querySelector('#new-user-tbody');
        
        // Bersihkan tbody sebelum menambahkan data baru (opsional)
        tbody.innerHTML = '';

        // Loop melalui user data dan tambahkan ke tabel
        latestUsers.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.id}</td>
                <td>${user.created_at}</td>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.gender}</td>
            `;
            tbody.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error fetching latest users:', error);
    });

    fetch(endpoint + '/api/admin/data/transactions/get/latest/10', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${accessToken}`
        }
    })
    .then(response => response.json()) // Pastikan JSON sudah diambil
    .then(latestUsers => {
        const tbody = document.querySelector('#recent-transaction-tbody');
        
        // Bersihkan tbody sebelum menambahkan data baru (opsional)
        tbody.innerHTML = '';

        // Loop melalui user data dan tambahkan ke tabel
        latestUsers.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.order_id}</td>
                <td>${user.created_at}</td>
                <td>${user.amount}</td>
                <td>${user.status}</td>
                <td>${user.user_id}</td>
            `;
            tbody.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error fetching latest users:', error);
    });

}
