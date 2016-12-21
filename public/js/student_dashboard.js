(function($) {
  $(window).on('load', function(e) {
    var lineCanvas = document.getElementById("lineChart");
    var pieCanvas = document.getElementById("pieChart");
    var lineChart = new Chart(lineCanvas, {
      type: 'line',
      data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Percent Grade Average",
              data: [{
                  x: 0,
                  y: 86
              }, {
                  x: 0,
                  y: 90
              }, {
                  x: 0,
                  y: 85
              }, {
                  x: 0,
                  y: 95
              }, {
                  x: 0,
                  y: 99
              }, {
                  x: 0,
                  y: 81
              }, {
                  x: 0,
                  y: 82
              }, {
                  x: 0,
                  y:92
              }, {
                  x: 0,
                  y: 97
              }, {
                  x: 0,
                  y: 96
              }, {
                  x: 0,
                  y: 98
              }, {
                  x: 0,
                  y: 99
              }

            ]
          }]
      },
      options: {
          responsive: true,
          title:{
              display :true,
              text: first + "'s "+ 'Grade Average Per Month'
          },
          tooltips: {
              mode: 'index',
              intersect: false,
          },
          hover: {
              mode: 'nearest',
              intersect: true
          },
          scales: {
              xAxes: [{
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: 'Month'
                  }
              }],
              yAxes: [{
                  display: true,
                  ticks: {
                    beginAtZero: true,
                    min: 0,
                    max: 100,
                    fixedStepSize: 10
                  },
                  scaleLabel: {
                  display: true,
                  labelString: 'Percent Grade'
                  }
              }]
          }
        }
      });
      var pieConfig = {
          type: 'pie',
          data: {
              datasets: [{
                  data: [
                    20,
                    30,
                    40,
                    50,
                    2
                  ],
                  backgroundColor: [
                    "#008000",
                    "#0000FF",
                    "#FFA500",
                    "#FFFF00",
                    '#ff0000',
                  ],
                  label: 'Your Grade'
              }],
              labels: [
                  "A",
                  "B",
                  "C",
                  "D",
                  "F"
              ]
          },
          options: {
              responsive: true,
              cutoutPercentage: 50,
              maintainAspectRatio: true,
              title: {
                  display: true,
                  text: 'Grade Breakdown',
                  fontSize: 15,
              },
          }
      };
      var pieChart = new Chart(pieCanvas, pieConfig);
  });
})(jQuery);
