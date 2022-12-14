window.onscroll = function() {scrollFunction()};
   $(function() {
    $('#rateexample').barrating({
      theme: 'fontawesome-stars'
    });
  });
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("topBtn").style.display = "block";
    } else {
        document.getElementById("topBtn").style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
jQuery(document).ready(function() {
    /*
        Fullscreen background
    */    
    $.backstretch([
                           "assets/img/backgrounds/1.jpg"
                         , "assets/img/backgrounds/2.jpg"
                         , "assets/img/backgrounds/3.jpg"
                         ], {duration: 3000, fade: 750});
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
    	$.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
    	$.backstretch("resize");
    });
    /*
        Form validation
    */
    $('.registration-form input[type="text"], .registration-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    $('.registration-form').on('submit', function(e) {
    	$(this).find('input[type="text"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    });
});


