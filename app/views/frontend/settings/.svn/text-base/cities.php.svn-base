<div id="close_pop">
	<span class="close"><img src="{{_config.img_url}}/close.png"> <strong>Close</strong></span>
</div>
<div id="login_popup">
	<div class="bloc_right">
		<p><strong>Select your local version:</strong></p>
	</div>
	<div class="bloc_right">
		<ul class="bloc_right_list">
			{% if cities != false %}
				{% for item in cities %}
					{% if _config.selected_city == item.city %}
						<a href="{% exec setLink 'settings', 'set/city',item.city %}"><li class="bloc_right_list_selected"><span>{{item.numrooms}}</span> {{item.city}}</li></a>
					{% else %}
						<a href="{% exec setLink 'settings', 'set/city',item.city  %}"><li><span>{{item.numrooms}}</span> {{item.city}}</li></a>
					{% endif %}
				{% endfor %}
			{% endif %}
		</ul>
	</div>
	<div class="bloc_right">
		<p style="font-size:9px">
			We're working every day to add new cities, please be patient!
		</p>
	</div>
</div>