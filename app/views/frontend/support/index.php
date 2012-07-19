{% include 'general/top.php' %}
{% include 'general/menu.php' %}
<div class="main_content">
	<div id="col_left">
		<div class="info_index">
			<img src="{{_config.img_url}}/help.png">
			<h2>{% trans _('Support Center') %}</h2>
			<p>{% trans _('Are you looking for help? This is your place. You can find here a lot of informationa how Hausu works, security topics and more. Please, read all the security topics for your security.') %}</p>
		</div>
	</div>
	<div id="col_right">
		{% include 'support/sidebar.php' %}
	</div>
</div>
{% include 'general/footer.php' %}