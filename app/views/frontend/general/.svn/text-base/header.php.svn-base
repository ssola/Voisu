 <!-- Header -->
<header style="background-image:url(/static/img/party.jpg);">

	<div class="container_12">

		<!-- Title and navigation panel -->
		<div id="panel" class="grid_12">

			<!-- Title -->
			<h1><img src="/static/img/logo_small.png"></h1>

			<!-- Navigation -->
			<nav>
				<ul>
					<li>
						<a href="browse.html">{% trans _('Fiestas') %}</a>
						<ul>	
							<li><a href="browse.html">{% trans _('Destacadas') %}</a></li>
							<li><a href="browse_hotels.html">{% trans _('Ver todas') %}</a></li>
						</ul>
					</li>
					<li>
						<a href="faq.html">{% trans _('Discotecas') %}</a>
						<ul>
							<li><a href="browse.html">{% trans _('Destacadas') %}</a></li>
							<li><a href="browse_hotels.html">{% trans _('Ver todas') %}</a></li>
							<li><a href="browse_hotels.html">{% trans _('Servicios para empresas') %}</a></li>
						</ul>
					</li>
					{% if current_user.id %}
					<li>
						<a href="blog.html">{% trans _('Tus compras') %}</a>
						<ul>
							<li><a href="blog.html">{% trans _('Entradas compradas') %}</a></li>
						</ul>
					</li>
					{% endif %}
					<li>
						<a href="blog.html">Blog</a>
						<ul>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="blogpost.html">Blogpost</a></li>
						</ul>
					</li>
					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>

				<!-- Search -->
				<form action="#" class="black">
					<input name="search" type="text" placeholder="Search..." />
					<input type="submit" />
				</form>
			</nav>
		
		</div>
		
		<div class="location grid_12">
			<div style="float:left;width:50%">{% trans _('Está viendo eventos de la provincia de ') %} <strong>{% exec get_user_estate %}</strong> ({% exec get_user_country %}) {% trans _(' | Cambiar') %}</div>
			{% if current_user.id %}
			<div style="float:left;width:50%;text-align:right;">Bienvenido <strong>{{current_user.name}}</strong> | Salir
			{% else %}
			<div style="float:left;width:50%;text-align:right;">{% trans _('¿Quieres comprar antes que nadie entradas para las mejores fiestas?') %} &nbsp; <a href="/oauth/login/facebook"><span class="fb_login">{% trans _('Login con Facebook') %}</span></a></div>
			{% endif %}
		</div>
	
	</div>
	
</header>