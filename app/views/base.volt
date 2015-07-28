<!DOCTYPE html>
<html>
    <head>
        <title>Phalcon PHP Framework</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        />
        {{ assets.outputCss() }}
        {% block extra_css %}{% endblock %}
    </head>
    <body>
        <div class=container>
            <div class=row>
                <div class=col-md-12>
                    {% if navlinks %}
                    {% include "blocks/header.volt" with navlinks %}
                    {% endif %}
                    {{ flash.output() }}
                    {% block before_form %}{% endblock %}
                    {% if form and form_file %}{% include form_file %}{% endif %}
                </div>
                <div class=col-md-12>
                    <div class=row>
                        {% block content %}{% endblock %}
                    </div>
                </div>
            </div>
        </div>
        {{ assets.outputJs() }}
        {% block extra_js %}{% endblock %}
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
