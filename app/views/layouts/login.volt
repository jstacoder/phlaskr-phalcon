{{ form('/login/auth','method':'post') }}
    {% for itm in ['email','password'] %}
        <div class="form-group">
            {{ form.label(itm) }}
            {{ form.render(itm) }}
        </div>
    {% endfor %}
    {{ submit_button('login','class':'btn btn-default') }}
</form>
