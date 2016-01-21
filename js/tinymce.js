jQuery(document).ready( function () { 
jQuery("#phf_credits").addClass("mceEditor"); 
if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
	jQuery("#phf_credits").wrap( "<div id='editorcontainer'></div>" ); 
	tinyMCE.execCommand("mceAddControl", false, "phf_credits");
}
});