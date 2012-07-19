{% include 'general/top.php' %}
{% include 'general/header.php' %}
<!-- Main content -->
<div class="container_12">
	<div class="destacados">
	<h1>{{event.name}}</h1>
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

		<a href="{% exec getImage event.path,'' %}" class="main_image fancybox"><img width="300px" height="200px" src="{% exec getImage event.path,'medium' %}" alt="" /></a>

		<div>
			<span>
				<span class="boxed"><a href="#">{% trans _('Entradas desde:') %} <strong>{{event.price}}&euro;</strong></a></span>
			</span>
			<span>{% trans _('Evento para mayores de 18 años') %}</span>
		</div>

		<p>{{event.description}}</p>
		<p>
			<div class="fb-like boxed" data-href="http://www.klubme.com/venue/view/{{venue_data.id}}" data-send="true" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial">
			</div>
		</p>

	</section>
</div>

	{% if tickets %}
	<section class="similar_hotels grid_4">
		
		<h2 class="section_heading">{% trans _('Entradas disponibles') %}</h2>
		<ul>
			{% for ticket in tickets %}
			<li>
				<div style="height:30px">
					<div style="float:left;width:70%;">
						<div style="float:left;width:50px">
							<img width="40px" height="40px" src="/static/img/ticket.png" alt="" />
						</div>
						<div style="float:left;">
							<h3><a href="/tickets/buy/{{event.id}}">{{ticket.name}}</a></h3>
							<div>
								<span><strong>{{ticket.price}} €</strong> ( {{ticket.number}} {% trans _('disponibles') %} )</span>
							</div>
						</div>
					</div>
					<div style="float:left;">
						<a href="/tickets/buy/{{event.id}}">{% trans _('Comprar') %}</a>
					</div>
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
		<h2 class="section_heading">{% trans _('Condiciones del evento') %}</h2>
		<p style="padding:10px">{{event.content}}</p>
	</section>
</div> 
{% include 'general/footer.php' %}