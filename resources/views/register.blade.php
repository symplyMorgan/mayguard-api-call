<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xxl-5 col-lg-6 col-md-7 col-12">
            <h4 class="h2 mb-3">Register</h4>
            @if($errors->any())
                <ul class="alert alert-danger mb-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="lastname">Last name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="organization">Organization name</label>
                            <input type="text" name="organisationName" id="organization" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="phone">Phone number</label>
                            <input type="tel" name="phone" id="phone" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary">Register</button>
                    <a href="{{ route('login') }}">Go to sign in</a>
                </div>
            </form>
            <p class="mt-4">
                <a href="/">Go back home</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
