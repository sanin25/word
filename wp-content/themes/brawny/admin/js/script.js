( function( $ ) {
	// Add Make Plus message
		upgrade = $('<a class="brawny-buy-pro"></a>')
			.attr('href', 'http://www.webulousthemes.com/?add-to-cart=29')
			.attr('target', '_blank')
			.text(brawny_upgrade.message)
		;
		demo = $('<a class="brawny-docs"></a>')
			.attr('href','http://demo.webulous.in/brawny/')
			.attr('target','_blank')
			.text(brawny_upgrade.demo);
		docs = $('<a class="brawny-docs"></a>')
			.attr('href','http://docs.webulous.in/brawny-free/')
			.attr('target','_blank')
			.text(brawny_upgrade.docs);
		support = $('<a class="brawny-docs"></a>')
			.attr('href','http://www.webulousthemes.com/forums/forum/free-support/brawny/')
			.attr('target','_blank')
			.text(brawny_upgrade.support);

		$('.preview-notice').append(upgrade);
		$('.preview-notice').append(demo);
		$('.preview-notice').append(docs);
		$('.preview-notice').append(support);
		// Remove accordion click event
		$('.brawny-buy-pro').on('click', function(e) {
			e.stopPropagation();
		});
		$('.brawny-docs').on('click',function(e){
			e.stopPropagation();
		})
} )( jQuery );