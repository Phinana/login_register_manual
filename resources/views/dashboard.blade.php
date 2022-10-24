<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    This is the dashboard!
    <p>{{ $data->name }}</p>
    <p>{{ $data->email }}</p>
    <p>{{ $data->password }} <button value="{{ $data->id }}">Edit</button></p>
    </br>

    <a href="logout">Logout</a>
    <br>
    <button value="{{ $data->id }}">Delete your account</button>
</body>
</html>