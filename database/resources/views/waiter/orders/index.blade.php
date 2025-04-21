<!DOCTYPE html>
<html lang="en">



<style>
    .product-item {
        height: 250px;
        /* Set fixed height */
        width: 100%;
        /* Adjust if needed */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .pro-img img {
        width: 150px;
        /* Set fixed width */
        height: 100px;
        /* Set fixed height */
        object-fit: cover;
        /* Ensures image fills the area without distortion */
        border-radius: 8px;
        /* Optional: Rounded corners */
    }

    .product-info {
        height: 100%;
    }
</style>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>Karimeen</title>

    <script src="{{ asset('assets2/js/theme-script.js') }}" type="e165a238ebbdfd01f7dbeab0-text/javascript"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap-datetimepicker.min.css') }}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/animate.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/select2.min.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/dataTables.bootstrap5.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/all.min.css') }}">

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/daterangepicker.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/tabler-icons.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/owl.theme.default.min.css') }}">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets2/css/nano.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">

</head>

<body class="pos-page">
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper pos-five">

        <!-- Header -->
        <div class="header pos-header">


            <!-- Header Menu -->
            <ul class="nav user-menu">



                <li class="nav-item pos-nav">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-purple btn-md d-inline-flex align-items-center">
                        <i class="ti ti-world me-1"></i>Dashboard
                    </a>
                </li>


            </ul>
            <!-- /Header Menu -->


        </div>
        <!-- Header -->

        <div class="page-wrapper pos-pg-wrapper ms-0">
            <div class="content pos-design p-0">

                <div class="row pos-wrapper">

                    <!-- Products -->
                    <div class="col-md-12 col-lg-7 col-xl-8 d-flex">
                        <div class="pos-categories tabs_wrapper p-0 flex-fill">
                            <div class="content-wrap">
                                <div class="tab-wrap">

                                    <ul class="tabs owl-carousel pos-category5">
                                        <li class="category-tab active" data-category="all">
                                            <h6><a href="javascript:void(0);">All</a></h6>
                                        </li>
                                        @foreach ($categories as $category)
                                        <li class="category-tab" data-category="{{ $category->id }}">
                                            <h6><a href="javascript:void(0);">{{ $category->category_name }}</a></h6>
                                        </li>
                                        @endforeach
                                    </ul>




                                </div>
                                <div class="tab-content-wrap">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                        <div class="mb-3">

                                            <p>{{ date('F d, Y') }}</p>

                                        </div>
                                        <div class="d-flex align-items-center flex-wrap mb-2">
                                            <div class="input-icon-start search-pos position-relative mb-2 me-3">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-search"></i>
                                                </span>
                                                <input type="text" id="search-product" class="form-control" placeholder="Search Product">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="pos-products">
                                        <div class="tabs_container">
                                            <div class="tab_content active" data-tab="all">
                                                <div class="row g-3" id="product-list">
                                                    @foreach ($products as $product)
                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3 product-item"
                                                        data-category="{{ $product->category_id }}"
                                                        data-name="{{ strtolower($product->name) }}"
                                                        data-special="{{ $product->special == 'special' ? 'yes' : 'no' }}"
                                                        data-created-at="{{ \Carbon\Carbon::parse($product->created_at)->toDateString() }}"> <!-- Format date -->
                                                        <div class="product-info card mb-0">
                                                            <a href="javascript:void(0);" class="pro-img">
                                                                <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}">
                                                            </a>
                                                            <h6 class="product-name">{{ $product->name }}</h6>
                                                            <div class="d-flex align-items-center justify-content-between price">
                                                                <p class="text-gray-9 mb-0">AED:{{ $product->product_selling_cost }}</p>
                                                                <button class="btn btn-sm btn-primary select-product"
                                                                    data-id="{{ $product->id }}"
                                                                    data-name="{{ $product->name }}"
                                                                    data-price="{{ $product->product_selling_cost }}">
                                                                    Add
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Products -->

                    <!-- Order Details -->
                    <div class="col-md-12 col-lg-5 col-xl-4 ps-0 theiaStickySidebar d-lg-flex">
                        <aside class="product-order-list bg-secondary-transparent flex-fill">
                            <div class="card">
                                <div class="card-body">


                                    <div class="product-added block-section">
                                        <div class="head-text d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <h5 class="me-2">Order Details</h5>
                                                <br>
                                                <p>-------------------------------------------</p>



                                            </div>

                                        </div>
                                        <div class="product-wrap">
                                            <div class="empty-cart">
                                                <div class="fs-24 mb-1">
                                                    <i class="ti ti-shopping-cart"></i>
                                                </div>
                                                <p class="fw-bold">No Products Selected</p>
                                            </div>
                                            <div class="product-list border-0 p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th class="fw-bold bg-light">Item</th>
                                                                <th class="fw-bold bg-light">QTY</th>
                                                                <th class="fw-bold bg-light text-end">Cost</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="cart-items">
                                                            <!-- Selected products will be added here -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3" style="margin-top: 15px;">
                                            <label for="table-select" class="form-label"><strong>Select Table:</strong></label>
                                            <select id="table-select" class="form-control">
                                                <option value="" disabled selected>Select a Table</option>
                                                <!-- Generating options dynamically -->
                                                <?php for ($i = 1; $i <= 20; $i++): ?>
                                                    <option value="<?= $i ?>">Table <?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>



                                        <button id="place-order-btn" class="btn btn-success">Place Order</button>
                                    </div>

                                </div>
                            </div>


                        </aside>
                    </div>
                    <!-- /Order Details -->

                </div>

                <div class="pos-footer bg-white p-3 border-top">
                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                        <a href="javascript:void(0);" class="btn btn-secondary d-inline-flex align-items-center justify-content-center"
                            id="show-specials">
                            <i class="ti ti-shopping-cart me-2"></i> Today's Special
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->












    <!-- /Today's Profit -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".category-tab").click(function() {
                var selectedCategory = $(this).data("category");

                $(".category-tab").removeClass("active");
                $(this).addClass("active");

                if (selectedCategory === "all") {
                    $(".product-item").show();
                } else {
                    $(".product-item").hide();
                    $(".product-item[data-category='" + selectedCategory + "']").show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".pos-category5").owlCarousel({
                loop: false, // Disable infinite loop
                margin: 10, // Space between items
                nav: true, // Enable navigation arrows
                dots: false, // Hide dots
                items: 5, // Show only 5 categories at a time
                navText: ["<i class='ti ti-arrow-left'></i>", "<i class='ti ti-arrow-right'></i>"], // Custom arrow icons
                responsive: {
                    0: {
                        items: 2
                    }, // Show 2 items on small screens
                    600: {
                        items: 3
                    }, // Show 3 items on medium screens
                    1000: {
                        items: 5
                    } // Show 5 items on large screens
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add product to the cart
            $(".select-product").on("click", function() {
                let productId = $(this).data("id");
                let productName = $(this).data("name");
                let productPrice = $(this).data("price");

                // Check if product already exists in the cart
                let existingRow = $("#cart-items tr[data-id='" + productId + "']");
                if (existingRow.length > 0) {
                    // Increase quantity if product already exists
                    let qtyInput = existingRow.find(".qty");
                    let currentQty = parseInt(qtyInput.val());
                    qtyInput.val(currentQty + 1);
                } else {
                    // Add new product row
                    let newRow = `
                <tr data-id="${productId}">
                    <td>
                        <div class="d-flex align-items-center">
                            <a class="delete-icon" href="javascript:void(0);">
                                <i class="ti ti-trash-x-filled text-danger"></i>
                            </a>
                            <h6 class="fs-13 fw-normal">${productName}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="qty-item m-0">
                            <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center"><i class="ti ti-minus"></i></a>
                            <input type="text" class="form-control text-center qty" name="qty" value="1">
                            <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center"><i class="ti ti-plus"></i></a>
                        </div>
                    </td>
                    <td class="fs-13 fw-semibold text-gray-9 text-end price">AED${productPrice}</td>
                </tr>
            `;
                    $("#cart-items").append(newRow);
                }
            });

            // Increase Quantity
            $(document).on("click", ".inc", function() {
                let qtyInput = $(this).siblings("input.qty");
                let currentQty = parseInt(qtyInput.val());
                qtyInput.val(currentQty + 1);
            });

            // Decrease Quantity
            $(document).on("click", ".dec", function() {
                let qtyInput = $(this).siblings("input.qty");
                let currentQty = parseInt(qtyInput.val());
                if (currentQty > 1) {
                    qtyInput.val(currentQty - 1);
                }
            });

            // Remove product from cart
            $(document).on("click", ".delete-icon", function() {
                $(this).closest("tr").remove();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#place-order-btn').on('click', function() {
                let tableId = $('#table-select').val();
                if (!tableId) {
                    alert('Please select a table');
                    return;
                }

                let items = [];
                $('#cart-items tr').each(function() {
                    let productId = $(this).data('id');
                    let quantity = parseInt($(this).find('.qty').val());
                    let price = parseFloat($(this).find('.price').text().replace('$', ''));

                    items.push({
                        id: productId,
                        quantity: quantity,
                        price: price
                    });
                });

                if (items.length === 0) {
                    alert('No products selected');
                    return;
                }

                $.ajax({
                    url: 'https://billingmark.com/cafe/public/orders',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        table_id: tableId,
                        items: items
                    }),
                    success: function(response) {
                        alert(response.message);
                        window.location.reload();
                    },
                    error: function(error) {
                        alert('Failed to place order');
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("#search-product").on("keyup", function() {
                let searchValue = $(this).val().toLowerCase();

                $(".product-item").each(function() {
                    let productName = $(this).data("name");

                    // Show or hide the product based on the search
                    if (productName.includes(searchValue)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>



    <!-- jQuery -->
    <script data-cfasync="false" src="{{ asset('assets2/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets2/js/feather.min.js') }}" type="text/javascript"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets2/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets2/js/apexcharts.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/chart-data.js') }}" type="text/javascript"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('assets2/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/dataTables.bootstrap5.min.js') }}" type="text/javascript"></script>

    <!-- Daterangepicker JS -->
    <script src="{{ asset('assets2/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/daterangepicker.js') }}" type="text/javascript"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets2/js/owl.carousel.min.js') }}" type="text/javascript"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets2/js/select2.min.js') }}" type="text/javascript"></script>

    <!-- Sticky Sidebar -->
    <script src="{{ asset('assets2/js/ResizeSensor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/theia-sticky-sidebar.js') }}" type="text/javascript"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets2/js/pickr.es5.min.js') }}" type="text/javascript"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets2/js/theme-colorpicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/calculator.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/script.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets2/js/rocket-loader.min.js') }}" data-cf-settings="e165a238ebbdfd01f7dbeab0-|49" defer=""></script>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#table-select').select2({
            placeholder: "Select a Table",
            allowClear: true
        });
    });
</script>

<script>
    document.getElementById("show-specials").addEventListener("click", function() {
        let products = document.querySelectorAll(".product-item");

        // Get today's date in YYYY-MM-DD format
        let today = new Date().toISOString().split('T')[0];

        products.forEach(function(product) {
            let isSpecial = product.getAttribute("data-special") === "yes";
            let createdAt = product.getAttribute("data-created-at");

            if (isSpecial && createdAt === today) {
                product.style.display = "block"; // Show special products created today
            } else {
                product.style.display = "none"; // Hide others
            }
        });
    });
</script>
