<hr />
    <p>messages.volt</p>
<hr />
{{ form('/message/add') }}
    <fieldset>
        <div class=control-group>
            <label class=control-label>title</label>
            {{ form.render('title','form-control') }}
        </div>
        <div class=control-group>
            <label class=control-label>text</label>
            {{ form.render('text','form-control') }}
        </div>
        {{ submit_button('send message') }}
        {{ form.render('date_added') }}
    </fieldset>
    </form>
