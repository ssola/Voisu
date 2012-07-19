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
                    		<div class="titlebar">	<h2>{% trans _('Edición') %}</h2>	<p>{% trans _('Desde aquí podrá editar los datos básicos de su local.') %}</p></div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    {% if venue_data %}
                    	{% if success != false %}
                                <div class="albox succesbox">
                                	<b>{% trans _("Editado") %} :</b> {{success}}
                                	<a href="#" class="close tips" title="close">close</a>
                                </div>
                         {% endif %}
                         <!-- START SIMPLE FORM -->
                        	<div class="simplebox grid740">
                            	<div class="titleh">
                                	<h3>{% trans _('Editando:') %}</h3>
                                </div>
                                <div class="body">
                                
                                  <form id="form2" name="form2" method="post" action="/panel/venues/edit/{{venue_data.id}}">
                                  
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Nombre') %}</span>	
                                        <input name="name" type="text" class="st-forminput" id="name" style="width:300px" value="{{fields.name}}" />
                                        {% if result.name %}
                                        	<span class="st-form-error">* {{result.name}}</span>
                                        {% endif %}
                                    <div class="clear"></div>
                                    </div>
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('País') %}</span>	
                                        {{countries}}
                                                                               
                                        {% if result.country %}
                                        	<span class="st-form-error">* {{result.country}}</span>
                                        {% endif %}
                                    <div class="clear"></div>
                                    </div>
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Provincia') %}</span>	
                                        {{estates}}
                                        {% if result.estates %}
                                        	<span class="st-form-error">* {{result.estates}}</span>
                                        {% endif %}
                                    <div class="clear"></div>
                                    </div>
                                    {{cities_status}}
                                  	<div class="st-form-line cities_form_div">	
                                    	<span class="st-labeltext">{% trans _('Ciudad') %}</span>	
                                        <div class="cities_form">
                                        	{{cities}}
	                                        {% if result.city %}
	                                        	<span class="st-form-error">* {{result.city}}</span>
	                                        {% endif %}                                        	
                                        </div>
                                    <div class="clear"></div>
                                    </div>
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Dirección') %}</span>	
                                        <input name="address" type="text" class="st-forminput" id="address" style="width:300px" value="{{fields.address}}" /> 
                                        {% if result.address %}
                                        	<span class="st-form-error">* {{result.address}}</span>
                                        {% endif %}
                                    <div class="clear"></div>
                                    </div>
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Web') %}</span>	
                                        <input name="web" type="text" class="st-forminput" id="web" style="width:300px" value="{{fields.web}}" /> 
                                    <div class="clear"></div>
                                    </div>
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Email') %}</span>	
                                        <input name="email" type="text" class="st-forminput" id="email" style="width:300px" value="{{fields.email}}" />
                                        {% if result.email %}
                                        	<span class="st-form-error">* {{result.email}}</span>
                                        {% endif %}                                         
                                    <div class="clear"></div>
                                    </div>
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Teléfono') %}</span>	
                                        <input name="telephone" type="text" class="st-forminput" id="telephone" style="width:300px" value="{{fields.telephone}}" /> 
                                    <div class="clear"></div>
                                    </div>
                                    
                                   	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Descripción') %}</span>	
                                        <textarea name="description" class="st-forminput" id="description" style="width:300px"  rows="3" cols="47">{{fields.description}}</textarea> 
                                    <div class="clear"></div>
                                    </div>
				
                                    <div class="button-box">
                                   	  <input type="submit" name="button" id="button" value="{% trans _('Editar') %}" class="st-button"/>
                                   	  <input type="reset" name="button" id="button2" value="{% trans _('Resetear') %}" class="st-clear"/>
                                    </div>
                                    
                                  </form>
                                  
                                </div>
                            </div>
                        <!-- END FORM ELEMENT STYLES -->
                        {% else %}
                               <div class="error-page">
		                        	<img src="/static/img/icons/error/error-red-big.png" width="91" height="91" alt="icon" />
		                            <h2 class="red">{% trans _('Local no encontrado') %} </h2>
		                            <a href="/panel/venues/" class="button">{% trans _('Volver atrás') %}</a>
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