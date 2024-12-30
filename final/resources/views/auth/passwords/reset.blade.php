<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <style>
        body {
            background-color: #f7f8fa;
            font-family: Arial, sans-serif;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        .btn {
            font-size: 1rem;
            font-weight: bold;
        }
         .error {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container">
        <div class="row align-items-center justify-content-center w-100">
            <!-- Form Section -->
            <div class="col-lg-6 col-md-8 col-sm-12 p-3">
                <div class="form-container shadow-lg">
                    <div class="text-center mb-4">
                        <h1 class="h4">Reset Password</h1>
                    </div>

                    <form id="resetPasswordForm" action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required
                                minlength="6">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" onclick="show1()">
                                <label class="form-check-label">Show Password</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" required minlength="6" equalTo="#password">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox"
                                    onclick="show2()">
                                <label class="form-check-label">Show Password</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-lg-6 col-md-8 col-sm-12 d-flex justify-content-center align-items-center">
                <div class="img-container">
                    <img src="{{ asset('storage/img5.svg') }}" alt="Image">
                </div>
            </div>
        </div>
    </div>

    <script>
        function show1() {
            var input = document.getElementById("password");
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }

        function show2() {
            var input = document.getElementById("password_confirmation");
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }


        $(document).ready(function() {
            $('#resetPasswordForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: {
                        required: "*Please enter your email address.",
                        email: "*Please enter a valid email address."
                    },
                    password: {
                        required: "*Please enter your new password.",
                        minlength: "*Password must be at least 6 characters long."
                    },
                    password_confirmation: {
                        required: "*Please confirm your password.",
                        minlength: "*Password must be at least 6 characters long.",
                        equalTo: "*Passwords do not match."
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // Submit the form
                }
            });
        });
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
