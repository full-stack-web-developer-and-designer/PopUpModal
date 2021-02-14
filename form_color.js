jQuery(document).ready(function($) {
    $('input:text').focus(
    function(){
        $(this).css({'background-color' : '#FF9', 'color' : '#0B60D4'});
    });
    $('input:text').blur(
    function(){
        $(this).css({'background-color' : '#FFF', 'color' : '#000'});
    });
	$("textarea").focus(
    function(){
        $(this).css({'background-color' : '#FF9', 'color' : '#0B60D4'});
    });
    $('textarea').blur(
    function(){
        $(this).css({'background-color' : '#FFF', 'color' : '#000'});
    });
});