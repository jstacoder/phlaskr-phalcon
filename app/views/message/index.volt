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
    <?php foreach($messages as $msg): ?>
        <div class=msg>
            <br /><hr />
            <h2>
                <?php echo $msg['title']; ?>
            </h2>
            <p>
                <?php echo $msg['text']; ?>
            </p>
            <hr /><br />
        </div>
    <?php endforeach; ?>

<p>by</p>
