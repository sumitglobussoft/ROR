<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<form action="login" method="post">
    <div class="container">
        <div class="content">
            <div class="title">Laravel 5</div>
            <input class="form-control" placeholder="Email" name="email">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <button type="submit" class="btn btn-success btn-block">Login</button>

        </div>

    </div>
</form>

</body>
</html>
