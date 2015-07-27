{% macro render_field(form,name) %}
  {{ tag_html('div','class':'form-group') }}
    {{ form.label(name) }}
    {{ form.render(name) }}
  {{ tag_html_close('div') }}
{% endmacro %}
  {{ form("/signup/register","method":"post") }}
    {{ tag_html('fieldset') }}
    {{ tag_html('legend') }}sign up here{{ tag_html_close('legend') }}
    {{ render_field(form,'name') }}
    {{ render_field(form,'email') }}
    {{ render_field(form,'password') }}
    {{ render_field(form,'confirm') }}
    {{ submit_button('signup','class':'btn btn-default') }}
    {{ tag_html_close('fieldset') }}
  {{ end_form() }}
