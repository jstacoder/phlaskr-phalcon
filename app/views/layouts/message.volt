<hr />
    <p>messages.volt</p>
<hr />
{{ form('/message/add') }}
    <fieldset>
        <div class=control-group>
            <label class=control-label>title</label>
            {{ text_field('title') }}
        </div>
        <div class=control-group>
            <label class=control-label>text</label>
            {{ text_area('text') }}
        </div>
        {{ submit_button('send message') }}
    </fieldset>
    </form>

    <?php //echo $this->getContent(); ?>
