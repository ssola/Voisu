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
                    		<div class="titlebar">	<h2>{% trans _('Centro de mando') %}</h2>	<p>{% trans _('Empieza a ganar nuevos clientes con Klubme') %}</p></div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    
                    	<!-- start simple tips -->
                		<div class="simple-tips">
                        	<h2>{% trans _('¿Tú primera visita?') %}</h2>
                        	<ul>
                        		<li>{% trans _('1. Añade un nuevo local') %}</li>
                        		<li>{% trans _('2. Crea un nuevo evento para tú primer local') %}</li>
                        		<li>{% trans _('3. Añade entradas a tú evento') %}</li>
                        		<li>{% trans _('4. Empieza a vender!!') %}</li>
                        	</ul>
                            <a href="#" class="close tips" title="{% trans _('Cerrar ventana de ayuda') %}"><li>{% trans _('cerrar') %}</li></a>
                        </div>
                        
                        <div class="grid740">
                        	<a href="/panel/venues/add" class="dashbutton">	<img src="/static/img/icons/dashbutton/write.png" width="44" height="32" alt="icon" />	<b>{% trans _('Añadir Local') %}</b>	{% trans _('Añadir todos los locales que desee administrar') %}</a>
                        	<a href="#" class="dashbutton">	<img src="/static/img/icons/dashbutton/calendar.png" width="44" height="32" alt="icon" />	<b>{% trans _('Nuevo Evento') %}</b>	{% trans _('Añada un nuevo evento!') %}</a>
                        	<a href="#" class="dashbutton">	<img src="/static/img/icons/dashbutton/money.png" width="44" height="32" alt="icon" />	<b>{% trans _('Estadísticas') %}</b>	{% trans _('Vea como va su negocio') %}</a>
                        	<a href="#" class="dashbutton">	<img src="/static/img/icons/dashbutton/users.png" width="44" height="32" alt="icon" />	<b>{% trans _('Clientes') %}</b>	{% trans _('Conozca a sus clientes') %}</a>
                        	<a href="#" class="dashbutton">	<img src="/static/img/icons/dashbutton/settings.png" width="44" height="32" alt="icon" />	<b>{% trans _('Terminales') %}</b>	{% trans _('Configure sus terminales') %}</a>
                        	<a href="#" class="dashbutton">	<img src="/static/img/icons/dashbutton/creadit-card.png" width="44" height="32" alt="icon" />	<b>{% trans _('Sus pagos') %}</b>	{% trans _('Datos sobre sus transacciones') %}</a>
                        	<a href="#" class="dashbutton">	<img src="/static/img/icons/dashbutton/help.png" width="44" height="32" alt="icon" />	<b>{% trans _('Soporte') %}</b>	{% trans _('¿Tiene dudas?') %}</a>
                        </div>
                        
     
                    </div>
                    <!-- END CONTENT -->

        </div>
        <!-- END PAGE -->

    <div class="clear"></div>
    </div>
    <!-- END MAIN -->  

{% include 'general/footer.php' %}