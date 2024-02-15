<!DOCTYPE html>
<html>
    <head>
        <title>Benbelon :: Welcome</title>
        <style>
            .container {
                display: flex;
                flex-direction: row;

            }

            aside {
                display: flex;
                flex-direction: column;
                width: 150px;
                padding: 25px;
            }

            .logo {
                font-size: 120%;
                text-align: center;
                font-weight: bold;
            }

            .error {
                color: Red;
            }

            .success {
                color: Green;
            }

            table  th {
                text-align: left !important;
            }

        </style>
    </head>
<body>
    <div class="container">
        <aside>
            <div class="logo">Benbelon</div>
            <ul>
                <li><a href="/app/accounts">Accounts</a></li>
                <li><a href="/app/categories">Categores</a></li>
                <li><a href="/app/income">Income</a></li>
                <li><a href="/app/expense">Expense</a></li>
                <li><a href="/app/transfers">Transfers</a></li>
                <li><a href="/app/budget">Budget</a></li>
                <li><a href="/app/budget">Profile</a></li>
            </ul>

        </aside>
        <main>

            @yield('content')

        </main>

    </div>


</body>
</html>