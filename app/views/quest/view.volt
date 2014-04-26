<div class="container">
    <div class="content-container cc-med">
        <h1>{{ quest.name }}</h1> by {{ company.name }}
        <hr/>
        {{ quest.objective }}
        <hr/>
        Worth <strong>{{ quest.experience_points_earned }} pts</strong><br/>
        {{ form("method": "post", "class":"form-signin", "role":"form") }}

        {% if submitted == 0 %}
            {% if quest.image_required %}



                <label for="file">Image Upload:</label>
                {{ form.render("file") }}
                {% if form.messages('file') %}
                    {% for error in form.messages('file') %}
                        <div class="error">{{ error }}</div>
                    {% endfor %}
                {% endif %}
                <br/>
            {% endif %}

            {% if quest.text_required %}
                <label for="body">Your submission text</label>
                {{ form.render("body") }}
                {% if form.messages('body') %}
                    {% for error in form.messages('body') %}
                        <div class="error">{{ error }}</div>
                    {% endfor %}
                {% endif %}
                <br/>
            {% endif %}

            {{ form.render("submit") }}<br/>
            </form>
        {% else %}
            You've already submitted this quest for approval.
        {% endif %}
    </div>
</div>