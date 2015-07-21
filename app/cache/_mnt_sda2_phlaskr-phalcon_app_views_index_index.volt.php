<h1>Congratulations!</h1>

<p>You're now flying with Phalcon. Great things are about to happen!</p>

<?php 
echo $this->tag->linkTo("signup","signup here");
?>

 
     <?php echo $this->tag->form(array('message/add')); ?>
        <p>
            <label for=title>title</label>
           <?php echo $this->tag->textField('title'); ?>
        </p>
         <?php echo $this->tag->textArea(array('text')); ?>
         <?php echo $this->tag->submitButton(array('post')); ?>

    </form>
