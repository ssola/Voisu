{% include 'general/header.php' %}
<div class="wrapper">
	{% include 'general/top.php' %}
    <!-- START MAIN -->
    <div id="main">      
        {% include 'general/sidebar.php' %} 
        <!-- START PAGE -->
        <div id="page">
            	
                
                <!-- start page title -->
                <div class="page-title">
                	<div class="in">
                    		<div class="titlebar">	<h2>{% trans _('Todos sus locales') %}</h2>	<p>{% trans _('Organice desde aquí todos los locales que administra.') %}</p></div>
                    		                         <div class="shortcuts-icons">
                            	<a class="shortcut tips" href="/panel/venues/" title="{%  trans _('Refrescar') %}"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a>
                            	<a class="shortcut tips" href="/panel/venues/add/" title="{%  trans _('Nuevo Local') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>
                            </div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    	{% if user_venues %}
                    		{% for venue in user_venues %}
	                        <div class="simplebox grid740">
	                        	<div class="titleh"><a href="/panel/venues/view/{{venue.id}}"><h3>{{venue.name}} ( {% trans _('en') %} {% exec getCityName venue.city_id %} )</h3></a></div>
	                            
	                            <div class="body padding20">
	                             	<a href="/panel/venues/view/{{venue.id}}" class="icon-button"><img src="/static/img/icons/button/info.png" width="18" height="18" alt="icon"/><span>{% trans _('Ver este local') %}</span></a>
	                            	<a href="/panel/venues/edit/{{venue.id}}" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>{% trans _('Editar local') %}</span></a>
	                            	<a href="#" class="icon-button"><img src="/static/img/icons/button/graph.png" width="18" height="18" alt="icon"/><span>{% trans _('Estadísticas') %}</span></a>
	                            	<a href="/panel/events/add?venue={{venue.id}}" class="icon-button"><img src="/static/img/icons/button/calendar.png" width="18" height="18" alt="icon"/><span>{% trans _('Crear nuevo evento') %}</span></a>	                            </div>
	                        </div>
	                        {% endfor %}
                    	{% else %}
                        <div class="error-page">
                        	<img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" />
                            <h2 class="blue">{% trans _('Todavía no ha añadido ningún local!') %} </h2>
                            <p>{% trans _('Los locales son los lugares donde podrá organizar eventos, por ello sí desea organizar un nuevo evento primero debe añadir un local. Así podrá organizar eventos y vender entradas por cada local que tenga. Recuerde además que para administrar las entradas deberá dar de alta un nuevo terminal.') %}</p>
                            <div class="padding30"><a href="/panel/venues/add/" class="button">Crear su primer local</a></div>
                        </div>
                        {% endif %}
                    </div>
                    <!-- END CONTENT -->

        </div>
        <!-- END PAGE -->

    <div class="clear"></div>
    </div>
    <!-- END MAIN -->  

{% include 'general/footer.php' %}