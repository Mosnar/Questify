<div class="container">
    <div id="messages">{{ flash.output() }}</div>
    <div class="content-container cc-med">
        {{ partial('partials/dashboard-menu') }}
        {% if quests.count() == 0 %}
            <p>
                <strong>You have no quests!</strong>
            </p>
        {% endif %}
        {% for quest in quests %}
            <a href="/qadmin/view/{{ quest.id }}" class="quest-link">
            <div class="quest-entry">
                <strong>{{ quest.name }} ({{ quest.experience_points_earned }} pts)</strong><br/>
                {{ quest.objective }}
            </div>
            </a>
        {% endfor %}
        <a class="btn btn-primary" href="/qadmin/create" role="button">New Quest</a>
    </div>
</div>