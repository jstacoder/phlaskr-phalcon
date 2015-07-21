{% extends 'index.volt' %}
{% block content %}
<p>hi</p>
<p>message/index.volt</p>

<style>
    .msg{
        width:40%;
        margin-left:20%;
        text-align:center;
    }
</style>
<h1>Messages</h1>
    {% for msg in messages %}
        <div class=msg>
            <br /><hr />
            <h2>
                {{ msg['title'] }}
            </h2>
            <p>
                 {{ msg['text'] }}
            </p>
            <hr /><br />
        </div>
    {% endfor %}
{% endblock %}
