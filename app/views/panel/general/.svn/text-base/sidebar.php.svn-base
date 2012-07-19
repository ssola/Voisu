
<!-- START SIDEBAR -->
        <div id="sidebar">
        	
            <!-- start searchbox -->
            <div id="searchbox">
            	<div class="in">
               	  <form id="form1" name="form1" method="post" action="">
                  	<input name="textfield" type="text" class="input" id="textfield" onfocus="$(this).attr('class','input-hover')" onblur="$(this).attr('class','input')"  />
               	  </form>
            	</div>
            </div>
            <!-- end searchbox -->
            
            <!-- start sidemenu -->
            <div id="sidemenu">
            	<ul>
            		
            		{% if current_controller == "dashboard" %}
                	<li class="active">
                	{% else %}
                		<li class="subtitle">
                	{% endif %}
                	
                	<a href="/panel/dashboard/"><img src="/static/img/icons/sidemenu/laptop.png" width="20" height="20" alt="icon"/>{% trans _('Inicio') %}</a></li>
            		
            		{% if current_controller == "venues" %}
                	<li class="subtitle active">
                	{% else %}
                		<li class="subtitle">
                	{% endif %}
                	
                    	<a class="action" href="#"><img src="/static/img/icons/mapIcon.png" width="20" height="20" alt="icon"/>{% trans _('Locales') %}<img src="/static/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /> </a>
                    	<ul class="submenu">
                        <li><a href="/panel/venues/add/">{% trans _('Añadir nuevo') %}</a></li>
                        <li><a href="/panel/venues/">{% trans _('Ver todos') %}</a></li>
                        </ul>
                    </li>

            		{% if current_controller == "events" %}
                	<li class="subtitle active">
                	{% else %}
                		<li class="subtitle">
                	{% endif %}
                    	<a class="action" href="#"><img src="/static/img/icons/icon_archive.png" width="20" height="20" alt="icon"/>{% trans _('Eventos') %}<img src="/static/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /> </a>
                    	<ul class="submenu">
                        <li><a href="/panel/events/add">{% trans _('Añadir nuevo') %}</a></li>
                        <li><a href="/panel/events">{% trans _('Ver todos') %}</a></li>
                        </ul>
                    </li>
                    
            		{% if current_controller == "billing" %}
                	<li class="subtitle active">
                	{% else %}
                		<li class="subtitle">
                	{% endif %}
                    	<a class="action" href="#"><img src="/static/img/icons/coins-icon.png" width="20" height="20" alt="icon"/>{% trans _('Pagos') %}<img src="/static/img/arrow-down.png" width="7" height="4" alt="arrow" class="arrow" /> </a>
                    	<ul class="submenu">
                        <li><a href="#">{% trans _('Ver historial') %}</a></li>
                        <li><a href="#">{% trans _('Preferencias') %}</a></li>
                        </ul>
                    </li>
               
                </ul>
            </div>
            <!-- end sidemenu -->
            
        </div>
        <!-- END SIDEBAR -->
        