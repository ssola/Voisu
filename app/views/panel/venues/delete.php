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
                    		<div class="titlebar">	<h2>{% trans _('Eliminar local') %}</h2>	<p>{% trans _('Aquí podrá dar de baja su local.') %}</p></div>
                    		                         <div class="shortcuts-icons">
                            	<a class="shortcut tips" href="/panel/venues/" title="{%  trans _('Refrescar') %}"><img src="/static/img/icons/shortcut/refresh.png" width="25" height="25" alt="icon" /></a>
                            	<a class="shortcut tips" href="/panel/venues/add/" title="{%  trans _('Nuevo Local') %}"><img src="/static/img/icons/shortcut/plus.png" width="25" height="25" alt="icon" /></a>
                            </div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    	{% if venue_data %}
                        <div class="error-page">
                        	<img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" />
                            <h2 class="blue">{% trans _('¿Está seguro que quiere eliminar el local ') %} {{venue_data.name}} {% trans _('?') %}</h2>
                            <p>{% trans _('Recuerde que sí da de baja este local no podrá recuperarlo. Los datos serán eliminados automáticamente, todos sus datos. Los pagos pendientes a esta cuenta serán abonados en la fecha que sea indicada igualmente.') %}</p>
                            <div class="padding30"><a href="/panel/venues/" class="button-green">{% trans _('Volver atrás') %}</a><a href="/panel/venues/add/" class="button-red">{% trans _('Eliminar local') %}</a></div>
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