(function($){
$(function() {


$('#page_template').change(function() {
        $('#slider-meta').toggle($(this).val() == 'template-home.php' );
    }).change();
	
$('#page_template').change(function() {
        $('#games-meta').toggle($(this).val() == 'template-games.php');
    }).change();



});
})(jQuery);



