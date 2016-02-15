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
});