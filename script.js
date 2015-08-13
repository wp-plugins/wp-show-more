jQuery( document ).ready( function(){
   jQuery( '.show_more_title' ).
   click( function(){
	jQuery( this ).
	parent().
	children( '.show_more_body' ).
	slideToggle();
   });
});
