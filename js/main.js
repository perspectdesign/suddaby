jQuery(document).ready(function($) {

	// Fade images in
    $('.container').bind('inview', function(event, visible) {
      if (visible) {
        $(this).stop().animate({ opacity: 1 });
      } else {
        $(this).stop().animate({ opacity: 0 });
      }
    });
    
	// Process Slider
    $('#process-slider').carousel({
            interval: false
    });
	
	// Gallery code
    $('#myCarousel').carousel({
                interval: false
        });
 
    $('#carousel-text').html($('#slide-content-0').html());
 
    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click( function(){
        var id_selector = $(this).attr("id");
        var id = id_selector.substr(id_selector.length -1);
        var id = parseInt(id);
        $('#myCarousel').carousel(id);
    });
 
    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid', function (e) {
        var id = $('.item.active.gallery').data('slide-number');
        $('#carousel-text').html($('#slide-content-'+id).html());
    });

	// Form Code
	$('#myform').on('submit', function(ev) {
    	$('#myModal').modal('show');

		var data = $(this).serializeObject();
		json_data = JSON.stringify(data);
		$("#results").text(json_data);
		$(".modal-body").text(json_data);

		// $("#results").text(data);
		ev.preventDefault();
    });

});


