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
                    		<div class="titlebar">	<h2>{% trans _('Editando Evento') %}</h2>	<p>{% trans _('Edite sus eventos cuando quiera.') %}</p></div>
                    </div>
                </div>
                
                	<!-- START CONTENT -->
                    <div class="content">
                   	{% if event_data %}
                      	{% if success != false %}
                                <div class="albox succesbox">
                                	<b>{% trans _("Editado") %} :</b> {{success}}
                                	<a href="#" class="close tips" title="close">close</a>
                                </div>
                         {% endif %}                  
                         <!-- START SIMPLE FORM -->
                        	<div class="simplebox grid740">
                            	<div class="titleh">
                                	<h3>{% trans _('Editar evento') %}</h3>
                                </div>
                                <div class="body">
                                  <form id="form2" name="form2" method="post" action="/panel/events/edit/{{event_data.id}}">
                                  
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
                                    	<span class="st-labeltext">{% trans _('Local') %}</span>	
                                        {% exec getUserVenues 'venue_id','venue_id',fields.venue_id %} 
                                    <div class="clear"></div>
                                    </div>                                    
                                    
                                   	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Fecha de inicio y hora') %}</span>	
                          				<!-- start default date picker -->
											<script type="text/javascript">
												$(function() {
													$( "#starts" ).datepicker({ minDate: +0 });
												});
											</script>
                            				<input type="text" id="starts" name="starts" class="datepicker-input" style="width:180px;" value="{% exec date 'm/d/Y', fields.starts %}" />
                            				{% exec getTimeSelect 0,25,'starts_hour','starts_hour',22 %}:{% exec getTimeSelect 0,60,'starts_minutes','starts_minutes',0 %}
                                  		<div class="clear"></div>
                                    <div class="clear"></div>
                                    </div>
                                    
                                   	<div class="st-form-line">	
                                    	<span class="st-labeltext">{% trans _('Fecha final y hora') %}</span>	
                          				<!-- start default date picker -->
											<script type="text/javascript">
												$(function() {
													$( "#ends" ).datepicker({
														minDate: +0,
													});
												});
											</script>
                            				<input type="text" id="ends" name="ends" class="datepicker-input" style="width:180px;"  value="{% exec date 'm/d/Y', fields.final %}" />
                            				{% exec getTimeSelect 0,25,'ends_hour','ends_hour',22 %}:{% exec getTimeSelect 0,60,'ends_minutes','ends_minutes',0 %}
                                  		<div class="clear"></div>
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
		                            <h2 class="red">{% trans _('Evento no encontrado') %} </h2>
		                            <a href="/panel/events/" class="button">{% trans _('Volver atrás') %}</a>
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