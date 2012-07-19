{% if results %}
	<ul class="statistics">
	{% for result in results %}
		<li><a href="/panel/events/view/{{result.id}}">{{result.name}}</a> - <span class="blue">{% exec date 'H:i:s d/m/Y', result.starts %}</span>	</p>	</li>
	{% endfor %}
	</ul>
{% else %}
<div class="error-page">
   <img src="/static/img/icons/error/info-blue-big.png" width="91" height="91" alt="icon" />
   <h2 class="blue">{% trans _('¿Aún sin eventos?') %} </h2>
   <div class="padding30"><a href="/panel/events/add/" class="button">{% trans _('Crear Evento Ahora!') %}</a></div>
</div>
{% endif %}