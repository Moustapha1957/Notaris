"use strict";
$(document).ready(function () {
  if ($("#apexcharts-area").length > 0) {
    var options = {
      chart: { height: 300, type: "line", toolbar: { show: false } },
      dataLabels: { enabled: false },
      stroke: { curve: "smooth" },
      series: [
        {
          name: "Dossiers",
          color: "#3D5EE1",
          data: [45, 60, 105, 51, 42, 42, 30, 51, 42, 42, 30, 43],
        },
        {
          name: "Actes",
          color: "#70C4CF",
          data: [24, 48, 56, 32, 34, 52, 25, 32, 34, 52, 25, 56],
        },
      ],
      xaxis: {
        categories: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aout",
          "Sept",
          "Oct",
          "Nov",
          "Dec",
        ],
      },
    };
    var chart = new ApexCharts(
      document.querySelector("#apexcharts-area"),
      options
    );
    chart.render();
  }
  if ($("#school-area").length > 0) {
    var options = {
      chart: { height: 300, type: "area", toolbar: { show: false } },
      dataLabels: { enabled: false },
      stroke: { curve: "straight" },
      series: [
        {
          name: "Teachers",
          color: "#3D5EE1",
          data: [45, 60, 75, 51, 42, 42, 30, 51, 42, 42, 30,43],
        },
        {
          name: "Actes",
          color: "#70C4CF",
          data: [24, 48, 56, 32, 34, 52, 25, 32, 34, 52, 25,56],
        },
      ],
      xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aout","Sept","Oct","Nov","Dec"] },
    };
    var chart = new ApexCharts(document.querySelector("#school-area"), options);
    chart.render();
  }
  if ($("#bar").length > 0) {
    var optionsBar = {
      chart: {
        type: "bar",
        height: 300,
        width: "100%",
        stacked: false,
        toolbar: { show: false },
      },
      dataLabels: { enabled: false },
      plotOptions: { bar: { columnWidth: "55%", endingShape: "rounded" } },
      stroke: { show: true, width: 2, colors: ["transparent"] },
      series: [
        {
          name: "Ciffre d'affaire",
          color: "#f8b739",
          data: [10000000, 8000000, 21000000, 16000000, 31000000, 5170000],
        },
        // {
        //   name: "Girls",
        //   color: "#3D5EE1",
        //   data: [336, 612, 344, 647, 345, 563, 256, 344, 323, 300, 455, 456],
        // },
      ],
      labels: [2020, 2021, 2022, 2023, 2024, 2025],
      xaxis: {
        labels: { show: false },
        axisBorder: { show: false },
        axisTicks: { show: false },
      },
      yaxis: {
        axisBorder: { show: false },
        axisTicks: { show: false },
        labels: { style: { colors: "#777" } },
      },
      title: { text: "", align: "left", style: { fontSize: "18px" } },
    };
    var chartBar = new ApexCharts(document.querySelector("#bar"), optionsBar);
    chartBar.render();
  }
});
//fin des chart
