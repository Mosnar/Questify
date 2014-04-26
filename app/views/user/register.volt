<container>
    <div class="content-container cc-small">
        <h1><strong>Company Registration</strong></h1>
        {{ form("user/register", "method": "post", "class":"form-signin", "role":"form") }}
        <label for="email">You login with your email address:</label>
        {{ form.render("email") }}
        {% if form.messages('email') %}
            {% for error in form.messages('email') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="password">Pick a strong password:</label>
        {{ form.render("password") }}
        {% if form.messages('password') %}
            {% for error in form.messages('password') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="company_name">Enter the name of your company:</label>
        {{ form.render("company_name") }}
        {% if form.messages('company_name') %}
            {% for error in form.messages('company_name') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="description">Give us a short description to help your users:</label>
        {{ form.render("description") }}
        {% if form.messages('description') %}
            {% for error in form.messages('description') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        <label for="handle">Your handle is used to link your users to your quest page. Keep it simple and short!</label>
        {{ form.render("handle") }}
        {% if form.messages('handle') %}
            {% for error in form.messages('handle') %}
                <div class="error">{{ error }}</div>
            {% endfor %}
        {% endif %}
        <br/>
        {{ form.render("csrf") }}<br/>
        {{ form.render("submit") }}<br />
        <a href="/company-login">Login</a> if you have an account!

        </form>
    </div>
</container>