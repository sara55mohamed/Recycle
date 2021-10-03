//loading screen
//  $(document).ready(function () {
//    $("#loading").fadeOut(1000, function () {
//      $("body").css("overflow", "auto");
//      $("#loading").css("opacity", "0");
//      $("#loading").css("zIndex", "0");
//    });
//  });


//side bar
 let colorBoxWidth = $("#colorsBox").innerWidth();
 console.log(colorBoxWidth);
 $("#sideBar").css("left", `-${colorBoxWidth}px`);
 $("#sideBarToggle").click(function () {
   let colorBoxWidth = $("#colorsBox").innerWidth();
   if ($("#sideBar").css("left") == "0px") {
     $("#sideBar").animate({ left: `-${colorBoxWidth}` }, 1000);
   }
   else {
     $("#sideBar").animate({ left: `0px` }, 1000);
   }
 });
 let colorsBox = $(".color-item");
 $(colorsBox).eq(0).click(function () {
   $("body").css("color", "#181626")
 });
 $(colorsBox).eq(1).click(function () {
   $("body").css("color", "#BA120E")
 });
 $(colorsBox).eq(2).click(function () {
   $("body").css("color", "#555")
 });
 $(colorsBox).eq(3).click(function () {
   $("body").css("color", "#027368")
 });


//angle_up scroll
$(window).scroll(function () {
  let windowScroll = $(window).scrollTop();
  if (windowScroll > 400) {
    $("#angle").fadeIn(500);
  }
  else {
    $("#angle").fadeOut(500);
  }
});
$(".angle-up").click(function () {
  $("html,body").animate({ scrollTop: 0 }, 1000);
});


//navbar links
$(".navbar a[href^= '#']").click(function () {
  a = $(this).attr("href");
  offset = $(a).offset().top;
  $("html,body").animate({ scrollTop: offset }, 1000);
});

  // Chart.JS
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
          labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUNE", "JULY","AUG","SEP","OCT","NOV","DEC" ],
          datasets: [{
            data: [15339, 21345, 18483, 44003, 23489, 24092, 52034,25090,23450,23410,23450,37409],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
    },
    options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
                  }
            }]
          },
          legend: {
            display: false,
          }
    }
  }); 

  //PIA
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  
  // Draw the chart and set the chart values
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Paper', 10],
    ['Metal material', 2],
    ['Plastic', 4],
   
    ['Cartoon', 8]
  ]);
  
    // Optional; add a title and set the width and height of the chart
    var options = {'title':'Material Recycling Statistics', 'width':550, 'height':400};
  
    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
  // Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Paper', 10],
    ['Metal material', 2],
    ['Plastic', 4],
   
    ['Cartoon', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':' Average Recycle matrial', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
    
    
    
  