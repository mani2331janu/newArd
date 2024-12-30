<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        #mm {
            border: 2px solid rgb(228, 228, 228);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            padding: 1.5rem;
            font-size: 1rem;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            background-color: rgb(255, 255, 255);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .navbar-brand {
            /* font-size: 1.8rem; */
            font-size: 1.5rem;
            font-weight: bold;
            color: #000000;
        }

        .navbar-brand:hover {
            color: #555;
        }

        .nav-link {
            color: #000000;

            font-weight: 900;
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

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .filter-button {
            margin-right: 0.5rem;
        }

        #mmm {
            margin-left: 100px;
            margin-right: 100px;


        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Heaven Restaurant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home"><i class="bi bi-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu"><i class="bi bi-menu-down"></i> Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="/table"><i class="bi bi-view-list"></i> Check Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Order List</h1>
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('add') }}" class="btn btn-primary filter-button"><i class="bi bi-bag-plus"></i> Add Order</a>
            <button type="button" class="btn btn-primary filter-button" id="filterBtn"><i
                    class="bi bi-funnel-fill"></i> Filter</button>
        </div>
        <div id="filterSection" class= " col-12 search-container" style="display: none;">
            <form method="GET" action="/filter" id="mm" class="row mt-3 g-3 align-items-center">
                <!-- Food Category -->
                <div class="col-md-4">
                    <label for="foodCategory" class="form-label">Food Category</label>
                    <select class="form-select" name="foodCategory" id="foodCategory">
                        <option value="">All Categories</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                    </select>
                </div>
                <!-- Food Item -->
                <div class="col-md-4">
                    <label for="foodItem" class="form-label">Food Item</label>
                    <select class="form-select" name="foodItem" id="foodItem">
                        <option value="">All Items</option>
                    </select>
                </div>
                <!-- Search Name -->
                <div class="col-md-4">
                    <label for="name" class="form-label">Search Name</label>
                    <input type="search" id="name" name="name" class="form-control"
                        placeholder="Search by name">
                </div>
                <!-- Buttons -->
                <div class="col-12 d-flex justify-content-end mt-3">
                    <button type="reset" class="btn btn-secondary me-2 reset-btn">
                        <i class="bi bi-bootstrap-reboot"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-filter"></i> Apply Filter
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Table Section -->
    <div id="mmm" class=" mb-5">
        <div class="table-responsive">
            <table id="orderTable" class="mt-3 table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Food Category</th>
                        <th>Food Items</th>
                        <th>Quantities</th>
                        <th>Rate (₹)</th>
                        <th>Total Price (₹)</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="mt-5">
        <div class="container-fluid">
            <p>&copy; 2023 Heaven Coffee. All Rights Reserved.</p>
            <div class="social-icons mt-3">
                <a href="#"><i class="bi bi-facebook"></i> Facebook</a>
                <a href="#"><i class="bi bi-instagram"></i> Instagram</a>
                <a href="#"><i class="bi bi-twitter"></i> Twitter</a>
            </div>
            <p class="mt-2">Contact us at: info@heaven.com | +91-97865 04321</p>
        </div>
    </footer>
    <script>
        $(document).ready(function() {
            const foodData = {
                Breakfast: {
                    'Dosa': 50,
                    'Poori': 40,
                    'Pongal': 50,
                    'Idly(2)': 40
                },
                Lunch: {
                    'Veg Meals': 100,
                    'Non-Veg Meals': 150,
                    'Chettinadu Chicken': 100,
                    'Pepper Chicken': 120,
                    'Chicken Rice': 150,
                    'Chicken Noodles': 120,
                },
                Dinner: {
                    'Non-Veg Biryani': 200,
                    'Veg Biryani': 150,
                    'Fried Rice': 100,
                    'Paneer Fried Rice': 110
                }
            };

            $('#filterBtn').on('click', function() {
                $('#filterSection').fadeToggle('slow');
            });

            $('#foodCategory').on('change', function() {
                const category = $(this).val();
                const foodItemsDropdown = $('#foodItem');

                foodItemsDropdown.empty().append('<option value="">All Items</option>');

                if (category && foodData[category]) {
                    $.each(foodData[category], function(foodItem) {
                        foodItemsDropdown.append(
                            `<option value="${foodItem}">${foodItem}</option>`
                        );
                    });
                }
            });

            const table = $('#orderTable').DataTable({
                searching: false,
                processing: true,
                serverSide: true,
                lengthMenu: [5, 10],
                ajax: {
                    url: "{{ url('table') }}",
                    data: function(d) {
                        d.foodCategory = $('#foodCategory').val();
                        d.foodItem = $('#foodItem').val();
                        d.name = $('#name').val();
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'food_category',
                        name: 'food_category'
                    },
                    {
                        data: 'food_items',
                        name: 'food_items'
                    },
                    {
                        data: 'quantities',
                        name: 'quantities'
                    },
                    {
                        data: 'rate',
                        name: 'rate'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data) {
                            return data.split('T')[0];
                        }
                    }
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: 'Export to Excel',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export to PDF',
                        className: 'btn btn-danger'
                    }
                ],
                createdRow: function(row, data, dataIndex) {

                    $('td', row).each(function() {
                        const columnIndex = $(this).index();
                        if (columnIndex === 3 || columnIndex === 4) {
                            const rawText = $(this).text();
                            const cleanedText = rawText.replace(/[{}[\]"']/g, '');
                            $(this).text(cleanedText);
                        }
                    });
                }
            });

            $('form').on('submit', function(e) {
                e.preventDefault();
                table.draw();
               
            });

            $('.reset-btn').on('click', function() {
                $('#foodCategory').val('');
                $('#foodItem').val('');
                $('#name').val('');
                table.draw();
            });
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
