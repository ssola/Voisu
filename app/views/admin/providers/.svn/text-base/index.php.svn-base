{% include 'general/top.php' %}
    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Providers <small>Control the content providers</small></h1>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Current providers</h2>
            <table class="bordered-table">
              <thead>
                <tr>
                  <td>id</td>
                  <td>Name</td>
                  <td>Type</td>
                  <td>Type Room</td>
                  <td>City</td>
                  <td>Country</td>
                </tr>
              </thead>
              <tbody>
                {% if providers != false %}
                  {% for provider in providers %}
                    <tr>
                      <td>{{provider.id}}</td>
                      <td>{{provider.provider}}</td>
                      <td>{{provider.type_provider}}</td>
                      <td>{{provider.type_room}}</td>
                      <td>{{provider.city}}</td>
                      <td>{{provider.country}}</td>
                    </tr>
                  {% endfor %}
                {% endif %}
              </tbody>
            </table>
          </div>
          <div class="span4">
            
          </div>
        </div>
      </div>
{% include 'general/footer.php' %}