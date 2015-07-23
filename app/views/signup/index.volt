{% extends "index.volt" %}
{% block content %}
<h2>sign up here</h2>

<?php echo $this->tag->form("register"); ?>
<p>
    <label for=name>name</label>
    <?php echo $this->tag->textField("name"); ?>
</p>
<p>
    <label for=email>email</label>
    <?php echo $this->tag->textField("email"); ?>
</p>
<p>
    <?php echo $this->tag->submitButton("register"); ?>
</p>
</form>
{% endblock %}