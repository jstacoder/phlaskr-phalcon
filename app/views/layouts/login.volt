{{ form('login/auth') }}
    {% for itm in ['email','name'] %}
        {{ form.label(itm) }}
        {{ form.render(itm) }}
    {% endfor %}
    {{ submit_button('login','class':'btn btn-default') }}
</form>