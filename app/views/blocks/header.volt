<div class="header">
    <nav>
        <ul class="nav nav-pills pull-right">
            {% for link in navlinks %}
                <li{% if link['active'] %} class="active"{% endif %}>
                    <a href="{{ link['url'] }}>{{ link['text'] }}</a>
                </li>
            {% endfor %}
        </ul>
    </nav>
    <h3>My Site</h3>
</div>
