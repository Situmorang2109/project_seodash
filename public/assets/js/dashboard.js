document.addEventListener("DOMContentLoaded", function () {

    var options = {
        series: [
            { name: "Users", data: [window.chartData.totalUsers] },
            { name: "Staff", data: [window.chartData.totalStaff] },
            { name: "Admin", data: [window.chartData.totalAdmin] },
        ],
        chart: {
            type: "bar",
            height: 320,
            toolbar: { show: false },
        },
        colors: ["#007bff", "#28a745", "#ffb703"],
        dataLabels: { enabled: true },
        xaxis: {
            categories: ["Jumlah Data"]
        }
    };

    var chart = new ApexCharts(
        document.querySelector("#traffic-overview"),
        options
    );

    chart.render();
});
