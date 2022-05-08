// This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
$(document).ready(function() {

    $('#butsave').on('click', function() {

      var date = $('#date').val();

      if(date!=""){
          $.ajax({
              url: url,
              type: "GET",
              data: {

                  date: date
              },
              cache: false,
              success: function(data){

                Net_Profit =data.Net_Profit;
                Visitors =data.Visitors;
                Num_Booking = data.Num_Booking;
                chart();

              }

          });
      }
      else{
          alert('Please fill all the field !');
      }
  });
});




function chart()
{

    var options = {
        series: [
          {
            name: "Net Profit $",
            data: Net_Profit,
          },
          {
            name: "Visitors  ",
            data: Visitors,
          },
          {
            name: "Booking   ",
            data: Num_Booking,
          },
        ],


        chart: {
          type: "bar",
          height: 250, // make this 250
          sparkline: {
            enabled: true, // make this true
          },
        },


        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "60%",
            endingShape: "rounded",
          },
        },



        dataLabels: {
          enabled: false,
        },



        stroke: {
          show: true,
          width: 2,
          colors: ["transparent"],
        },



        xaxis: {
          categories: ["Jan","Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct","Nov","Dec"],
        },



        yaxis: {
          title: {
            text: "$ (thousands)",
          },
        },



        fill: {
          opacity: 1,
        },



        tooltip: {


          y: {
            formatter: function (val) {
              return val;
            },
          },
        },


      };

      var chart = new ApexCharts(document.querySelector("#apex1"), options);
      chart.render();

     // document.getElementById('butsave').style.visibility = 'hidden';
      $("#INPUT").hide();
      $("#butsave").hide();


}




// Sidebar Toggle Codes;

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");
var sidebarCloseIcon = document.getElementById("sidebarIcon");

function toggleSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add("sidebar_responsive");
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove("sidebar_responsive");
    sidebarOpen = false;
  }
}

$(document).ready(function(){
  $(".btn1").click(function(){
    $(".hidden1").slideToggle();
  });
  $(".btn2").click(function(){
    $(".hidden2").slideToggle();
  });
  $(".btn3").click(function(){
    $(".hidden3").slideToggle();
  });
  $(".btn4").click(function(){
    $(".hidden4").slideToggle();
  });
  $(".btn5").click(function(){
    $(".hidden5").slideToggle();
  });
  $(".btn6").click(function(){
    $(".hidden6").slideToggle();
  });
  $(".btn7").click(function(){
    $(".hidden7").slideToggle();
  });
  $(".btn8").click(function(){
    $(".hidden8").slideToggle();
  });

  $(".btn9").click(function(){
    $(".hidden9").slideToggle();
  });
  $(".btn10").click(function(){
    $(".hidden10").slideToggle();
  });
  $(".btn11").click(function(){
    $(".hidden11").slideToggle();
  });
})
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }


  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }




  $(document).ready(function(){
    $(".point").click(function(){
      $("#myDropdown1").fadeToggle();
    });
  });
