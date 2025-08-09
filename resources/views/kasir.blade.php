<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasir Dashboard</title>
</head>
<h2>Selamat datang kasir!</h2>
<body>
    <form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
    </form>
</body>
</html>