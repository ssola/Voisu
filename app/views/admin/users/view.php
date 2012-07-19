{% include 'general/top.php' %}
    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Users <small>Control the Hausu user community</small></h1>
        </div>
        <div class="row">
          <div class="span10">
            {% if user.status == "banned" %}
              <div class="alert-message error">
                <a class="close" href="#">×</a>
                <p><strong>Hey admin!</strong> This user has been banned, for your information.</p>
              </div>
            {% endif %}
            <h2>User: {{user.name}}</h2>
            <table class="bordered-table">
              <tbody>
                <tr>
                  <td>Name</td>
                  <td>{{user.name}}</td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td>{{user.email}}</td>
                </tr>
                <tr>
                  <td>Provider:</td>
                  <td>{{user.oauth_provider}}</td>
                </tr>
                <tr>
                  <td>Created:</td>
                  <td>{% exec date 'H:i:s d/m/Y',user.created %}</td>
                </tr>
                <tr>
                  <td>Is admin:</td>
                  <td>
                    {% if user.is_admin == 1 %}
                      <span class="label success">Admin</span>
                    {% else %}
                      <span class="label important">Not admin</span> <button class="btn primary user_admin" id="{{user.id}}" val="1">Convert to admin</button>
                    {% endif %}
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="alert-message block-message warning">
              <a class="close" href="#">×</a>
              <p><strong>For your information!</strong> This is the current information about this user, below this box you can see the latest login activity.</p>
            </div>
            <table class="bordered-table">
              <thead>
                <tr>
                  <td>IP</td>
                  <td>When</td>
                  <td>City</td>
                  <td>Country</td>
                </tr>
              </thead>
              <tbody>
                {% if logins != false %}
                  {% for attemp in logins %}
                    <tr>
                      <td>{% exec long2ip attemp.ip %}</td>
                      <td>{% exec date 'H:i:s d/m/Y', attemp.time %}</a></td>
                      <td>{{attemp.city}}</td>
                      <td>{{attemp.country}}</td>
                    </tr>
                  {% endfor %}
                {% endif %}
              </tbody>
            </table>
            <h2>User clusters</h2>
            <div id="map">
            <div id="map_room">
              {{map.map}}
              {{map.sidebar}}
            </div>    
            </div>
          </div>
          <div class="span4">
                <div id="my-modal" class="modal hide fade" style="text-align:left;"><div class="modal-header">
                          <a href="#" class="close">&times;</a>
                          <h3>Send an email to: {{user.name}}</h3>
                        </div>
                        <div class="modal-body">
                          <p>Be careful with the email content, must be considered spam!</p>
                            <div class="clearfix">
                                 <label for="xlInput">Issue:</label>
                            <div class="input">
                                 <input class="xlarge" id="issue" name="issue" size="30" type="text"/>
                            </div></div>   
                            <div class="clearfix" style="margin-top:10px;">
                                 <label for="xlInput">Message:</label>
                            <div class="input">
                              <textarea name="message" id="message" cols="30" rows="5"></textarea>
                            </div></div>                                 
                        </div>
                        <div class="modal-footer">
                          <a href="#" class="btn secondary">Send it!</a>
                        </div>
                      </div>
            <div style="margin-bottom:10px;"><button data-controls-modal="my-modal" data-backdrop="static" class="btn primary sendEmail" id="{{user.id}}">Send an email to this user</button></div>
            <ul class="media-grid">
              <li>
                <a href="#">
                  <img class="thumbnail" src="http://graph.facebook.com/{{user.oauth_userid}}/picture?type=large" alt="">
                </a>
              </li>
            </ul>
            <button class="btn danger"><img src="{{_config.img_url}}/icons/delete.png"> Delete</button>
            {% if user.status == "banned" %}
              <button class="btn success ban_user" id="{{user.id}}"><img src="{{_config.img_url}}/icons/accept.png"> Unban</button>
            {% else %}
              <button class="btn danger ban_user" id="{{user.id}}"><img src="{{_config.img_url}}/icons/stop.png"> Ban</button>
            {% endif %}

            <div style="margin-top:10px;overflow:hidden;">
            <ul class="tabs">
              <li class="active noBlue"><a href="#queries">Queries</a></li>
              <li class="noBlue"><a href="#rooms">Rooms</a></li>
            </ul>
             
            <div class="pill-content" style="background:#fff;text-align:left;">
              <div class="active noBlue" id="queries">
                <ol>
                {% if latestQueries %}
                  {% for query in latestQueries %}
                  <li>{{query.query}} (with <strong>{{query.results}}</strong> results in {{query.creation_time}} seconds) <span class="label">{% exec date 'H:i:s d/m/Y', query.creation %}</span></li>
                  {% endfor %}
                {% endif %}
                </ol>
              </div>
              <div class="noBlue" id="rooms">
                {% if latestVisits %}
                  {% for visit in latestVisits %}
                  <li style="margin-bottom:10px;"><span class="label success">{{visit.price}}&pound;</span> {{visit.title}} <span class="label">{% exec date 'H:i:s d/m/Y', visit.created %}</span></li>
                  {% endfor %}
                {% endif %}
              </div>
            </div>
             
            <script>
              $(function () {
                $('.tabs').tabs()
              })
            </script>
            </div>
          </div>
        </div>
      </div>
{% include 'general/footer.php' %}