{% include 'general/top.php' %}
{% include 'general/menu.php' %}
<div class="main_content">
	<div id="col_left">
		<div class="info_index">
			<img src="{{_config.img_url}}/venues.png">
			<h2>{% trans _('Venues') %}</h2>
			<p>{% trans _('Add all your venues. Each offer is related to your venues. So is very important to add it correctly.') %}</p>
			<p>{% trans _('Remember that you must offer exactly your address, it is very important because our system can guide people to your venues efficiently.') %}</p>
			<p><button onClick="location.href='{% exec setLink 'venues','add' %}'" class="btn btn-large"><img src="{{_config.img_url}}/icons/add.png"> {% trans _('Add your first venue') %}</button></p>
		</div>		
	</div>

	<div id="col_right">
		{% if current_user.is_business == 0 %}
			<div class="alert_ad">
				<h2><img src="{{_config.img_url}}/icons/coins.png">  ¿Tienes un negocio?</h2>
				<p>¿Quieres ganar dinero ofreciendo ofertas? Apréta aquí y aprende como <strong>peroya</strong> puede ayudarte.</p>
			</div>
		{% endif %}
	</div>
</div>
{% include 'general/footer.php' %}