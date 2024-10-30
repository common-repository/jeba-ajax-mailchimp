(function() {
	tinymce.PluginManager.add('mailchimp_jeba_slider_button', function( editor, url ) {
		editor.addButton('mailchimp_jeba_slider_button', {
			icon: 'my-mce-icon',
			onclick: function() {
				editor.insertContent('[jeba_mailchimp formaction="http://prowpexpert.us8.list-manage.com/subscribe/post?u=xxxxxxxxxx&amp;id=xxxxxxx" title1="Subscribe Form" title2="Jeba ajax MailChimp plugin" submit="Subscribe "]');
			}
		});
	});
})();