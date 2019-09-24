// JavaScript Document
$('#imgload img').imgLazyLoad({
				container: window,
				effect: 'fadeIn',
				speed: 600,
				delay: 100,
				callback: function(){
				$( this ).css( 'opacity', .99 );
				}
			});