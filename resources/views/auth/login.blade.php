<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./assets/packages/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('/frontend/css/login.css') }}" />
    <title>Login| Portfolio</title>
</head>

<body>
    <div class="form-container">
        <div class="error">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <h1>{{ $error }}</h1>
                @endforeach
            @endif
        </div>
        <form action="{{ url('/login') }}" method="post" class="form">
            @csrf
            <div style="display: flex;flex-direction:column;align-items:center">
                <img src="{{ asset('/frontend/assets/images/S-Logo.png') }}" style="width:3rem" alt="Navbar Logo" />

            </div>
            <div class="form-controll input-field">
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-controll input-field">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-controll">
                <input type="submit" class="btn btn_secondary-inverse" value="Login">
            </div>
        </form>
    </div>
</body>

</html>
