<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('register_user') }}" method="POST">

        @if(Session::has('result_of_success'))
        <p> {{ Session::get('result_of_success') }} </p>
        @endif

        @csrf

        <label for="user_name">Name</label>
        </br>
        <input type="text" name="user_name" palceholder="User Name" value="{{ old('user_name') }}">
        <span>@error('user_name') {{ $message }} @enderror</span>
        </br>

        <label for="user_email">Email</label>   
        </br>
        <input type="text" name="user_email" palceholder="Email" value="{{ old('user_email') }}">
        <span>@error('user_email') {{ $message }} @enderror</span>
        </br>

        <label for="user_password">Password</label>
        </br>
        <input type="text" name="user_password" palceholder="Password">
        <span>@error('user_password') {{ $message }} @enderror</span>
        </br>

        <input type="submit" value="Register">

    </form>
</body>
</html>