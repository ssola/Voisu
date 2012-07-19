           <ul class="nav nav-tabs">
              <li class="active"><a href="#city" data-toggle="tab">{% trans _('City') %}</a></li>
              <li><a href="#language" data-toggle="tab">{% trans _('Language') %}</a></li>
              <li><a href="#currency" data-toggle="tab">{% trans _('Currency') %}</a></li>
            </ul>       
            <div class="tab-content">
              <div class="tab-pane active" id="city">
                <div class="sideOptions">
                  <div class="leftSideOptions">
                    <ul class="itemselection">
                      {% if cities != false %}
                        {% for city in cities %}
                          {% if city.city == current_city %}
                            <li><strong><a href="{% exec setLink 'settings', 'set/city',city.city %}">{{city.city}}</a></strong> <span class="label">{% trans _("selected") %}</li>
                          {% else %}
                            <li><a href="{% exec setLink 'settings', 'set/city',city.city %}">{{city.city}}</a></li>
                          {% endif %}
                        {% endfor %}
                      {% endif %}
                    </ul>
                  </div>
                  <div class="rightSideOptions">
                    <p>{% trans _('London the biggest city in UK. You can find here thousand of apartments, rooms and flats available to ret for you') %}</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="language">
                <div class="sideOptions">
                  <div class="leftSideOptions">
                    <ul class="itemselection">
                      {% if languages != false %}
                        {% for language in languages %}
                          {% if language.real_name == current_language %}
                            <li><strong><a href="{% exec setLink 'settings', 'set/language',language.real_name %}">{{language.name}}</a></strong> <span class="label">{% trans _("selected") %}</li>
                          {% else %}
                            {% if language.available == 1 %}
                              <li><a href="{% exec setLink 'settings', 'set/language',language.real_name %}">{{language.name}}</a></li>
                            {% else %}
                            <li>{{language.name}} <span style="font-size:10px;">{% trans _("coming soon!") %}</li>
                            {% endif %}
                          {% endif %}
                        {% endfor %}
                      {% endif %}
                    </ul>
                  </div>
                  <div class="rightSideOptions">
                    <p>This site is focused on UK so by default our main language is English, but we can offer you our site in other languages.</p>
                  </div>
                </div>
              </div>       
              <div class="tab-pane" id="currency">
                <div class="sideOptions">
                  <div class="leftSideOptions">
                    <ul class="itemselection">
                      {% if currencies != false %}
                        {% for currency in currencies %}
                          {% if currency.real_name == current_currency %}
                            <li><strong><a href="{% exec setLink 'settings', 'set/currency',currency.real_name %}">{{currency.name}}</a></strong> <span class="label">{% trans _("selected") %}</li>
                          {% else %}
                            <li><a href="{% exec setLink 'settings', 'set/currency',currency.real_name %}">{{currency.name}}</a></li>
                          {% endif %}
                        {% endfor %}
                      {% endif %}
                    </ul>
                  </div>
                  <div class="rightSideOptions">
                    <p>Pound is the current currency in UK. By default we save all the prices in pounds, but we want help you if you are foreign to know how much is it in other currencies.</p>
                  </div>
                </div>
              </div>       
            </div>
            <script>
              $(function () {
                $('.tabs').tabs()
              })
            </script>