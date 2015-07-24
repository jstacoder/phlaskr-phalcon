<h2>sign up here</h2>

  {{ form("register") }}
<p>
    {{ form.label('name') }}
    {{ form.render('name') }}
</p>
<p>
    {{ form.label('email') }} 
    {{ form.render('email') }}
</p>
<p>
    {{ submit_button('signup','class':'btn btn-default') }}
</p>
</form>
