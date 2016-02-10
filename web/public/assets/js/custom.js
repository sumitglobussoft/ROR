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
});

// END Here