<container>
    <div class="content-container cc-small">
        <h1><strong>Company Login</strong></h1>
                {% if loginError %}
                <div class="error">Email or password is incorrect</div>
                {% endif %}
                {{ form("method": "post", "class":"form-signin", "role":"form") }}
                {{ form.render("email") }}<br />
                {{ form.render("password") }}
                {{ form.render("csrf") }}<br />
                {{ form.render("submit") }}
                 </form><br  />
        Looking to register your company? <a href="/register">Click here!</a>
    </div>
</container>