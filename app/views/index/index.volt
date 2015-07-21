<h1>Congratulations!</h1>

<p>You're now flying with Phalcon. Great things are about to happen!</p>

<?php 
echo $this->tag->linkTo("signup","signup here");
?>

 
     {{ form("message/add") }}
        <p>
            <label for=title>title</label>
           {{ text_Field("title") }}
        </p>
         {{ text_area("text") }}
         {{ submit_button('post') }}

    </form>
