{% extends "index.volt" %}

{% block content %}
	{% for user in users %}
		{{ user.name }}
	{% endfor %}
{% endblock %}