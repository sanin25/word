jQuery(document).ready(function($) {
  function setHeiHeight() {
      $('.container').css({
          height: $(window).height() + 'px'
      });
  }
  setHeiHeight(); // устанавливаем высоту окна при первой загрузке страницы
  $(window).resize( setHeiHeight ); // обновляем при изменении размеров окна


  $(window).scroll(function() {
  var par = $(this).scrollTop();
  console.log(par);
  $(".cont1 img").css({
  	"transform" :"translate(0%"+ par +"%",
  	"-webkit-transform" : "translate3d(0px," + par /4  + "%, .01px)",
  });
  });
  

	$("#vot").click(function() {
		$(this).css({"background-color": "yellow", "font-size": "200%"});
	});
/*
	$('.gallery-icon  img').magnificPopup({
	  type:'image',
	  callbacks: {
	    elementParse: function(item) {
	      // Function will fire for each target element
	      // "item.el" is a target DOM element (if present)
	      // "item.src" is a source that you may modify

	      console.log(item); // Do whatever you want with "item" object
	    }
	  }
	});

Вызоа вормы отправки письма
	$('#poch').magnificPopup({
		type: 'inline',
		preloader: true,
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
	});*/
	/*Обработка формы отправки письма*/
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
	
	$('.sub-menu li a[href="'+link+'"],.menu-item > a[href="'+link+'"] ').addClass('act').removeAttr("href");
	/*Конец Акт меню*/

	

	
	 

});