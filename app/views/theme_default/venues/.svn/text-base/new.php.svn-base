{% include 'general/top.php' %}
{% include 'general/menu.php' %}
<div class="main_content">
	<div id="col_left">
		{{initform}}
			<fieldset>
				<legend>{% trans _('Your new venue') %}</legend>
				<div class="control-group">
					<label class="control-label" for="name">{% trans _('Name') %}</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="name" name="name" />
						<p class="help-block">{% trans _('Please set a valid name to your venue') %}</p>
					</div>

					<label class="control-label" for="input01">{% trans _('Address') %}</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="name" name="name" />
						<p class="help-block">{% trans _('Set a valid address, it is necessary to place your venue correctly') %}</p>
					</div>
				</div>

			<div class="form-actions">
				<button class="btn btn-inverse" type="submit">{% trans _('Save Venue') %}</button>
				<a class="btn" href="{% exec setLink 'venues' %}">{% trans _('Cancel') %}</a>
			</div>
			</fieldset>
		</form>
	</div>

	<div id="col_right">
		{% if current_user.is_business == 0 %}
			<div class="alert_ad">
				<h2><img src="{{_config.img_url}}/icons/coins.png">  ¿Tienes un negocio?</h2>
				<p>¿Quieres ganar dinero ofreciendo ofertas? Apréta aquí y aprende como <strong>peroya</strong> puede ayudarte.</p>
			</div>
		{% endif %}
	</div>
</div>
{% include 'general/footer.php' %}