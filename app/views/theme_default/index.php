{% include 'general/top.php' %}
{% include 'general/header.php' %}
<!-- Main content -->
<div class="container_12">
	<div class="destacados">
	<h1>{% trans _('Eventos destacados') %}</h1>
	{% if events %}
	<!-- Recommended trips -->
	<ul class="results">
		{% for event in events %}
		<li class="short grid_3">
			<a href="{% exec setLink 'events','view',event.id %}"><img width="220" height="100" src="{% exec getImage event.path,'medium' %}" alt="" /></a>
			<h3 style="margin-bottom:3px"><a href="{% exec setLink 'events','view',event.id %}">{{event.name}}</a></h3>
			<p style="margin-top:0;margin-bottom:0;">{% trans _('Ofrecida por') %} <strong>{{event.venue}}</strong></p>
			<p style="margin-top:3px;">{% trans _('Cuando:') %} {% exec date 'd/m/Y H:i', event.starts %}</p>
			<div>
				<span><a href="/cities/view/{{event.poblacionseo}}">{% exec utf8_encode event.poblacion %}</a></span>
				{% if event.price %}
				<span>{% trans _('Desde') %} <strong>{{event.price}}€</strong></span>
				{% endif %}
			</div>
		</li>
		{% endfor %}
	</ul>
	{% endif %}

	<div class="clearfix"></div>
	<hr class="dashed grid_12" />
</div>

	<!-- Search form and last minute -->
	<section class="search_lm grid_12">
	
		<!-- Ticket search form -->
		<section class="search sidebar">

			<h2>
				<span data-form="find_trip" class="selected">Find a trip</span>
				<span data-form="find_hotel">Find a hotel</span>
				<span data-form="tickets">Tickets</span>
			</h2>

			<!-- Find a trip form -->
			<form action="#" data-form="find_trip" class="black">

				<label>Destination</label>
				<input type="text" name="destination" value="All" />

				<div class="half">
					<label>Transportation</label>
					<input type="text" name="transportation" value="Plane" />
				</div>

				<div class="half last">
					<label>Date</label>
					<input type="text" name="date" class="date" value="11/23/2011" />
				</div>

				<div class="half">
					<label>Guests</label>
					<input type="text" name="guests" value="2" />		
				</div>

				<div class="half last">
					<label>Rooms</label>
					<input type="text" name="rooms" value="1" />		
				</div>

				<input type="submit" value="Search">

			</form>

			<!-- Find a hotel form -->
			<form action="#" data-form="find_hotel" class="black" style="display:none;">

				<label>Destination</label>
				<input type="text" name="destination" value="All" />

				<div class="half">
					<label>Check in</label>
					<input type="text" name="check_in" class="date" value="11/23/2011" />
				</div>

				<div class="half last">
					<label>Check out</label>
					<input type="text" name="check_out" class="date" value="11/23/2011" />
				</div>

				<div class="half">
					<label>Guests</label>
					<input type="text" name="guests" value="2" />		
				</div>

				<div class="half last">
					<label>Rooms</label>
					<input type="text" name="rooms" value="1" />		
				</div>

				<input type="submit" value="Search">

			</form>

			<!-- Tickets form -->
			<form action="#" data-form="tickets" class="black" style="display:none;">
				
				<div class="half">
					<label>From</label>
					<input type="text" name="from" value="JFK" />	
				</div>

				<div class="half last">
					<label>To</label>
					<input type="text" name="to" value="SFO" />		
				</div>

				<div class="half">
					<label>Leaving date</label>
					<input type="text" name="leaving-date" class="date" value="11/23/2011" />
				</div>

				<div class="half last">
					<label>Return date</label>
					<input type="text" name="return-date" class="date" value="11/23/2011" />
				</div>

				<div class="half">
					<label>Adults</label>
					<input type="text" name="adults" value="2" />		
				</div>

				<div class="half last">
					<label>Children</label>
					<input type="text" name="children" value="0" />		
				</div>

				<input type="submit" value="Search">

			</form>
		</section>

		<!-- Last minute -->
		<section class="last_minute">
			<table>
				<tr class="header">
					<th>Destination</th>
					<th>Hotel</th>
					<th>Departure</th>
					<th>Length</th>
					<th>Price</th>
				</tr>
				<tr>
					<td><a href="browse.html">Spain</a></td>
					<td>Hotel Grand 5*</td>
					<td>13 Oct - 25 Oct</td>
					<td>12 nights</td>
					<td><del>1 099 €</del> 899 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Greece</a></td>
					<td>Hotel Palma 4*</td>
					<td>15 Oct - 25 Oct</td>
					<td>10 nights</td>
					<td><del>1 099 €</del> 749 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Italy</a></td>
					<td>Holiday Inn 4*</td>
					<td>15 Oct - 25 Oct</td>
					<td>10 nights</td>
					<td><del>1 099 €</del> 799 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Egypt</a></td>
					<td>Beach Resort 5*</td>
					<td>18 Oct - 28 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 799 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">United Kingdom</a></td>
					<td>Spa & Golf Resort 4*</td>
					<td>18 Oct - 28 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 749 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Thailand</a></td>
					<td>Welness Resort 5*</td>
					<td>20 Oct - 29 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 849 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Spain</a></td>
					<td>Hotel Grand 5*</td>
					<td>25 Oct - 05 Nov</td>
					<td>11 nights</td>
					<td><del>1 099 €</del> 899 €</td>
				</tr>
			</table>
		</section>

	</section>

	<div class="clearfix"></div>
	<hr class="dashed grid_12" />

	<!-- Latest blog articles -->
	<section class="latest_articles">
		
		<article class="grid_4">
			<a href="blogpost.html"><img src="/static/img/placeholders/300x100/1.jpg" alt="" /></a>
			<h2><a href="blogpost.html">Around the world</a></h2>
			<div class="info">
				by <strong>John Doe</strong>
				<img src="/static/img/hseparator.png" alt="" />
				<strong>8</strong> comments
				<img src="/static/img/hseparator.png" alt="" />
				<strong>Nov 04</strong>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam interdum nunc at mauris condimentum rhoncus. Proin fermentum ligula vitae elit laoreet a ullamcorper lorem cursus. Suspendisse malesuada nisl nec magna fringilla ornare. Clabel urabitur molestie ligula a urna hendrerit quis porttitor enim ornare.</p>
		</article>

		<article class="grid_4">
			<a href="blogpost.html"><img src="/static/img/placeholders/300x100/3.jpg" alt="" /></a>
			<h2><a href="blogpost.html">Letters from Africa</a></h2>
			<div class="info">
				by <strong>John Doe</strong>
				<img src="/static/img/hseparator.png" alt="" />
				<strong>8</strong> comments
				<img src="/static/img/hseparator.png" alt="" />
				<strong>Sep 16</strong>
			</div>
			<p>Proin fermentum ligula vitae elit laoreet a ullamcorper lorem cursus. Suspendisse malesuada nisl nec magna fringilla ornare. Curabitur molestie ligula a urna hendrerit quis porttitor enim ornare. Nullam leo enim, sollicitudin semper venenatis at, aliquet et nisi. Aliquam placerat aliquet feugiat. Curabitur molestie ligula.</p>
		</article>

		<article class="grid_4">
			<a href="blogpost.html"><img src="/static/img/placeholders/300x100/4.jpg" alt="" /></a>
			<h2><a href="blogpost.html">Wonders of Indonesia</a></h2>
			<div class="info">
				by <strong>John Doe</strong>
				<img src="/static/img/hseparator.png" alt="" />
				<strong>8</strong> comments
				<img src="/static/img/hseparator.png" alt="" />
				<strong>Aug 15</strong>
			</div>
			<p>Nullam interdum nunc at mauris condimentum rhoncus. Proin fermentum ligula vitae elit laoreet a ullamcorper lorem cursus. Suspendisse malesuada nisl nec magna fringilla ornare. Curabitur molestie ligula a urna hendrerit quis porttitor enim ornare. Nullam leo enim, sollicitudin semper venenatis at, aliquet et nisi.</p>
		</article>

	</section>
	
</div> 
{% include 'general/footer.php' %}