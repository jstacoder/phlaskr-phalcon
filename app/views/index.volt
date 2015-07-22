<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{ assets.outputCss() }}
	</head>
	<body>
        <div class=container>
            {% include "blocks/header.volt" %}
            <p>{{ flash.output() }}</p>
            <div class=row>
                <div class="col-md-4 col-md-push-4">
                    <p>Main index.volt</p>
                </div>
            </div>
            {% if form %}
                {% include form_file %}
            {% endif %}
            <div class=row>
                {% block content %}
                {% endblock %}
            </div>
        </div>
        {{ assets.outputJs() }}
        <script>
            function checkForAlert(){
                alerts = document.querySelectorAll('.alert');
                return alerts.length ? alerts : false;
            }
            setInterval(function(){
                checkForAlert().length ? checkForAlert()[0].remove() : false;
            },2500);
        </script>
	</body>
</html>
