<div class="container">
    <div class="content-container cc-med">
        {{ partial('partials/dashboard-menu') }}<br  />
        <h1>{{ quest.name }}</h1><hr />
        {{ quest.objective }}
        <hr />
        Worth <strong>{{ quest.experience_points_earned }} pts</strong> and requires <strong>{{ quest.experience_points_required }} pts</strong> to unlock.<br />

        Image Required:
        <strong>
            {% if quest.image_required == 1 %}
            Yes
            {% else %}
            No
            {% endif %}
        </strong>
        <br />
        Text Required:
        <strong>
            {% if quest.text_required == 1 %}
                Yes
            {% else %}
                No
            {% endif %}
        </strong><hr />
        <a class="btn btn-danger" href="/qadmin/delete/{{ quest.id }}" role="button">Delete</a>
    </div>
</div>