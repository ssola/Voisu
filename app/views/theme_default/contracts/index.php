{% include 'general/top.php' %}
{% include 'general/menu.php' %}
<div class="main_content">
	<div id="col_left">
		<div class="info_index">
			<img src="{{_config.img_url}}/contracts.png">
			<h2>{% trans _('Contracts') %}</h2>
			<p>{% trans _('Before use PeroYa you must accept this contracts. Yoou must understand this documents and accept it completely.') %}</p>
		</div>
</div>

	<div id="col_right">
			<div class="alert_ad">
				<h2><img src="{{_config.img_url}}/icons/info.png">  {% trans _('Remember') %}</h2>
				<p>{% trans _('Each end of month we will set here a request for a payment, so each end of month you will have to paid us the recipes.') %}.</p>
			</div>
	</div>
</div>
{% include 'general/footer.php' %}