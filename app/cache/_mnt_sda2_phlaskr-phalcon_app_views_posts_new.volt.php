
<?php echo $this->tag->form(array('posts/create', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('posts', 'Go Back')); ?></td>
        <td align="right"><?php echo $this->tag->submitButton(array('Save')); ?></td>
    </tr>
</table>

<?php echo $this->getContent(); ?>

<div align="center">
    <h1>Create posts</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="title">Title</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('title', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="body">Body</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('body', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="excerpt">Excerpt</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('excerpt', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="published">Published</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('published', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="updated">Updated</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('updated', 'size' => 30)); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="pinged">Pinged</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('pinged', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="to_ping">To Of Ping</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('to_ping', 'type' => 'numeric')); ?>
        </td>
    </tr>

    <tr>
        <td></td>
        <td><?php echo $this->tag->submitButton(array('Save')); ?></td>
    </tr>
</table>

</form>
