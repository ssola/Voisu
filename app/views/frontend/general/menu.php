	<div id="header">
				<div id="header">
					<div style="overflow:hidden;">
						<div id="header-left">
							<a href="/"><img src="{{_config.img_url}}/logo.png" alt="PeroYa" /> </a>
						</div>
						<div id="header-right">
							<div id="user_bar">
								{% if current_user.id > 0 %}
									<img src="http://graph.facebook.com/{{current_user.oauth_userid}}/picture?type=small" width="16px" height="16px" align="abbsmiddle" > {% trans _('Welcome') %} <a href="{% exec setLink 'users', 'home' %}"><strong>{{current_user.name}}</strong></a> | 
									{% if current_user.is_business == 0 %}
									<a href="{% exec setLink 'business' %}"><img src="{{_config.img_url}}/icons/money.png"> {% trans _('Are you a Business?') %}</a> 
									{% endif %}
								| <a href="{% exec setLink 'support', 'index' %}">{% trans _('Support') %}</a> | <a href="{{facebook_logout_url}}"><span id="logout">{% trans _('Logout') %}</span></a>
								{% else %}
									{% trans _('You don´t have an accout yet?') %} <span class="label notice"><a href="{% exec setLink 'login' %}">{% trans _('Register or Login') %}</a></span>
								{% endif %}
							</div>
							<div>
								<div style="float:left;width:50%;">
									<span style="font-size:22px;">{{_config.selected_city}}</span><span style="font-size:14;"> {% trans _('version') %}</span>
								</div>
								<div style="float:left;width:50%;text-align:right;">
									<span id="change_options"><img src="{{_config.img_url}}/city.png"> {% trans _('City / Language / Currency') %}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="menu">
					<div id="topbar">
						<ul>
							<li><a href="{% exec setLink 'index' %}">{% trans _('Home') %}</a></li>
							<li><a href="{% exec setLink 'search' %}">{% trans _('Ofertas') %}</a></li>
							<li><a href="{% exec setLink 'search','map' %}">{% trans _('Empresas') %}</a></li>
							{% if current_user.is_business == 1 %}
								<li><a href="{% exec setLink 'venues' %}"><img src="{{_config.img_url}}/icons/door_open.png"> {% trans _('Your venues') %}</a></li>
								<li><a href="{% exec setLink 'search','map' %}"><img src="{{_config.img_url}}/icons/tag_red.png"> {% trans _('Your deals') %}</a></li>
								<li><a href="{% exec setLink 'search','map' %}"><img src="{{_config.img_url}}/icons/pencil.png"> {% trans _('Preferences') %}</a></li>
								<li><a href="{% exec setLink 'payments' %}"><img src="{{_config.img_url}}/icons/coins.png"> {% trans _('Payments') %}</a></li>
							{% endif %}
						</ul>
					</div>
					{% if breadcrumb != null %}
					<div>
						<ul id="crumbs">
							{% for items in breadcrumb %}
								<li>
								{% if items.url != "" %}
									<a href="{{item.url}}">{{items.title}}</a>
								{% else %}
									{{items.title}}
								{% endif %}
								</li>
							{% endfor %}
						</ul>
					</div>
					{% endif %}
				</div>
			</div>