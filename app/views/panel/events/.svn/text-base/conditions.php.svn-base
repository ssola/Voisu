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
                    		<div class="titlebar">	<h2>{% trans _('Condiciones del evento') %}</h2>	<p>{% trans _('Aquí podrá especificar las condiciones de su evento que los clientes deberán aceptar.') %}</p></div>
                    		                         <div class="shortcuts-icons">
                            	<a class="shortcut tips" href="/panel/events/" title="{%  trans _('Refrescar') %}"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a>
                            	<a class="shortcut tips" href="/panel/events/add/" title="{%  trans _('Nuevo Local') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>
                            </div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                        <blockquote style="margin-bottom:10px">{% trans _('Estás serán las condiciones que sus clientes deberán aceptar para comprar sus entradas. Así que indique claramente por ejemplo requisitos de vestimenta, edad, etc...') %}</blockquote>
                    	{% if event_data %}
                            <div class="simplebox grid740">
                                <div class="titleh">
                                    <h3>{% trans _('Añadir Condiciones') %}</h3>
                                </div>
                                <div class="body">
                                     <form id="form2" name="form2" method="post" action="/panel/events/conditions/{{event_data.id}}">
                                         <textarea name="content" id="wysiwyg" class="st-forminput" rows="5" cols="47" style="width:96.5%;">{{content.content}}</textarea>
                                        <p style="padding:10px">{% trans _('La última modificación fue: ') %} {% exec date 'd/m/Y H:i:s', content.modified %}</p>
                                        <div class="button-box">
                                          <input type="submit" name="button" id="button" value="{% trans _('Guardar') %}" class="st-button"/>
                                          <input type="reset" name="button" id="button2" value="{% trans _('Resetear') %}" class="st-clear"/>
                                        </div>                                        
                                    </form>
                                </div>
                            </div>                 

                    	{% else %}
                        <div class="error-page">
                        	<img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" />
                            <h2 class="red">{% trans _('Este evento no existe') %} </h2>
                            <p>{% trans _('Vaya, parece que ha ido a parar a un evento que no existe... pero podría crearlo ahora!') %}</p>
                            <div class="padding30"><a href="/panel/events/" class="button">{% trans _('Volver atrás') %}</a><a href="/panel/events/add/" class="button">{% trans _('Crear evento') %}</a></div>
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