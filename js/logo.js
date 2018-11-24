jQuery(document).ready(function(){
	var templateUrl = admin_logo.templateUrl;
	var imgurl	= templateUrl;
	var logo_title = logo_site_title.siteTitle;

	jQuery( 'div.wrap' ).before( '<div id="admin-logo"><img style="cursor:pointer" src='+imgurl+' title='+logo_title+' alt="" /></div>' );
});

