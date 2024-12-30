<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Order Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- jQuery and plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- SweetAlert CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            font-weight: 900;
            margin-left: 1rem;
        }

        .nav-link:hover {
            color: #03080f;

        }

        footer {
            background-color: #007bff;
            color: white;
            font-size: 1rem;
        }

        .footer-text {
            font-size: 1rem;
        }

        body {
            background-color: #f5f6f8;
        }

        .orderForm {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
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

        label.error {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
            display: block;
        }

        input.error,
        select.error {
            border-color: red;
        }

        input.error:focus,
        select.error:focus {
            outline-color: red;
        }

        .small-input {
            width: 80px;
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
                        <a class="nav-link mx-2 " href="/table"><i class="bi bi-view-list"></i> Check Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container my-5">
        <div class="row">
            {{-- <div class="col-md-6">
                <img src="{{ asset('storage/img.svg') }}" alt="Restaurant Image" class="img-fluid">
            </div> --}}

            <div class="col">
                <h4 class="text-center mb-4">Restaurant Order Form</h4>
                <form id="orderForm" class="needs-validation orderForm" autocomplete="off" novalidate>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-2 col-form-label text-md-end">Name : </label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-2 col-form-label text-md-end">Email :</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foodCategory" class="col-md-2 col-form-label text-md-end">Select Food Category :</label>
                        <div class="col-md-10">
                            <select class="form-select" id="foodCategory" name="foodCategory" required>
                                <option value="">-- Select --</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foodItem" class="col-md-2 col-form-label text-md-end">Select Food Items : </label>
                        <div class="col-md-10">
                            <select class="form-select" id="foodItem" name="foodItem[]" multiple="multiple" required>
                                <option value="">-- Select --</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label text-md-end">Quantity : </label>
                        <div class="col-md-10">
                            <div id="quantityWrapper"></div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rate" class="col-md-2 col-form-label text-md-end">Rate (₹) : </label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="rate" name="rate" readonly>
                        </div>
                        <label for="gst" class="col-md-2 col-form-label text-md-end">GST Price</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="gst" id="gst_price" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="totalPrice" class="col-md-2 col-form-label text-md-end">Total Price with GST (₹) : </label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" id="totalPrice" name="totalPrice" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <button type="button" id="reset" class="btn btn-primary mb-3 w-100">Reset</button>
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary w-100">Submit Order</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Footer Section -->
    <footer class="mt-5">
        <div class="container">
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
            $('#foodItem').select2();

            // Fetch food categories
            $.ajax({
                url: "{{ route('food-cate') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let options = '<option value="">Choose...</option>';
                    data.forEach(function(item) {
                        options += `<option value="${item.category_name}">${item.category_name}</option>`;
                    });
                    $("#foodCategory").html(options);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            // Fetch food items based on category
            $('#foodCategory').on('change', function() {
                let categoryName = $(this).val();

                if (categoryName) {
                    $.ajax({
                        url: "{{ route('food-item') }}",
                        type: "GET",
                        data: { category_name: categoryName },
                        dataType: "json",
                        success: function(data) {
                            let options = '<option value="">Choose...</option>';
                            data.forEach(function(item) {
                                options += `<option value="${item.food_name}" data-rate="${item.price}" data-gst="${item.gst_rate}">${item.food_name}</option>`;
                            });
                            $("#foodItem").html(options).trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching food items:", error);
                        }
                    });
                } else {
                    $("#foodItem").html('<option value="">Choose...</option>').trigger('change');
                    $('#quantityWrapper').html('');
                }
            });

            // Handle food item selection and update quantities
            $("#foodItem").on('change', function() {
                let selectedItems = $(this).val();
                let quantityWrapper = $("#quantityWrapper");
                // console.log(quantityWrapper);
                
                quantityWrapper.empty();

                if (selectedItems) {
                    selectedItems.forEach(function(item) {
                        let price = $("#foodItem option:selected[data-rate]").filter(`[value="${item}"]`).data('rate');
                        let gstRate = $("#foodItem option:selected[data-rate]").filter(`[value="${item}"]`).data('gst');

                        quantityWrapper.append(`
                            <div class="d-flex align-items-center mb-2">
                                <label class="me-2">${item}</label>
                                <button type="button" class="btn btn-secondary btn-sm decrement" data-item="${item}" data-price="${price}" data-gst="${gstRate}">-</button>
                                <input type="number" class="form-control col-xs-2 small-input mx-2 quantity" data-item="${item}" data-price="${price}" data-gst="${gstRate}" name="quantities[${item}]" value="1" min="1">
                                <button type="button" class="btn btn-secondary btn-sm increment" data-item="${item}" data-price="${price}" data-gst="${gstRate}">+</button>
                            </div>
                        `);
                    });
                }

                calculateTotal();
            });

            $(document).on('click', '.increment', function() {
                let quantityInput = $(this).siblings('.quantity');
                let quantity = parseInt(quantityInput.val());
                quantityInput.val(quantity + 1);
                // console.log(quantity);
                
                calculateTotal();
            });

            $(document).on('click', '.decrement', function() {
                let quantityInput = $(this).siblings('.quantity');
                let quantity = parseInt(quantityInput.val());
                if (quantity > 1) {
                    quantityInput.val(quantity - 1);
                }
                calculateTotal();
            });

            

            function calculateTotal(){
                let total = 0
                $('.quantity').each(function(){
                     let quantity = parseInt($(this).val());
                    //  console.log(quantity);
                    let price = parseFloat($(this).data('price'));
                    // console.log(price);

                    let gst = parseFloat($(this).data('gst'))
                    // console.log(gst);
                    
                     total += price*quantity
                    // console.log(total);
                    
                    $('#rate').val(total.toFixed(2));

                    let gstAmount = total*gst/100
                    // console.log(gstAmount);

                    $('#gst_price').val(gstAmount.toFixed(2));

                    let totalPrice = total+gstAmount
                    // console.log(totalPrice);

                    $('#totalPrice').val(totalPrice)
                    

                    
                    
                     
                })
            }

            $('#orderForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    foodCategory: {
                        required: true
                    },
                    foodItem: {
                        required: true,
                        minlength: 1
                    },
                    'quantities[]': {
                        required: true,
                        min: 1
                    }
                },
                messages: {
                    name: {
                        required: "*Please enter your name.",
                        minlength: "*Your name must be at least 3 characters long."
                    },
                    email: {
                        required: "*Please enter your email.",
                        email: "*Please enter a valid email address."
                    },
                    foodCategory: "*Please select a food category.",
                    foodItem: "*Please select at least one food item.",
                    'quantities[]': "*Please enter a quantity for each selected item."
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/submit-order',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            Swal.fire({

                                icon: 'success',
                                title: 'Order Submitted Successfully!',
                                text: 'Thank you for your order.',
                            }).then(() => {
                                form.reset();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! Please try again.',
                            });
                        }
                    });
                }
            });




            $("#reset").click(function() {
                // $('#orderForm')[0].reset();
                $('#name').val('');
                $('#email').val('');
                $('#foodCategory').val('')
                $('#foodItem').val(null).trigger('change')
                $('#quantityWrapper').html('');
                $('#rate').val('');
                $('#gst_price').val('');
                $('#totalPrice').val('');
            });
        });
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
