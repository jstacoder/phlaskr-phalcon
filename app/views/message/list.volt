{% extends 'index.volt' %}
{% block content %}
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
<h1>Messages</h1>
        <?php echo "ahhhh"; ?>
<?php if($messages): ?>
    <?php foreach($messages as $msg): ?>
        <?php echo "ahhhh"; ?>
        <div class=msg>
            <br /><hr />
            <h2 style="display:inline-block;">
                <?php echo $msg['title']; ?>
            </h2>
            <p style="display:inline-block;">
                <?php echo $msg['text']; ?>
            </p>
            <form style="display:inline-block;" action="/message/remove/<?php echo $msg['id']; ?>" method=POST>
                    <input type=hidden name=msg_id value="<?php echo $msg['id']; ?>" />
                    <input type=submit value=X />
                </form>
            <hr /><br />
        </div>
    <?php endforeach; ?>
<?php endif; ?>
{% endblock %}
