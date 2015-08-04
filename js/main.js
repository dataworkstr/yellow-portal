$(document).ready(function() {
// 	$('.mac-detayi').first('.mac-detayi').css({
// 		display: 'inherit'
// 	});
// 	$('.fa-chevron-left').click(function() {
// 		$('.yellow-mac').prev('.mac-detayi').show('fast');
// 		$('.yellow-mac').next('.mac-detayi').hide('fast');
// 	});
// 	$('.fa-chevron-right').click(function() {
// 		$('.yellow-mac').next('.mac-detayi').show('fast');
// 		$('.yellow-mac').prev('.mac-detayi').hide('fast');
// 	});


$('.mac-detayi').first('.mac-detayi').css({
	display: 'inherit'
});

$('.mac-detayi').last('.mac-detayi').addClass('last');
$('.mac-detayi').first('.mac-detayi').addClass('first current');
$('.fa-chevron-left').addClass('disabled');

$('.fa-chevron-right').click(function() {
	$('.current').removeClass('current').hide()
	.next('.mac-detayi').fadeIn('fast').addClass('current');
	if ($('.current').hasClass('last')) {
		$('.fa-chevron-right').addClass('disabled');
		$('.fa-chevron-left').addClass('solla');
	}
	$('.fa-chevron-left').removeClass('disabled');
});

$('.fa-chevron-left').click(function() {
	$('.current').removeClass('current').hide()
	.prev('.mac-detayi').fadeIn('fast').addClass('current');
	if ($('.current').hasClass('first')) {
		$('.fa-chevron-left').addClass('disabled');
	}
	$('.fa-chevron-right').removeClass('disabled');
	$('.fa-chevron-left').removeClass('solla');
});

});