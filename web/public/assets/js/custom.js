$(function () {
	$(".animsition").animsition({

		inClass: 'zoom-in-sm',
		outClass: 'zoom-out-sm',
		inDuration: 1500,
		outDuration: 800,
		linkElement: '.animsition-link',
		// e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
		loading: true,
		loadingParentElement: 'body', //animsition wrapper element
		loadingClass: 'animsition-loading',
		unSupportCss: ['animation-duration',
                                    '-webkit-animation-duration',
                                    '-o-animation-duration'
                                  ],
		overlay: false,

		overlayClass: 'animsition-overlay-slide',
		overlayParentElement: 'body'
	});
});

$(function () {
	//Show event modal from clicking event on calendar
	$('tbody.event-calendar').on('click', '.event', function () {
		var monthEvent = $(this).attr('data-month');
		var dayEvent = $(this).text();
		var eventContent = $('.day-event[data-month="' + monthEvent + '"][data-day="' + dayEvent + '"]').children('.event-content').clone();

		var targetModal = $('#showEventModal');

		targetModal.find('.modal-body').append(eventContent);

		targetModal.modal('show');
	});

	$('#showEventModal').on('hidden.bs.modal', function (e) {
		$(this).find('.modal-body').html('');
	});
});

// category and sub-category page script START Here

$(document).ready(function () {
	$('.edit-category').on('click', function () {
           var categoryid=$(this).attr("id");
           var categoryname=$(this).attr("data-category");
           var categorystatus=$(this).attr("data-status");
            $('#editcategoryid').val(categoryid);
            $('#editcategoryname').val(categoryname);
            $('#editcategorystatus').val(categorystatus);
           $('.editCategory').show();
            
	});
	$('.edit-toggle').on('click', function () {
		$('.editCategory').hide();
	});
        $('.delete-category').on('click', function () {
            var categoryid=$(this).attr("id");
            $('#deletecategoryid').val(categoryid);            
            $('#deleteModal').modal('show');           
	});
         $('.addsubcategory').on('click', function () {
            var categoryid= $(this).attr('id');           
             $('#addcategoryid').val(categoryid);
             $('#addModal').modal('show');   
         });
        $('.edit-subcategory').on('click', function () {
            var categoryid=$(this).attr("data-category-id");
           var subcategoryid=$(this).attr("id");
           var subcategoryname=$(this).attr("data-subcategory");
           var subcategorystatus=$(this).attr("data-substatus");
           $('#editcategoryid').val(categoryid);
            $('#editsubcategoryid').val(subcategoryid);
            $('#editsubcategoryname').val(subcategoryname);
            $('#editsubcategorystatus').val(subcategorystatus);
           $('.editSubCategory').show();
            
	});
	$('.edit-subtoggle').on('click', function () {
		$('.editSubCategory').hide();
	});
        $('.delete-subcategory').on('click', function () {
            var subcategoryid=$(this).attr("id");
            var categoryid=$(this).attr("data-category-id");
            $('#deletesubcategoryid').val(subcategoryid);   
            $('#deletecategoryid').val(categoryid); 
            $('#deleteModal').modal('show');           
	});
        $('.updatemap').on('click', function () {
            console.log("change")
        });



 $('#addReview').on('click', function () {
            $.ajax({
                url: '/admin/ajaxaction',
                type: 'POST',
                dataType: 'json',
                data: {  
                    method:"getreports"
                },
                success: function (response) {
                    console.log(response);                    
$.each(response, function(key, value) {
$('#reportbody').append("<tr><td>"+value.report_id+"</td><td>"+value.display_name+"</td><td>"+value.report_title+"</td><td class='text-center'><a href='/admin/review/"+value.report_id+"' data-toggle='modal' class='btn btn-info'>Add Review </a></td></tr>")
        });
var myTable = $('#datatable-report').DataTable();
$('#category_details').modal("show");
                //     myTable.rows.add(result);
                // myTable.draw();
                }
            }); //End of  ajax

        });

});

// END Here



// USER PANEL Start Here

var $grid_color = "#eee";
var $border_color = "#e1e8ed";
var $default_black = "#666";
var $red = "#3693cf";


// Just Gage
var gg1 = new JustGage({
  id: "gg1",
  value : 4960,
  min: 100,
  max: 9999,
  gaugeWidthScale: 1,
  counter: true,
  formatNumber: true,
  gaugeColor: $grid_color,
  levelColors: [$red],
  label: "30 seconds"
});
setInterval(function() {
  gg1.refresh(getRandomInt(10, 9999));
}, 2000);



//Flot Graphs

// Monthly Revenue & Growth
var $border_color = "#F5F8FA";
var $grid_color = "#F5F8FA";
var $default_black = "#666";

$(function () {    
  var data1 = [
    [1354586000000, 20], [1364587000000, 60], [1374588000000, 100],
    [1384589000000, 200], [1394590000000, 320], [1404591000000, 200],
    [1414592000000, 100], [1424593000000, 360], [1434594000000, 800],
    [1444595000000, 1100], [1454596000000, 1000], [1464597000000, 1200]
  ];

  var data2 = [
    [1354586000000, 10], [1364587000000, 85], [1374588000000, 158],
    [1384589000000, 113], [1394590000000, 280], [1404591000000, 398],
    [1414592000000, 480], [1424593000000, 374], [1434594000000, 800],
    [1444595000000, 1100], [1454596000000, 1000], [1464597000000, 400]
  ];
 
  var data = [{
    label: "Revenue",
    data: data1,
    bars: {
      show: true,
      lineWidth: 0,
      barWidth: 30 * 60 * 60 * 1000 * 80,
      fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
    }
  },{
    label: "Growth",
    data: data2,
    lines: {
      show: true,
      lineWidth: 2,
      fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
    },
    points:{
      show:true,
      radius: 5,
      fill: true,
      fillColor: "#ffffff",
      lineWidth: 2
    }
  }];
 
  var options = {
    series: {
    shadowSize: 0,
    bars: {
      lineWidth: 2,
      fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
    }
  },
  grid: {
    hoverable: true,
    clickable: false,
    borderWidth: 1,
    tickColor: $border_color,
    borderColor: $grid_color,
  },
  legend:{   
    show: true,
    position: 'nw',
    noColumns: 0,
  },
  tooltip: true,
  tooltipOpts: {
    content: '%x: %y'
  },

  xaxis: {mode: "time", ticks:3, tickDecimals: 0},
  yaxis: {ticks:3, tickDecimals: 0},

  colors: ['#0084B4', '#666666', '#333333', '#999999', '#CCCCCC'],
};
 
  var plot = $.plot($("#monthlyRevenueGrowth"), data, options);  
});

// Monthly Expenses & Cancellations
$(function () {    
  var data3 = [
    [1354586000000, 30], [1364587000000, 60], [1374588000000, 90],
    [1384589000000, 200], [1394590000000, 240], [1404591000000, 280],
    [1414592000000, 300], [1424593000000, 430], [1434594000000, 420],
    [1444595000000, 1030], [1454596000000, 1460], [1464597000000, 1664]
  ];

  var data4 = [
    [1354586000000, 20], [1364587000000, 20], [1374588000000, 40],
    [1384589000000, 60], [1394590000000, 200], [1404591000000, 80],
    [1414592000000, 30], [1424593000000, 10], [1434594000000, 10],
    [1444595000000, 290], [1454596000000, 1040], [1464597000000, 1300]
  ];
 
  var data = [{
    label: "Expenses",
    data: data3,
    bars: {
      show: true,
      lineWidth: 0,
      barWidth: 30 * 60 * 60 * 1000 * 80,
      fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
    }
  },{
    label: "Cancellations",
    data: data4,
    lines: {
      show: true,
      lineWidth: 2,
      fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
    },
    points:{
      show:true,
      radius: 5,
      fill: true,
      fillColor: "#ffffff",
      lineWidth: 2
    }
  }];
 
  var options = {
    series: {
    shadowSize: 0,
    bars: {
      lineWidth: 2,
      fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
    }
  },
  grid: {
    hoverable: true,
    clickable: false,
    borderWidth: 1,
    tickColor: $border_color,
    borderColor: $grid_color,
  },
  legend:{   
    show: true,
    position: 'nw',
    noColumns: 0,
  },
  tooltip: true,
  tooltipOpts: {
    content: '%x: %y'
  },

  xaxis: {mode: "time", ticks:3, tickDecimals: 0},
  yaxis: {ticks:3, tickDecimals: 0},

  colors: ['#e1e8ed', '#666666', '#999999', '#666666', '#CCCCCC'],
};
 
  var plot = $.plot($("#monthlyExpensesCancellations"), data, options);  
});


// Donut Chart
$(function () {

  var data, chartOptions;
  
  data = [
    { label: "Mobile", data: Math.floor (Math.random() * 100 + 350) }, 
    { label: "Desktop", data: Math.floor (Math.random() * 100 + 190) }, 
  ];

  chartOptions = {        
    series: {
      pie: {
        show: true,  
        innerRadius: .4, 
        stroke: {
          width: 0,
        }
      }
    }, 
    shadowSize: 0,
    legend: {
      show: false,
    },
    
    tooltip: true,

    tooltipOpts: {
      content: '%s: %y'
    },
    
    grid:{
      hoverable: true,
      clickable: false,
      borderWidth: 1,
      tickColor: $border_color,
      borderColor: $grid_color,
    },
    shadowSize: 0,
    colors: ['#5cb85c', '#058DC7', '#999999', '#CCCCCC'],
  };

  var holder = $('#mobVsDesk');

  if (holder.length) {
    $.plot(holder, data, chartOptions );
  } 
});


// Session
$(function () {
    
  var d1, data, chartOptions;

  var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];

  data = [{ 
    label: "Sessions", 
    data: d1
  }];

  chartOptions = {
    xaxis: {
      min: (new Date(2009, 12, 1)).getTime(),
      max: (new Date(2010, 11, 2)).getTime(),
      mode: "time",
      tickSize: [1, "month"],
      monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      tickLength: 0
    },
    yaxis: {

    },
    series: {
      lines: {
        show: true, 
        fill: true,
        fill: 0.1,
        lineWidth: 2
      },
      points: {
        show: true,
        radius: 5,
        fill: true,
        fillColor: "#ffffff",
        lineWidth: 2,
      }
    },
    grid:{
      hoverable: true,
      clickable: false,
      borderWidth: 0,
      tickColor: "#eee",
      borderColor: "#ccc",
    },
    legend: {
      show: true,
      position: 'nw'
    },
    tooltip: true,
    tooltipOpts: {
      content: '%s: %y'
    },
    shadowSize: 0,
    colors: ['#058DC7', '#666666', '#333333', '#CCCCCC'],
  };

  var holder = $('#area-chart');

  if (holder.length) {
    $.plot(holder, data, chartOptions);
  }
});

// Vertical Chart
$(function () {

  var d1, d2, data, chartOptions;

  d1 = [
    [1325376000000, 1200], [1328054400000, 700], [1330560000000, 1000], [1333238400000, 600],
    [1335830400000, 350]
  ];

  d2 = [
    [1325376000000, 800], [1328054400000, 1200], [1330560000000, 600], [1333238400000, 250],
    [1335830400000, 300]
  ];

  data = [{
    label: 'Male',
    data: d1
  },{
    label: 'Female',
    data: d2
  }];

  chartOptions = {
    xaxis: {
      min: (new Date(2011, 11, 15)).getTime(),
      max: (new Date(2012, 04, 18)).getTime(),
      mode: "time",
      tickSize: [2, "month"],
      monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      tickLength: 0
    },
    grid:{
      hoverable: true,
      clickable: false,
      borderWidth: 1,
      tickColor: $border_color,
      borderColor: $grid_color,
    },
    bars: {
      show: true,
      barWidth: 24*24*60*60*300,
      fill: true,
      lineWidth: 1,
      order: true,
      lineWidth: 0,
      fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
    },
    shadowSize: 0,
    tooltip: true,
    tooltipOpts: {
      content: '%s: %y'
    },
    colors: ['#058DC7', '#f782aa'],
  }

  var holder = $('#mob-desktop');

  if (holder.length) {
    $.plot(holder, data, chartOptions );
  }

});



//Datepicker
$(function() {
  $("#datepicker" ).datepicker();
});

// Appointments
$( "ul.appointments li" ).click(function() {
  $(this).css('text-decoration', 'line-through');
});
