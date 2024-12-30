<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 5px;
        }

        .btn {
            border-radius: 5px;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-left: 100px;
        }
        .form-group label {
            font-weight: bold; /* Make labels bold */
        }


        #m {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #ddd;
        }

        .error {
            color: red; 
            font-size: 1rem;
            margin-top: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/img4.svg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6  ">
            <div id="m" class="container shadow-lg">
                <h3 class="text-center mb-4">Forgot Password</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form id="forgotPasswordForm" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Enter your email:</label>
                        <input type="email" id="email" name="email" class="form-control">
                        <p class="error" id="email-error"></p>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#forgotPasswordForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "*Please enter your email address.",
                        email: "*Please enter a valid email address."
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
