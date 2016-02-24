jQuery(document).ready(function($) {
   /* $('body').tooltip({
        selector: "[data-toggle]", // можете использовать любой селектор
        placement: "top" 
    });
	*/
	$("#vot").click(function() {
		$(this).css({"background-color": "yellow", "font-size": "200%"});
	});

	$('#poch').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
	
	$("#form").submit(function() {
		var mail = {
			action : 'my_mail'
		};
		$.ajax({
			type: "POST",
			url: "/wp-admin/admin-ajax.php",
			data: $(this).serialize()
		}).done(function(vot) {
			
			alert(vot);
			$("#form").magnificPopup("close");
		});
		return false;
	});

/*	$('.prodaj').mouseover(function() {
		$(this).addClass('jello');

	});
	$('.prodaj').mouseout(function(event) {
		$(this).removeClass('jello');
	});
*/

/*	setInterval(function(){
	
		if ($('.prodaj').hasClass('swing'))
		{
		    $('.prodaj').removeClass('swing');
		
		} else {
		     $('.prodaj').addClass('swing');
		}
		
	},1000);*/
   /*Добавляем класс для фото*/
   $("img").addClass('responsive-img');
    /*Активное меню*/
	var link = window.location.href;
	console.log(link);
	
	$('.sub-menu li a[href="'+link+'"]').addClass('act');
	/*Конец Акт меню*/
	$(".retxt").fitText(1.2, { minFontSize: '9px', maxFontSize: '13px' })


	
	 

});