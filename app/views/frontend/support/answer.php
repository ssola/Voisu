{% include 'general/top.php' %}
{% include 'general/menu.php' %}
<div class="main_content">
	<div id="col_left">
		<div class="info_index">
			<h1>{{topic.title}}</h1>
		</div>
		<div class="info_index">
			{{topic.content}}
		</div>
	</div>
	<div id="col_right">
		{% include 'support/sidebar.php' %}
	</div>
</div>
{% include 'general/footer.php' %}