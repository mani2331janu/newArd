<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Home</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            padding: 1.5rem;
            font-size: 1rem;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            background-color: rgb(255, 255, 255);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
            color: #000000;
        }

        .navbar-brand:hover {
            color: #555;
        }

        .nav-link {
            color: #000000;
            font-weight: 800;
            margin-left: 1rem;
        }

        .nav-link:hover {
            color: #0d3d6f;
        }

        footer {
            background-color: #ffffff;
            color: #333;
            padding: 1rem 1.5rem;
            text-align: center;
            box-shadow: 0px -2px 6px rgba(0, 0, 0, 0.1);
            font-size: 1.2rem;
        }

        footer a {
            text-decoration: none;
            color: inherit;
            margin: 0 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light animate__animated animate__fadeInDown">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <i class="cil-restaurant"></i> Heaven Restaurant</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="#"> <i class="bi bi-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/menu"> <i class="bi bi-menu-down"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="{{ route('add') }}"><i class="bi bi-plus-circle-dotted"></i> Add
                            item</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5 mt-5">
        <div class="row">
            <div class=" mt-5 col-md-6 animate__animated animate__bounceInLeft">
                <img src="{{ asset('storage/i.svg') }}" alt="Restaurant Image" class="img-fluid">
            </div>
            <div class=" card shadow  col-md-6 mt-5 animate__animated animate__bounceInRight">
                <div class="p-1" >
                    <h1>Welcome to Heaven Restaurant</h1>
                <p class="p-1">At Heaven Restaurant, we pride ourselves on serving exquisite dishes prepared with the freshest ingredients. Whether you're craving traditional favorites or innovative culinary creations, we have something for everyone.</p>
                <p class="p-1" >Our restaurant offers a warm and welcoming atmosphere, perfect for family gatherings, romantic dinners, or casual outings with friends. From appetizers to main courses, our chefs craft every dish with passion to provide an exceptional dining experience.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5 mt-5">
        <div class="row">
            <div class=" card shadow col-md-6 mt-5 animate__animated animate__bounceInLeft">
                <div class="p-1" >
                    <h1>Savor Our Culinary Delights</h1>
                <p class="p-1">Our menu features a wide selection of mouth-watering dishes, from savory appetizers to flavorful entrees. Whether you’re a fan of classic comfort food or prefer something more exotic, our chefs have created a menu that caters to all tastes.</p>
                <p class="p-1" >Indulge in signature dishes crafted with care, using only the finest and freshest ingredients. From our rich and creamy pasta to grilled specialties, every dish is designed to tantalize your taste buds.</p>
                </div>
            </div>
            <div class="col-md-6 my-5 animate__animated animate__bounceInRight">
                <img src="{{ asset('storage/i2.svg') }}" alt="Restaurant Image" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="mt-5">
        <div class="container">
            <p>&copy; 2024 Heaven Restaurant. All Rights Reserved.</p>
            <div class="social-icons mt-3">
                <a href="#"><i class="bi bi-facebook"></i> Facebook</a>
                <a href="#"><i class="bi bi-instagram"></i> Instagram</a>
                <a href="#"><i class="bi bi-twitter"></i> Twitter</a>
            </div>
            <p class="mt-2">Contact us at: info@heavenrestaurant.com | +1 (123) 456-7890</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
