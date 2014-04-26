<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CompanyQuest{{ title }}</title>
    {{ assets.outputCss() }}
</head>

<body>

<div class="container">
    <div class="main-container">
        {{ content() }}
    </div>

</div>

<div id="footer">
    <div class="container">
        <p class="text-muted" style="text-align:center">2014 Heyo Hackathon | <a href="http://ransom.pw">Ransom Roberson</a>
        {% if loggedIn %}
            <br /><a href="/logout">Logout</a>
        {% endif %}
        </p>
    </div>
</div>
{{ assets.outputJs() }}
</body>
</html>