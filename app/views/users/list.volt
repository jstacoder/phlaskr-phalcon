{% extends "index.volt" %}

{% block content %}
	<ul class="list-unstyled">
		{% for user in users %}
			<li>
				{{ user.name }}<br />
				{{ user.email }}
			</li>
		{% endfor %}
	</ul>
{% endblock %}
