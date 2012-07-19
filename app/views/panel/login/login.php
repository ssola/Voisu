{% include 'general/header.php' %}


	
    <div class="loginform">
    	<div class="title"> <img src="/static/img/logo.png" width="112" height="35" /></div>
        <div class="body">
       	  <form id="form1" name="form1" method="post" action="/panel/login/">
          	<label class="log-lab">{% trans _('Email') %}</label>
            <input name="email" type="text" class="login-input-user" id="email" value="{{data.email}}"/>
          	<label class="log-lab">{% trans _('Password') %}</label>
            <input name="password" type="password" class="login-input-pass" id="password" value="{{data.password}}"/>
            <input type="submit" name="button" id="button" value="{% trans _('Acceder') %}" class="button"/>
       	  </form>
        </div>
    </div>
    
    
    
    





</div>
</body>
</html>