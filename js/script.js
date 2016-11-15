//$(document).foundation();
(function ($, Drupal) {
  Drupal.behaviors.STARTER = {
    attach: function (context, settings) {

//scroll help animation script
//$( window ).load(function() {
//$(".page-user").addClass("help-scroll").delay(6000).queue(function(){
    //$(this).removeClass("help-scroll").dequeue();
//);

//});
//adding placeholders
$("#edit-name").attr("placeholder", "username or email address");
$("#edit-pass").attr("placeholder", "password");
$(".form-textarea-wrapper textarea").attr("placeholder", "Leave your comment");



//user details show/hide for small
$('.author-link a').click(function() {
	$('.sidebar-left-inner').slideToggle();
	
	$(this).toggleClass('active');
});
$('.custom-author-info .close-button').click(function() {
	$('.sidebar-left-inner').slideUp();
});

//activating wow.js
var wow = new WOW();
wow.init();

    //End of JS    
    }
};


})(jQuery, Drupal);
