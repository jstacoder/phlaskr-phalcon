<hr />
    <p>messages.volt</p>
<hr />
{{ form('/message/add') }}
    <fieldset>
        <div class=control-group>
            {{ form.label('title') }}
            {{ form.render('title') }}
        </div>
        <div class=control-group>
            {{ form.label('text') }}
            {{ form.render('text') }}
        </div>
        {{ submit_button('send message','class':'btn btn-default') }}
        {{ form.render('date_added') }}
    </fieldset>
    </form>
