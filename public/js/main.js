$(window).on('load', function () {
	setTimeout( function(){
		$('#preload').fadeOut(600);
		$('body').removeClass('overflow');
	}, 10);
}); 

$(document).ready( function(){

	var windowW = $(window).width();
	if(windowW < 1100){
		$('.burger').click(function(){
			$('.main-nav').toggleClass('active');
			$(this).toggleClass('active');
		});
	}

	$('a[href="#"]').click( function(e) {
		e.preventDefault();
	});

	//modals

	$('.cls-btn, .modal-backdrop').click( function () {
		$('.modal-backdrop').fadeOut(600);
		$('.modal').removeClass('active');
	});

	/*$('.profile-link').click( function() {
		$('.modal-backdrop').fadeIn(700);
		$('.enter-modal').addClass('active');
	});*/


	$('#register-btn').click( function(e) {
		e.preventDefault();
		$('.enter-modal').removeClass('active');
		setTimeout(function () {
			$('.register-modal').addClass('active');
		}, 700);
	});


	$('.forgotten-pass').click( function(e) {
		e.preventDefault();
		$('.enter-modal').removeClass('active');
		setTimeout(function () {
			$('.recovery-modal').addClass('active');
		}, 700);
	});

	/*$('.recovery-modal .btn').click( function(e) {
		e.preventDefault();
		$('.recovery-modal').removeClass('active');
		setTimeout(function () {
			$('.success-modal').addClass('active');
		}, 700);
	});*/


	$('#booking-btn').click( function (e) {
		e.preventDefault();
		$('.modal-backdrop').fadeIn(700);
		$('.booking-modal').addClass('active');
	});

	// Slide page
	$('.rooms .side-nav a').click( function() {
		$('.rooms .side-nav a').parent().removeClass('active');
		$(this).parent().addClass('active');
	});

	$('.rooms .side-nav a').click( function(){
		$('.slide-page').removeClass('active');
	});


	//description page - sliding
	$('.description-link a').click( function () {
		$('.slide-page.description').addClass('active');
	});


	//schedule page - sliding
	$('.schedule-link a').click( function () {
		$('.slide-page.schedule').addClass('active');
	});


	//rent page - sliding
	$('.rent-link a').click( function () {
		$('.slide-page.rent').addClass('active');
	});


	//mobile back btn for slidingpage
	$('.back, .burger').click( function () {
		$('.slide-page').removeClass('active');

		$('.side-nav li').removeClass('active');
		$('.side-nav li:first').addClass('active');
	});

	//checkbox ids
	// var id = 1,
	// 	forId = 1;

	// $('.days-field li input').each(function() {
	// 	$(this).attr('id', 'checkbox-'+id);
	// 	id++;
	// });


	// $('.days-field li input+label').each(function() {
	// 	$(this).attr('for', 'checkbox-'+forId);
	// 	forId++;
	// });

	// booking fields
	$('.arrows.right').click(function(event) {
		$('.days-field').removeClass('fadeIn').addClass('fadeOut');
		$('.day-nav ul').removeClass('fadeInDown').addClass('fadeOut');
		setTimeout( function(){
			$('.days-field').removeClass('fadeOut').addClass('fadeIn');
			$('.day-nav ul').removeClass('fadeOut').addClass('fadeInDown');
		}, 800);
	});

	$('.arrows.left').click(function(event) {
		$('.days-field').removeClass('fadeIn').addClass('fadeOut');
		$('.day-nav ul').removeClass('fadeInDown').addClass('fadeOut');
		setTimeout( function(){
			$('.days-field').removeClass('fadeOut').addClass('fadeIn');
			$('.day-nav ul').removeClass('fadeOut').addClass('fadeInDown');
		}, 800);
	});

	// expand password section

	$('.new-password').click( function () {
		$(this).hide(340);
		setTimeout( function () {
			$('.password-form').fadeIn(500);
		}, 330);
	});
});


