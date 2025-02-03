import ApexCharts from "apexcharts";

import jsVectorMap from "jsvectormap/dist/jsvectormap.js";
import "jsvectormap/dist/maps/world-merc.js";
import "jsvectormap/dist/maps/world.js";

// Development Purpose
var usersTotalData, incomesTotalData, ordersTotalData, templateTotalData;
const endpoint = import.meta.env.VITE_DATABASE_ENDPOINT;
const loginEndpoint = endpoint + "/api/auth/login";
var accessToken;

const loginData = {
    username: "admin",
    password: "adminpassword",
};

fetch(loginEndpoint, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify(loginData),
})
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        accessToken = data.token;
        console.log("Access Token:", accessToken);

        // Store token for later use
        localStorage.setItem("access_token", accessToken);

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
    })
    .catch((error) => {
        console.error("Login failed:", error);
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

    // Conversions
    var options = {
        chart: {
            height: 180,
            type: "donut",
        },
        series: [44.25, 52.68, 45.98],
        legend: {
            show: false,
        },
        stroke: {
            width: 0,
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "70%",
                    labels: {
                        show: false,
                        total: {
                            showAlways: true,
                            show: true,
                        },
                    },
                },
            },
        },
        labels: ["Direct", "Affilliate", "Sponsored"],
        colors: ["#7e67fe", "#17c553", "#7942ed"],
        dataLabels: {
            enabled: false,
        },
        responsive: [
            {
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                },
            },
        ],
        fill: {
            type: "gradient",
        },
    };
    var chart = new ApexCharts(document.querySelector("#conversions"), options);
    chart.render();

    //Sales Report -chart
    var options = {
        series: [
            {
                name: "Page Views",
                type: "bar",
                data: [34, 65, 46, 68, 49, 61, 42, 44, 78, 52, 63, 67],
            },
            {
                name: "Clicks",
                type: "area",
                data: [8, 12, 7, 17, 21, 11, 5, 9, 7, 29, 12, 35],
            },
            {
                name: "Revenue",
                type: "area",
                data: [12, 16, 11, 22, 28, 25, 15, 29, 35, 45, 42, 48],
            },
        ],
        chart: {
            height: 330,
            type: "line",
            toolbar: {
                show: false,
            },
        },
        stroke: {
            dashArray: [0, 0, 2],
            width: [0, 2, 2],
            curve: "smooth",
        },
        fill: {
            opacity: [1, 1, 1],
            type: ["solid", "gradient", "gradient"],
            gradient: {
                type: "vertical",
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90],
            },
        },
        markers: {
            size: [0, 0],
            strokeWidth: 2,
            hover: {
                size: 4,
            },
        },
        xaxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        yaxis: {
            min: 0,
            axisBorder: {
                show: false,
            },
        },
        grid: {
            show: true,
            strokeDashArray: 3,
            xaxis: {
                lines: {
                    show: false,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
            padding: {
                top: 0,
                right: -2,
                bottom: 10,
                left: 10,
            },
        },
        legend: {
            show: true,
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: 5,
            markers: {
                width: 9,
                height: 9,
                radius: 6,
            },
            itemMargin: {
                horizontal: 10,
                vertical: 0,
            },
        },
        plotOptions: {
            bar: {
                columnWidth: "30%",
                barHeight: "70%",
                borderRadius: 3,
            },
        },
        colors: ["#7e67fe", "#17c553", "#7942ed"],
        tooltip: {
            shared: true,
            y: [
                {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(1) + "k";
                        }
                        return y;
                    },
                },
                {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(1) + "k";
                        }
                        return y;
                    },
                },
            ],
        },
    };
    
    var chart = new ApexCharts(
        document.querySelector("#dash-performance-chart"),
        options
    );

    chart.render();
    
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
