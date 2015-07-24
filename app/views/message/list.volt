{% extends 'index.volt' %}
{% block extra_css %}
<style>
    .msg{
        width:40%;
        margin-left:20%;
        text-align:center;
    }
    .close {
        flost:right;
    }
</style>
{% endblock %}
{% block before_form %}
    {% if form %}
        {{ form.title.id }}
    {% endif %}
{%  endblock %}
{% block content %}
    <h1>Messages</h1>    
    {% if messages %}
        {% for msg in messages %}
            {{ "ahhhh" }}
            <div class=msg>
            <br /><hr />
            <h2 style="display:inline-block;">
                {{ msg['title'] }}
            </h2>
            <p style="display:inline-block;">
                {{ msg['text'] }}
            </p>
            <form 
                style="display:inline-block;" 
                action="/message/remove/{{ msg['id'] }}" 
                method=POST
            >
                <input type=hidden name=msg_id value="{{ msg['id'] }}" />
                <input type=submit value="X" />
            </form>
                <hr /><br />
            </div>
        {% endfor %}
    {% endif %}
{% endblock %}
