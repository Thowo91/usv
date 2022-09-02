tld = new Array("com", "de", "org", "net")
jQuery(document).ready(function($) {
	$(".cloakMail").each(function(){
		var data = $(this).data();
		var keys = $.map(data , function(value, key) { return key; });
		var mail = data.pre+'@'+data.suf+'.'+tld[data.dom];
		var name = (data.display == undefined) ? name = mail : data.display;
		$(this).html('<a href="mailto:'+mail+'">'+name+'</a>');
		for(i = 0; i < keys.length; i++) {
   			$(this).removeAttr("data-" + keys[i]);
		}
	})
})