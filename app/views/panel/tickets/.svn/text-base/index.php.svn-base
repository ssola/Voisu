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
                    		<div class="titlebar">	<h2>{% trans _('Entrada: ') %} {{ticket_data.name}}</h2>	<p>{% trans _('Vea desde este panel toda la información de su entrada') %}</p></div>
                    		<div class="shortcuts-icons">
                            	<a class="shortcut tips" href="/panel/venues/view/{{ticket_data.venue_id}}" title="{%  trans _('Refrescar') %}"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a>
                            	<a class="shortcut tips" href="/panel/venues/add?venue={{ticket_data.venue_id}}" title="{%  trans _('Nuevo Entrada') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>
                            </div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    	{% if ticket_data %}
	                        <div class="simplebox grid740">
	                        	<div class="titleh"><h3>{% trans _('Acciones') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	<a href="/panel/tickets/edit/{{ticket_data.id}}" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>{% trans _('Editar Entrada') %}</span></a>
	                            	<a href="/panel/coupons/new?ticket={{ticket_data.id}}" class="icon-button"><img src="/static/img/icons/button/price-tag.png" width="18" height="18" alt="icon"/><span>{% trans _('Crear cupones descuento') %}</span></a>
	                            	<a href="#" class="icon-button"><img src="/static/img/icons/button/cut.png" width="18" height="18" alt="icon"/><span>{% trans _('Eliminar') %}</span></a>
	                            </div>
	                        </div>
	                        
	                        <div class="simplebox grid360-left">
	                        	<div class="titleh"><h3>{% trans _('Estadísticas ventas') %}</h3></div>
	                            
	                            <div class="body padding20">
									Estadísticas
	                            </div>
	                        </div>     
	                        <div class="simplebox grid360-right">
	                        	<div class="titleh"><h3>{% trans _('Informació de la entrada') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	<ul class="list-arrow">
	                            		<li>{% trans _('Nombre') %}: {{ticket_data.name}}</li>
	                            		<li>{% trans _('Caduca su venta') %}: {% exec date 'H:i:s d/m/Y', event_data.starts %}</li>
	      								<li>{% trans _('Precio') %}: {{ticket_data.price}}&euro;</li>
	      								<li>{% trans _('Número de enetradas disponibles') %}: {{ticket_data.number}}</li>
	                            	</ul>
	                            </div>
	                        </div>                          	                        
 
                    	{% else %}
                        <div class="error-page">
                        	<img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" />
                            <h2 class="red">{% trans _('Este evento no existe') %} </h2>
                            <p>{% trans _('Vaya, parece que ha ido a parar a un evento que no existe... pero podría crearlo ahora!') %}</p>
                            <div class="padding30"><a href="/panel/events/" class="button">{% trans _('Volver atrás') %}</a><a href="/panel/events/add/" class="button">{% trans _('Crear Evento') %}</a></div>
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
