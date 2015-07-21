<hr />
    <p>messages.volt</p>
<hr />
<?php if ($afterMsg) { ?>
    <?php echo $afterMsg; ?>
<?php } ?>
<?php echo $this->tag->form(array('/message/add')); ?>
    <?php foreach ($form as $element) { ?>

    <?php echo $element; ?>
    <?php } ?>
    <fieldset>
        <div class=control-group>
            <label class=control-label>title</label>
            <?php echo $this->tag->textField(array('title')); ?>
        </div>
        <div class=control-group>
            <label class=control-label>text</label>
            <?php echo $this->tag->textArea(array('text')); ?>
        </div>
        <?php echo $this->tag->submitButton(array('send message')); ?>
    </fieldset>
    </form>

    <?php echo $this->getContent(); ?>
