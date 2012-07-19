	<!-- START HEADER -->
    <div id="header">
    
    
    	<!-- logo -->
    	<div class="logo">	<a href="index.html"><img src="/static/img/logo_small.png" width="150" height="47" alt="logo"/></a>	</div>
      
        
        
        <!-- profile box -->
        <div id="profilebox">
        	<a href="#" class="display">
            	<img src="/static/img/icons/anonymous.png" width="33" height="33" alt="profile"/>	<b>{% trans _('Sesión de') %}</b>	<span>{{current_user.name}}</span>
            </a>
            
            <div class="profilemenu">
            	<ul>
                	<li><a href="#">{% trans _('Preferencias') %}</a></li>
                	<li><a href="/panel/login/logout/">{% trans _('Cerrar sesión') %}</a></li>
                </ul>
            </div>
            
        </div>
        
        
        <div class="clear"></div>
    </div>
    <!-- END HEADER -->