{{ form('login/auth') }}
    {% for itm in ['email','password'] %}
        <div class="form-control">
            {{ form.label(itm) }}
            {{ form.render(itm) }}
        </div>
    {% endfor %}
    {{ submit_button('login','class':'btn btn-default') }}
</form>