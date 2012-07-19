{% include 'general/top.php' %}
{% include 'general/header.php' %}
<!-- Main content -->
<div class="container_12">
	<div class="destacados">
	<h1>{{venue_data.name}}</h1>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=178072415655271";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
	<!-- Description -->
	<section class="description results_wide grid_12">

		<a href="{% exec getImage venue_data.path,'' %}" class="main_image fancybox"><img width="300px" height="200px" src="{% exec getImage venue_data.path,'medium' %}" alt="" /></a>

		<div>
			<span>
				<span class="boxed"><a href="#">{% exec utf8_encode venue_data.poblacion %}</a></span>
			</span>
			<span>Wellness</span>
			<span>Golf</span>
		</div>

		<p>{{venue_data.description}}</p>
		<p>
			<div class="fb-like boxed" data-href="http://www.klubme.com/venue/view/{{venue_data.id}}" data-send="true" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial">
			</div>
		</p>

	</section>

	{% if gallery %}
	<!-- Image gallery -->
	<section class="gallery grid_12">
		
		<!-- Slider navigation -->
		<nav class="slider_nav">
			<a href="#" class="left">&nbsp;</a>
			<a href="#" class="right">&nbsp;</a>
		</nav>

		<!-- Slider -->
		<div class="slider_wrapper">

			<!-- Slider content -->
			<div class="slider_content">
				{% for image in gallery %}
				<a href="{% exec getImage image.path,'' %}">
					<img width="150px" height="110px" src="{% exec getImage image.path,'thumb' %}" alt="" />
				</a>
				{% endfor %}
			</div>

		</div>

	</section>
	{% endif %}
</div>

	{% if events %}
	<section class="similar_hotels grid_4">
		
		<h2 class="section_heading">{% trans _('Próximos eventos') %}</h2>
		<ul>
			{% for event in events %}
			<li>
				<a href="#"  class="thumb"><img width="40px" height="40px" src="{% exec getImage event.path,'thumb' %}" alt="" /></a>
				<h3><a href="#">{{event.name}}</a></h3>
				<div>
					<span><a href="#">{% exec utf8_encode event.poblacion %}</a></span>
					{% if event.price %}
					<span><strong>{{event.price}} €</strong></span>
					{% endif %}
				</div>
			</li>
			{% endfor %}
		</ul>
		
	</section>
	{% endif %}

		<!-- Map -->
	<section class="map grid_4">
		{% if url_map %}
			<img src="{{url_map}}">
		{% endif %}
	</section>

	<section class="similar_hotels grid_4">
		<h2 class="section_heading">{% trans _('Datos de contacto') %}</h2>
		<ul>
    		<li>{% trans _('Web') %}: {{venue_data.web}}</li>
    		<li>{% trans _('Email') %}: {{venue_data.email}}</li>
    		<li>{% trans _('Teléfono') %}: {{venue_data.telephone}}</li>
    		<li>{% trans _('País') %}: {% exec getCountryName venue_data.country_id %}</li>
    		<li>{% trans _('Ciudad') %}: {% exec getEstateName venue_data.estate_id %}</li>
    		<li>{% trans _('Provincia') %}: {% exec getCityName venue_data.city_id %}</li>
    		<li>{% trans _('Dirección') %}: {{venue_data.address}}</li>
		</ul>
	</section>
</div> 
{% include 'general/footer.php' %}