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
                    		<div class="titlebar">	<h2>{% trans _('Local: ') %} {{venue_data.name}}</h2>	<p>{% trans _('Vea desde este panel toda la información de su local') %}</p></div>
                    		                         <div class="shortcuts-icons">
                            	<a class="shortcut tips" href="/panel/venues/" title="{%  trans _('Refrescar') %}"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a>
                            	<a class="shortcut tips" href="/panel/venues/add/" title="{%  trans _('Nuevo Local') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>
                            </div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    	{% if venue_data %}
	                        <div class="simplebox grid740">
	                        	<div class="titleh"><h3>{% trans _('Acciones') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	<a href="/panel/venues/edit/{{venue_data.id}}" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>{% trans _('Editar local') %}</span></a>
	                            	<a href="#" class="icon-button"><img src="/static/img/icons/button/graph.png" width="18" height="18" alt="icon"/><span>{% trans _('Estadísticas') %}</span></a>
	                            	<a href="/panel/events/add?venue={{venue_data.id}}" class="icon-button"><img src="/static/img/icons/button/calendar.png" width="18" height="18" alt="icon"/><span>{% trans _('Crear nuevo evento') %}</span></a>
	                            	<a href="/panel/venues/photos/{{venue_data.id}}" class="icon-button"><img src="/static/img/icons/button/slide.png" width="18" height="18" alt="icon"/><span>{% trans _('Fotografías') %}</span></a>
	                            	<a href="/panel/venues/delete/{{venue_data.id}}" class="icon-button"><img src="/static/img/icons/button/cut.png" width="18" height="18" alt="icon"/><span>{% trans _('Eliminar') %}</span></a>
	                            </div>
	                        </div>
	                        
	                        <div class="simplebox grid360-left">
	                        	<div class="titleh"><h3>{% trans _('Eventos activos') %}</h3>
	                            <div class="shortcuts-icons">
                               	 <a class="shortcut tips" href="/panel/events/add?venue={{venue_data.id}}" title="{% trans _('Crear nuevo evento') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>	                            
	                            </div>
	                        	</div>
	                                <script>
	                            	getEvents({{venue_data.id}});
	                            	</script>               
	                            <div class="body padding20" id="events">

                                    <div class="loadingbox">
		                            	<img src="/static/img/loading/1.gif" width="40" height="40" alt="loading-icon" />
		                                <h3>{% trans _('Cargando...') %}</h3>
		                                <p>{% trans _('Estamos recuperando sus eventos.') %}</p>
		                            </div>
	                            </div>
	                        </div>     
	                        <div class="simplebox grid360-right">
	                        	<div class="titleh"><h3>{% trans _('Informació del local') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	<ul class="list-arrow">
	                            		<li>{% trans _('Nombre') %}: {{venue_data.name}}</li>
	                            		<li>{% trans _('Web') %}: {{venue_data.web}}</li>
	                            		<li>{% trans _('Email') %}: {{venue_data.email}}</li>
	                            		<li>{% trans _('Teléfono') %}: {{venue_data.telephone}}</li>
	                            		<li>{% trans _('País') %}: {% exec getCountryName venue_data.country_id %}</li>
	                            		<li>{% trans _('Ciudad') %}: {% exec getEstateName venue_data.estate_id %}</li>
	                            		<li>{% trans _('Provincia') %}: {% exec getCityName venue_data.city_id %}</li>
	                            		<li>{% trans _('Dirección') %}: {{venue_data.address}}</li>
	                            		<li>{% trans _('Última modificación') %}: {% exec date 'H:i:s d/m/Y',venue_data.modified %}</li>
	                            	</ul>
	                            	<p>
	                            		{% if url_map %}
	                            			<img src="{{url_map}}">
	                            		{% endif %}
	                            	</p>
	                            </div>
	                        </div>                          
	                        <div class="simplebox grid360-left">
	                        	<div class="titleh"><h3>{% trans _('Logotipo') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	{% if venue_logo %}
	                            	<p><img src="{{venue_logo}}" /></p>
	                            	{% endif %}
	                           		<form action="/panel/venues/uploadlogo/" enctype="multipart/form-data" method="post">
	                           			<input type="hidden" name="venue_id" id="venue_id" value="{{venue_data.id}}">
		                            	<div class="st-form-line" style="padding:0;margin:0;border:0;">	
	                                    	<span class="st-labeltext">{% trans _('Suba un nuevo logo') %}</span>	
	                                        <input type="file" class="uniform" name="logo" id="logo" />
	                                  		<div class="clear"></div> 
	                                    </div>
                                   	 	 <input type="submit" name="button" id="button" value="{% trans _('Subir imagen') %}" class="st-button"/>
	                                 </form>
	                            </div>
	                        </div>  
	                       <div class="simplebox grid360-right">
	                        	<div class="titleh"><h3>{% trans _('Fotogalería') %}</h3></div>
	                        	<div class="body">
	                            	{% if gallery %}
                                    <div class="imagebox">
                                    	{% for image in gallery %}
                                    		<a href="/panel/venues/photos/{{venue_data.id}}"><img src="{% exec getImage image.path,'thumb' %}" width="46" height="38" alt="img" title="{% trans _('Subida el: ') %}{% exec date 'd/m/Y H:i:s', image.created %}" class="tips"/></a>
                                    	{% endfor %}
                                    </div>
	                            	{% else %}
				                        <div class="error-page">
				                        	<img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" />
				                            <h2 class="blue">{% trans _('Sin imágenes') %} </h2>
				                            <p>{% trans _('Añada imágenes a la fotogalería de su local') %}</p>
											<div class="padding30"><a href="/panel/venues/photos/{{venue_data.id}}" class="button">{% trans _('Añadir imágenes') %}</a></div>
				                        </div>	                            	
	                            	{% endif %} 
	                            	<div class="clear"></div>  	        
	                            </div>
	              			</div>
 
                    	{% else %}
                        <div class="error-page">
                        	<img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" />
                            <h2 class="red">{% trans _('Este local no existe') %} </h2>
                            <p>{% trans _('Vaya, parece que ha ido a parar a un local que no existe... pero podría crearlo ahora!') %}</p>
                            <div class="padding30"><a href="/panel/venues/" class="button">{% trans _('Volver atrás') %}</a><a href="/panel/venues/add/" class="button">{% trans _('Crear local') %}</a></div>
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