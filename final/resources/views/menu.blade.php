<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Home</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Correct jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Correct DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Correct DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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

        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #f0f0f0;
        }

        .card-title {
            font-size: 1.4rem;
            color: #333;
        }

        .card-text {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .text-muted {
            font-size: 1rem;
            font-weight: bold;
            color: #007bff;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            font-weight: bold;
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
            <a class="navbar-brand" href="#">Heaven Restaurant</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/"> <i class="bi bi-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="#"> <i class="bi bi-menu-down"></i> Menu</a>
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

    <div class="container my-5">
        <h3 class="text-center fw-bolder">Restaurant Menu</h3>

        <!-- Appetizers Section -->
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/m.webp') }}" alt="Medu Vadai">
                    <div class="card-body">
                        <h5 class="card-title">Medu Vadai</h5>
                        <p class="card-text">Fried lentil doughnuts served with chutney.</p>
                        <p class="text-muted">₹25</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/ma.jpeg') }}" alt="Masala Vadai">
                    <div class="card-body">
                        <h5 class="card-title">Masala Vadai</h5>
                        <p class="card-text">Spiced lentil fritters.</p>
                        <p class="text-muted">₹20</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/v.jpeg') }}" alt="Vegetable Biryani">
                    <div class="card-body">
                        <h5 class="card-title">Vegetable Biryani</h5>
                        <p class="card-text">Basmati rice cooked with vegetables and spices.</p>
                        <p class="text-muted">₹150</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Course Section -->
        <div class="row mb-4">
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/s.jpeg') }}" alt="Sambar Rice">
                    <div class="card-body">
                        <h5 class="card-title">Sambar Rice</h5>
                        <p class="card-text">Spiced rice served with sambar.</p>
                        <p class="text-muted">₹60</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/c.jpeg') }}" alt="Chettinad Chicken Curry">
                    <div class="card-body">
                        <h5 class="card-title">Chettinad Chicken Curry</h5>
                        <p class="card-text">Spicy and aromatic chicken curry.</p>
                        <p class="text-muted">₹250</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/pt.jpeg') }}" alt="Parotta with Curry">
                    <div class="card-body">
                        <h5 class="card-title"> Parotta with Curry</h5>
                        <p class="card-text">Flaky layered bread served with flavorful curry.</p>
                        <p class="text-muted">₹180</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desserts Section -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/ch.jpeg') }}" alt="Chicken Rice">
                    <div class="card-body">
                        <h5 class="card-title">Chicken Rice</h5>
                        <p class="card-text">Tangy and spicy rice with rich flavors.</p>
                        <p class="text-muted">₹120</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/cr.jpeg') }}" alt="Curd Rice">
                    <div class="card-body">
                        <h5 class="card-title">Curd Rice</h5>
                        <p class="card-text">Rice mixed with yogurt and mild spices.</p>
                        <p class="text-muted">₹100</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow">
                    <img src="{{ asset('storage/fc.jpeg') }}" alt="Filter Coffee">
                    <div class="card-body">
                        <h5 class="card-title">Filter Coffee</h5>
                        <p class="card-text">Strong South Indian-style coffee.</p>
                        <p class="text-muted">₹50</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button class="btn btn-outline-dark mt-5 mb-5" id="t">View All Menu</button>
        </div>

        <div>
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr class="table-dark">
                        <th>Category</th>
                        <th>Food Item</th>
                        <th>Price (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Breakfast</td>
                        <td>Idly (2 pcs)</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>Breakfast</td>
                        <td>Dosa</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>Breakfast</td>
                        <td>Poori (2 pcs)</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>Breakfast</td>
                        <td>Pongal</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td>Breakfast</td>
                        <td>Vada (2 pcs)</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>Breakfast</td>
                        <td>Paratha (2 pcs)</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>Main Course</td>
                        <td>Chicken Biryani</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>Main Course</td>
                        <td>Mutton Curry</td>
                        <td>300</td>
                    </tr>
                    <tr>
                        <td>Main Course</td>
                        <td>Fish Curry</td>
                        <td>250</td>
                    </tr>
                    <tr>
                        <td>Main Course</td>
                        <td>Vegetable Curry</td>
                        <td>150</td>
                    </tr>
                    <tr>
                        <td>Desserts</td>
                        <td>Rasmalai</td>
                        <td>120</td>
                    </tr>
                    <tr>
                        <td>Desserts</td>
                        <td>Gulab Jamun</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>Desserts</td>
                        <td>Jalebi</td>
                        <td>90</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
           
            $('#dataTable').hide(); // Hide the table initially

            $('#t').on('click', function() {
                $('#dataTable').toggle(); // Toggle table visibility on button click
            });
        });
    </script>
</body>

</html>
