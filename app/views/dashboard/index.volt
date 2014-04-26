<div class="container">
    <div class="content-container cc-med">
    <h1>Dashboard for {{ company.name }}</h1>
        {{ partial('partials/dashboard-menu') }}
        <table class="table">
            <tr>
                <td><strong>Number of users</strong></td>
                <td>{{ numUsers }}</td>
            </tr>

            <tr>
                <td><strong>Submissions awaiting approval</strong></td>
                <td>{{ numSubs }}</td>
            </tr>
            <tr>
                <td><strong>Number of active quests</strong></td>
                <td>{{ numQuests }}</td>
            </tr>
            <tr>
                <td><strong>Orders unfulfilled</strong></td>
                <td>{{ numOrders }}</td>
            </tr>
        </table>
            </div>
    </div>
</div
