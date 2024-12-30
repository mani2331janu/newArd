<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-color: #f5f6f8;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 15px;
        }

        .row {
            width: 100%;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-right: 250px;
        }

        .login-form {
            background-color: #fff;
            margin-top: 50px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* height: 200px; */
            width: 600px;
            border: 2px solid #ddd;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-block {
            width: 100%;
        }

        .error {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Left Image Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="{{ asset('storage/img3.svg') }}" alt="Image" class="img-fluid">
            </div>
            <!-- Right Login Form Section -->
            <div class="col-md-6">
                <div class="login-form shadow-lg">
                    <h3 class="text-center mb-4">Login</h3>

                    
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <p>{{ session('success') }}</p>
                            <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close">&times;</button>
                        </div>
                    @endif

                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('login') }}</p>
                        </div>
                    @endif


                    <form id="loginForm" action="/store" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your Email" required>
                            <p class="error mt-1" id="email-error"></p>
                        </div>
                        <div class="form-group">
                            <label for="password">User Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter your Password" required minlength="6">
                            <p class="error mt-1" id="password-error"></p>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="mt-1" onclick="togglePassword()"> Show Password
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        <a href="{{ route('password.request') }}" class="d-block text-center mt-2"
                            style="color: #007bff; text-decoration: none;">Forgot Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        // Function to toggle password visibility
        function togglePassword() {
            let pass = document.getElementById('password');
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }

        $(document).ready(function() {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "*Please enter your email address.",
                        email: "*Please enter a valid email address."
                    },
                    password: {
                        required: "*Please provide a password.",
                        minlength: "*Your password must be at least 6 characters long."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>
