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

            table#login {
                margin-top: 25px;
            }

        </style>
    </head>
<body>
    <div class="container">
        <form action="" method="POST">
            @csrf
        <table align="center" id="login">
            <tr>
                <td colspan="2"> 
                    <h2>Login to your account</h2>
                    <span class="error">{{$errors->first('email')}}</span>
                
                </td>
                
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="email" name="email" value="{{old('email')}}" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit"  value="Login" /></td>
            </tr>
        </table>
        </form>
    </div>


</body>
</html>