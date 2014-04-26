<container>
    <div class="content-container cc-med">
        <h1><strong>Quest Creator</strong></h1>
        {{ form("method": "post", "class":"form-signin", "role":"form") }}
        <label for="name">Name your quest:</label>
        {{ form.render("name") }}
        {% if form.messages('name') %}
            {% for error in form.messages('name') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="objective">Describe the user's objective</label>
        {{ form.render("objective") }}
        {% if form.messages('objective') %}
            {% for error in form.messages('objective') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="points_required">How many points are required to unlock this quest:</label>
        {{ form.render("points_required") }}
        {% if form.messages('points_required') %}
            {% for error in form.messages('points_required') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="points_earned">How many points will this earn the user:</label>
        {{ form.render("points_earned") }}
        {% if form.messages('points_earned') %}
            {% for error in form.messages('points_earned') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="require_image">Is an image upload required for submission?</label>
        {{ form.render("require_image") }}
        {% if form.messages('require_image') %}
            {% for error in form.messages('require_image') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="require_text">Is a text submission required?</label>
        {{ form.render("require_text") }}
        {% if form.messages('require_text') %}
            {% for error in form.messages('require_text') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        {{ form.render("csrf") }}<br/>
        {{ form.render("submit") }}<br />
        </form>
    </div>
</container>