<div class="bloc_right">
	<h3>{% trans _('Categories') %}</h3>
	<ul class="menu">
		{% if categories != false %}
			{% for category in categories %}
				<a href="{% exec setLink 'support', 'category', category.slug %}"><li><img src="{{_config.img_url}}/{{category.image}}">{{category.name}}</a>
			{% endfor %}
		{% endif %}
	</ul>
</div>