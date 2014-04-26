<container>
    <div id="messages">{{ flash.output() }}</div>
    <div class="content-container animated bounce">
        <h1>Hey!</h1>
        <p>
            It looks like you're not logged in! You should either visit a company's quest page or login to your
            company's management dashboard.
        </p>
        <a class="btn btn-big btn-primary" href="/company-login" role="button">Company Login</a>
    </div>
</container>