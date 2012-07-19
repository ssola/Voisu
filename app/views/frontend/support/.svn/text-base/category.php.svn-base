{% include 'general/top.php' %}
{% include 'general/menu.php' %}
<div class="main_content">
	<div id="col_left">
		<div class="info_index">
			<h1>{{cat_name}}</h1>
		</div>
		<div class="info_index">
			{% if topics != false %}
				<ul>
				{% for topic in topics %}
					<li><a href="{% exec setLink 'support', 'answer', topic.slug %}"><h2>{{topic.title}}</h2></a><p>{% exec substr topic.content, 0,150 %} ...</p></a></li>
				{% endfor %}
				</ul>
			{% else %}
				{% trans _('We are sorry but we do not find artiles in this category') %}
			{% endif %}
		</div>
	</div>
	<div id="col_right">
		{% include 'support/sidebar.php' %}
	</div>
</div>
{% include 'general/footer.php' %}