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
                    		<div class="titlebar">	<h2>{% trans _('Nueva Entrada') %}</h2>	<p>{% trans _('Crea aquí las entradas para tus eventos, diferentes entradas diferentes privilegios.') %}</p></div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                    
                         <!-- START SIMPLE FORM -->
                        	<div class="simplebox grid740">
                            	<div class="titleh">
                                	<h3>{% trans _('Añadir un nueva entrada') %}</h3>
                                </div>
                                <div class="body">
                                
                                  <form id="form2" name="form2" method="post" action="/panel/tickets/add?event={{event_id}}">
                                  	<input type="hidden" value="{{event_id}}" id="event_id" name="event_id">
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Nombre') %}</span>	
                                        <input name="name" type="text" class="st-forminput" id="name" style="width:300px" value="{{fields.name}}" />
                                        {% if result.name %}
                                        	<span class="st-form-error">* {{result.name}}</span>
                                        {% endif %}
                                    <div class="clear"></div>
                                    </div>
                  
                                    
                                   	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Descripción') %}</span>	
                                        <textarea name="description" class="st-forminput" id="description" style="width:300px"  rows="3" cols="47">{{fields.description}}</textarea> 
                                    <div class="clear"></div>
                                    </div>
                                    
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Precio') %}</span>	
                                        <input name="price" type="text" class="st-forminput" id="price" style="width:100px" value="{{fields.price}}" /> &euro;
                                        {% if result.price %}
                                        	<span class="st-form-error">* {{result.price}}</span>
                                        {% endif %}
                                    <div class="clear"></div>
                                    </div>                               
                                    
                                   	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Caducidad') %}</span>	
                          				<!-- start default date picker -->
											<script type="text/javascript">
												$(function() {
													$( "#expires" ).datepicker({ minDate: +0 });
												});
											</script>
                            				<input type="text" id="expires" name="expires" class="datepicker-input" style="width:180px;" />
                                  		<div class="clear"></div>
                                    <div class="clear"></div>
                                    </div>
                                    
                                  	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Número de entradas disponible') %}</span>
                                    	 <input name="number" type="text" class="st-forminput" id="number" style="width:100px" value="{{fields.number}}" />
                                        {% if result.number %}
                                        	<span class="st-form-error">* {{result.number}}</span>
                                        {% endif %}
                                    <div class="clear"></div>
                                    </div>   
				
                                    <div class="button-box">
                                   	  <input type="submit" name="button" id="button" value="{% trans _('Guardar') %}" class="st-button"/>
                                   	  <input type="reset" name="button" id="button2" value="{% trans _('Resetear') %}" class="st-clear"/>
                                    </div>
                                    
                                  </form>
                                  
                                </div>
                            </div>
                        <!-- END FORM ELEMENT STYLES -->
                                       	
                    </div>
                    <!-- END CONTENT -->

        </div>
        <!-- END PAGE -->

    <div class="clear"></div>
    </div>
    <!-- END MAIN -->  

{% include 'general/footer.php' %}