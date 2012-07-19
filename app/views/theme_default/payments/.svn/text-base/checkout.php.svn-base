{% include 'general/top.php' %}
{% include 'general/menu.php' %}
<div class="main_content">
	<div id="col_left">
		<h2>Pago de {{product.name}}</h2>
		<div class="payment_row">
			<div class="payment_row_left">
				{{product.name}}
			</div>
			<div class="payment_row_right">
				<strong>{{product.price}}€</strong>
			</div>
		</div>
		<div class="payment_row">
			<div class="payment_row_left">
				Descuento
			</div>
			<div class="payment_row_right">
				{{product.discount}}%
			</div>
		</div>
		<div class="payment_row">
			<div class="payment_row_left">
				Impuestos ({{product.tax_name}})
			</div>
			<div class="payment_row_right">
				{{product.tax}}%
			</div>
		</div>
		<div class="payment_last">
			<div class="payment_row_left">
				Precio Final
			</div>
			<div class="payment_row_right">
				{{product.final_price}}€
			</div>
		</div>
	</div>

	<div id="col_right">
		<div class="alert_ad">
			<h2><img src="{{_config.img_url}}/icons/lock.png">  Pago Seguro</h2>
			<p>El pago es 100% seguro, peroya en ningún momento guarda información sobre sus datos bancarios, todo el proceso de pago se realiza a través de Paypal, nuestra plataforma de pago seguro.</p>
		</div>
	</div>
</div>
{% include 'general/footer.php' %}