<div class="container">
    <div id="messages">{{ flash.output() }}</div>
    <div class="content-container cc-med">
        You have <strong>{{ user.points_balance }}</strong> points!
        {% if quests.count() == 0 %}
            <p>
                <strong>There are no quests available, sorry! Check back later.</strong>
            </p>
        {% endif %}
        {% for quest in quests %}
            <a href="/quest/view/{{ quest.id }}" class="quest-link">
                <div class="quest-entry">
                    <strong>{{ quest.name }} ({{ quest.experience_points_earned }} pts)</strong><br/>
                    {{ quest.objective }}
                </div>
            </a>
        {% endfor %}
    </div>
</div>