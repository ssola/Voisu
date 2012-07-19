{% include 'general/top.php' %}
    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Users <small>Control the Hausu user community</small></h1>
        </div>
        <div class="row">
          <div class="span10">
            <h2>List of users</h2>
            <table class="bordered-table">
              <thead>
                <tr>
                  <td>uid</td>
                  <td>User name</td>
                  <td>Provider</td>
                  <td>Created</td>
                </tr>
              </thead>
              <tbody>
                {% if users != false %}
                  {% for user in users %}
                    <tr>
                      <td>{{user.id}}</td>
                      <td>{% if user.is_admin == '1' %}
                      <span class="label success">Admin</span>
                      {% endif %} {% if user.status == 'banned' %}
                      <span class="label error">banned</span>
                      {% endif %} <a href="/admin/users/view/{{user.id}}">{{user.name}}</a></td>
                      <td>{{user.oauth_provider}}</td>
                      <td>{% exec date 'H:i:s d/m/Y', user.created %}</td>
                    </tr>
                  {% endfor %}
                {% endif %}
              </tbody>
            </table>

            <div class="pagination">
            <ul>
              {% for link in links %}
                {% if link.value == page %}
                  <li class="active"><a href="{{link.link}}">{{link.value}}</a></li>
                {% else %}
                  <a href="{{link.link}}">{{link.value}}</a>
                {% endif %}
              {% endfor %}
            </ul>
          </div>

          </div>
          <div class="span4">
            
          </div>
        </div>
      </div>
{% include 'general/footer.php' %}