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
                    		<div class="titlebar">	<h2>{% trans _('Evento: ') %} {{event_data.name}}</h2>	<p>{% trans _('Vea desde este panel toda la información de su evento') %}</p></div>
                    		<div class="shortcuts-icons">
                            	<a class="shortcut tips" href="/panel/events/" title="{%  trans _('Refrescar') %}"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a>
                            	<a class="shortcut tips" href="/panel/events/add/" title="{%  trans _('Nuevo Evento') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>
                            </div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    	{% if event_data %}
	                        <div class="simplebox grid740">
	                        	<div class="titleh"><h3>{% trans _('Acciones') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	<a href="/panel/events/edit/{{event_data.id}}" class="icon-button"><img src="/static/img/icons/button/create.png" width="18" height="18" alt="icon"/><span>{% trans _('Editar Evento') %}</span></a>
	                            	<a href="#" class="icon-button"><img src="/static/img/icons/button/graph.png" width="18" height="18" alt="icon"/><span>{% trans _('Estdísticas') %}</span></a>
	                            	<a href="/panel/events/conditions/{{event_data.id}}" class="icon-button"><img src="/static/img/icons/button/lock.png" width="18" height="18" alt="icon"/><span>{% trans _('Editar condiciones del evento') %}</span></a>
	                            	<a href="/panel/events/photos/{{event_data.id}}" class="icon-button"><img src="/static/img/icons/button/slide.png" width="18" height="18" alt="icon"/><span>{% trans _('Fotografías') %}</span></a>
	                            	<a href="#" class="icon-button"><img src="/static/img/icons/button/cut.png" width="18" height="18" alt="icon"/><span>{% trans _('Eliminar') %}</span></a>
	                            </div>
	                        </div>
	          
	                        <div class="simplebox grid360-left">
	                        	<div class="titleh"><h3>{% trans _('Entradas') %}</h3>
	                            <div class="shortcuts-icons">
                               	 <a class="shortcut tips" href="/panel/tickets/add?event={{event_data.id}}" title="{% trans _('Crear nuevas entradas') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>	                            
	                            </div>
	                            </div>
	                            <div class="body padding20">
	                            	{% if tickets_result %}
										<ul class="statistics">
										{% for result in tickets_result %}
											<li><a href="/panel/tickets/view/{{result.id}}">{{result.name}} ( {{result.price}}&euro; )</a> - <span class="blue">{% exec date 'H:i:s d/m/Y', result.created %}</span>	</p>	</li>
										{% endfor %}
										</ul>	    
										<blockquote>{% trans _('Recuerde de especificar correctamente en la descripción las condiciones de las entradas.') %}</blockquote>                        		
	                            	{% else %}
	                       				<div class="error-page">
				                        	<img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" />
				                            <h2 class="blue">{% trans _('Todavía no ha creado entradas') %} </h2>
				                            <a href="/panel/tickets/add?event={{event_data.id}}" class="button">{% trans _('Crear Entradas!') %}</a>
	                       			 	</div>                            	
	                            	{% endif %}
	                            </div>
	                        </div>     
	                        <div class="simplebox grid360-right">
	                        	<div class="titleh"><h3>{% trans _('Informació del evento') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	<ul class="list-arrow">
	                            		<li>{% trans _('Nombre') %}: {{event_data.name}}</li>
	                            		<li>{% trans _('Empieza') %}: {% exec date 'H:i:s d/m/Y', event_data.starts %}</li>
	                            		<li>{% trans _('Edad mínima: 18 años') %}</li>
	                            	</ul>
	                            </div>
	                        </div>                          

	                        <div class="simplebox grid360-right">
	                        	<div class="titleh"><h3>{% trans _('Cartel') %}</h3></div>
	                            
	                            <div class="body padding20">
	                            	{% if event_logo %}
	                            	<p><img src="{{event_logo}}" /></p>
	                            	{% endif %}
	                           		<form action="/panel/events/uploadlogo/" enctype="multipart/form-data" method="post">
	                           			<input type="hidden" name="event_id" id="event_id" value="{{event_data.id}}">
		                            	<div class="st-form-line" style="padding:0;margin:0;border:0;">	
	                                    	<span class="st-labeltext">{% trans _('Suba el cartel del evento') %}</span>	
	                                        <input type="file" class="uniform" name="logo" id="logo" />
	                                  		<div class="clear"></div> 
	                                    </div>
                                   	 	 <input type="submit" name="button" id="button" value="{% trans _('Subir cartel') %}" class="st-button"/>
	                                 </form>
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