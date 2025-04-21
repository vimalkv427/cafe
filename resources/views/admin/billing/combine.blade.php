<!DOCTYPE html>
<html lang="en">

<style>
    @media print {
        @page {
            size: 58mm auto;
            /* 58mm width, auto height */
            margin: 0;
            /* No margin for full width */
        }

        body {
            width: 58mm;
            margin: 0;
            padding: 0;
            font-size: 12px;
            font-family: "Arial", sans-serif;
        }

        #print-receipt {
            display: none !important;
        }


        .modal-content {
            border: none !important;
            box-shadow: none !important;
            padding: 5px;
        }

        .table-borderless th,
        .table-borderless td {
            font-size: 12px;
            padding: 2px;
            border-bottom: 1px dashed #000;
            /* Dashed lines for better visibility */
        }

        .invoice-bar {
            font-size: 10px;
            margin-top: 5px;
        }

        img {
            max-width: 100%;
            /* Ensure images fit within 58mm */
        }

        button {
            display: none;
            /* Hide print button */
        }
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
</style>

<style>
    .section-divider {
        border-top: 1px dashed #000;
        margin: 8px 0;
    }
</style>

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

    <!-- Meta Tags -->
    <meta charset="utf-8">

    <title> POS</title>

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
                                                <input type="text" class="form-control" placeholder="Search Product">
                                            </div>
                                            <!-- <a href="#" class="btn btn-sm btn-dark mb-2 me-2"><i class="ti ti-tag me-1"></i>View All Brands</a>
                                            <a href="#" class="btn btn-sm btn-primary mb-2"><i class="ti ti-star me-1"></i>Featured</a> -->
                                        </div>
                                    </div>
                                    <div class="pos-products">
                                        <div class="tabs_container">
                                            <div class="tab_content active" data-tab="all">
                                                <div class="row g-3">
                                                    @foreach ($products as $product)
                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3 product-item" data-category="{{ $product->category_id }}">
                                                        <div class="product-info card mb-0">
                                                            <a href="javascript:void(0);" class="pro-img">
                                                                <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}">
                                                            </a>
                                                            <h6 class="product-name">{{ $product->name }}</h6>
                                                            <div class="d-flex align-items-center justify-content-between price">
                                                                <p class="text-gray-9 mb-0">AED{{ $product->product_selling_cost }}</p>
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
                                                <div class="badge bg-light text-gray-9 fs-12 fw-semibold py-2 border rounded">Items : <span class="text-teal">3</span></div>
                                            </div>
                                            <a href="javascript:void(0);" class="d-flex align-items-center clear-icon fs-10 fw-medium">Clear all</a>
                                        </div>
                                        ---------------------------------------------------------
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

                                    </div>
                                    <div class="order-total bg-total bg-white p-0">
                                        <h5 class="mb-3">Payment Summary</h5>
                                        <table class="table table-responsive table-borderless">
                                            <tbody>

                                                <tr>
                                                    <td>Tax<a href="#" class="ms-3 link-default" data-bs-toggle="modal" data-bs-target="#order-tax"><i class="ti ti-edit"></i></a></td>
                                                    <td class="text-gray-9 text-end" id="tax-value">5%</td>
                                                </tr>

                                                <tr>
                                                    <td><span class="text-danger">Discount</span><a href="#" class="ms-3 link-default" data-bs-toggle="modal" data-bs-target="#discount"><i class="ti ti-edit"></i></a></td>
                                                    <td class="text-danger text-end" id="discount-value">0</td>
                                                </tr>


                                                <tr>
                                                    <td class="fw-bold border-top border-dashed">Total Payable</td>
                                                    <td class="text-gray-9 fw-bold text-end border-top border-dashed" id="total-payable">$0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <button id="printBtnBeforePayment" class="btn btn-md btn-secondary">Print Before Payment</button>

                                </div>
                            </div>
                            <div class="card payment-method">
                                <div class="card-body">
                                    <h5 class="mb-3">Select Payment</h5>
                                    <div class="row align-items-center methods g-2">
                                        <div class="col-sm-6 col-md-4 d-flex">
                                            <a href="javascript:void(0);" class="payment-item d-flex align-items-center justify-content-center p-2 flex-fill"
                                                data-value="Cash" data-bs-toggle="modal" data-bs-target="#payment-cash">
                                                <img src="{{ asset('assets2/images/cash-icon.svg') }}" class="me-2" alt="img">
                                                <p class="fs-14 fw-medium">Cash</p>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 d-flex">
                                            <a href="javascript:void(0);" class="payment-item d-flex align-items-center justify-content-center p-2 flex-fill"
                                                data-value="Card" data-bs-toggle="modal" data-bs-target="#payment-card1">
                                                <img src="{{ asset('assets2/images/card.svg') }}" class="me-2" alt="img">
                                                <p class="fs-14 fw-medium">Card</p>
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-4 d-flex">
                                            <a href="javascript:void(0);" class="payment-item d-flex align-items-center justify-content-center p-2 flex-fill"
                                                data-value="UPI" data-bs-toggle="modal" data-bs-target="#scan-payment1">
                                                <img src="{{ asset('assets2/images/scan-icon.svg') }}" class="me-2" alt="img">
                                                <p class="fs-14 fw-medium">UPI</p>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </aside>
                    </div>
                    <!-- /Order Details -->

                </div>

                <div class="pos-footer bg-white p-3 border-top">
                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">

                        <!-- <a href="javascript:void(0);" class="btn btn-cyan d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#payment-completed"><i class="ti ti-cash-banknote me-2"></i>Payment</a> -->
                        <a href="javascript:void(0);" class="btn btn-indigo d-inline-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#reset"><i class="ti ti-reload me-2"></i>Reset</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->



    <!-- /Print Receipt -->

    <!-- Products -->
    <div class="modal fade modal-default pos-modal" id="products" aria-labelledby="products">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="me-4">Products</h5>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-3">
                                <span class="badge bg-dark fs-12">Order ID : #45698</span>
                                <p class="fs-16">Number of Products : 02</p>
                            </div>
                            <div class="product-wrap h-auto">
                                <div class="product-list bg-white align-items-center justify-content-between">
                                    <div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products">
                                        <a href="javascript:void(0);" class="pro-img">
                                            <img src="images/pos-product-16.png" alt="Products">
                                        </a>
                                        <div class="info">
                                            <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                            <p>Quantity : 04</p>
                                        </div>
                                    </div>
                                    <p class="text-teal fw-bold">$2000</p>
                                </div>
                                <div class="product-list bg-white align-items-center justify-content-between">
                                    <div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products">
                                        <a href="javascript:void(0);" class="pro-img">
                                            <img src="images/pos-product-17.png" alt="Products">
                                        </a>
                                        <div class="info">
                                            <h6><a href="javascript:void(0);">Iphone 11S</a></h6>
                                            <p>Quantity : 04</p>
                                        </div>
                                    </div>
                                    <p class="text-teal fw-bold">$3000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Products -->

    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Customer Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- Reset -->
    <div class="modal fade modal-default" id="reset" aria-labelledby="payment-completed">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="success-wrap text-center">
                        <form action="pos.html">
                            <div class="icon-success bg-purple-transparent text-purple mb-2">
                                <i class="ti ti-transition-top"></i>
                            </div>
                            <h3 class="mb-2">Confirm Your Action</h3>
                            <p class="fs-16 mb-3">The current order will be cleared. But not deleted if it's persistent. Would you like to proceed ?</p>
                            <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                                <button type="submit" class="btn btn-md btn-primary">Yes, Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Reset -->

    <!-- Recent Transactions -->
    <div class="modal fade pos-modal" id="recents" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recent Transactions</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" aria-controls="purchase" aria-selected="true" role="tab">Purchase</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" aria-controls="payment" aria-selected="false" role="tab">Payment</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" aria-controls="return" aria-selected="false" role="tab">Return</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                        <div class="search-set">
                                            <div class="search-input">
                                                <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                                            </div>
                                        </div>
                                        <ul class="table-top-head">
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="images/pdf.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="images/excel.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable border">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="no-sort">
                                                            <label class="checkboxs">
                                                                <input type="checkbox" class="select-all">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </th>
                                                        <th>Customer</th>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Amount </th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-27.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Carl Evans</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0101</td>
                                                        <td>24 Dec 2024</td>
                                                        <td>$1000</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-02.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Minerva Rameriz</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0102</td>
                                                        <td>10 Dec 2024</td>
                                                        <td>$1500</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-05.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Robert Lamon</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0103</td>
                                                        <td>27 Nov 2024</td>
                                                        <td>$1500</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-22.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Patricia Lewis</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0104</td>
                                                        <td>18 Nov 2024</td>
                                                        <td>$2000</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-03.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Mark Joslyn</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0105</td>
                                                        <td>06 Nov 2024</td>
                                                        <td>$800</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-12.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Marsha Betts</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0106</td>
                                                        <td>25 Oct 2024</td>
                                                        <td>$750</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-06.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Daniel Jude</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0107</td>
                                                        <td>14 Oct 2024</td>
                                                        <td>$1300</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment" role="tabpanel">
                                <div class="card mb-0">
                                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                        <div class="search-set">
                                            <div class="search-input">
                                                <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                                            </div>
                                        </div>
                                        <ul class="table-top-head">
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="images/pdf.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="images/excel.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable border">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="no-sort">
                                                            <label class="checkboxs">
                                                                <input type="checkbox" class="select-all">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </th>
                                                        <th>Customer</th>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Amount </th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-27.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Carl Evans</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0101</td>
                                                        <td>24 Dec 2024</td>
                                                        <td>$1000</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-02.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Minerva Rameriz</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0102</td>
                                                        <td>10 Dec 2024</td>
                                                        <td>$1500</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-05.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Robert Lamon</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0103</td>
                                                        <td>27 Nov 2024</td>
                                                        <td>$1500</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-22.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Patricia Lewis</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0104</td>
                                                        <td>18 Nov 2024</td>
                                                        <td>$2000</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-03.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Mark Joslyn</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0105</td>
                                                        <td>06 Nov 2024</td>
                                                        <td>$800</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-12.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Marsha Betts</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0106</td>
                                                        <td>25 Oct 2024</td>
                                                        <td>$750</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-06.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Daniel Jude</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0107</td>
                                                        <td>14 Oct 2024</td>
                                                        <td>$1300</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="return" role="tabpanel">
                                <div class="card mb-0">
                                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                        <div class="search-set">
                                            <div class="search-input">
                                                <span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
                                            </div>
                                        </div>
                                        <ul class="table-top-head">
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="images/pdf.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="images/excel.svg" alt="img"></a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table datatable border">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="no-sort">
                                                            <label class="checkboxs">
                                                                <input type="checkbox" class="select-all">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </th>
                                                        <th>Customer</th>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Amount </th>
                                                        <th class="no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-27.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Carl Evans</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0101</td>
                                                        <td>24 Dec 2024</td>
                                                        <td>$1000</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-02.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Minerva Rameriz</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0102</td>
                                                        <td>10 Dec 2024</td>
                                                        <td>$1500</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-05.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Robert Lamon</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0103</td>
                                                        <td>27 Nov 2024</td>
                                                        <td>$1500</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-22.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Patricia Lewis</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0104</td>
                                                        <td>18 Nov 2024</td>
                                                        <td>$2000</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-03.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Mark Joslyn</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0105</td>
                                                        <td>06 Nov 2024</td>
                                                        <td>$800</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-12.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Marsha Betts</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0106</td>
                                                        <td>25 Oct 2024</td>
                                                        <td>$750</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="checkboxs">
                                                                <input type="checkbox">
                                                                <span class="checkmarks"></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="avatar avatar-md me-2">
                                                                    <img src="images/user-06.jpg" alt="product">
                                                                </a>
                                                                <a href="javascript:void(0);">Daniel Jude</a>
                                                            </div>
                                                        </td>
                                                        <td>INV/SL0107</td>
                                                        <td>14 Oct 2024</td>
                                                        <td>$1300</td>
                                                        <td class="action-table-data">
                                                            <div class="edit-delete-action">
                                                                <a class="me-2 edit-icon p-2" href="javascript:void(0);"><i data-feather="eye" class="feather-eye"></i></a>
                                                                <a class="me-2 p-2" href="javascript:void(0);"><i data-feather="edit" class="feather-edit"></i></a>
                                                                <a class="p-2" href="javascript:void(0);"><i data-feather="trash-2" class="feather-trash-2"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Recent Transactions -->

    <!-- Orders -->
    <div class="modal fade pos-modal" id="orders" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Orders</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabs-sets">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="onhold-tab" data-bs-toggle="tab" data-bs-target="#onhold" type="button" aria-controls="onhold" aria-selected="true" role="tab">Onhold</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="unpaid-tab" data-bs-toggle="tab" data-bs-target="#unpaid" type="button" aria-controls="unpaid" aria-selected="false" role="tab">Unpaid</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" type="button" aria-controls="paid" aria-selected="false" role="tab">Paid</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="onhold" role="tabpanel" aria-labelledby="onhold-tab">
                                <div class="input-icon-start pos-search position-relative mb-3">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search Product">
                                </div>
                                <div class="order-body">
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : #45698</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> admin</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> $900</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span> Botsford</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> 24 Dec 2024 13:39:11</p>
                                                </div>
                                            </div>
                                            <div class="bg-info-transparent p-1 rounded text-center my-3">
                                                <p class="text-info fw-medium">Customer need to recheck the product once</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                                <a href="javascript:void(0);" class="btn btn-md btn-orange">Open Order</a>
                                                <a href="javascript:void(0);" class="btn btn-md btn-teal" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#products">View Products</a>
                                                <a href="javascript:void(0);" class="btn btn-md btn-indigo">Print</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-light mb-0">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : #666659</span>
                                            <div class="mb-3">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> admin</p>
                                                        <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> $900</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span> Botsford</p>
                                                        <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> 24 Dec 2024 13:39:11</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="unpaid" role="tabpanel">
                                <div class="input-icon-start pos-search position-relative mb-3">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search Product">
                                </div>
                                <div class="order-body">
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : #45698</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> admin</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> $900</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span> Anastasia</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> 24 Dec 2024 13:39:11</p>
                                                </div>
                                            </div>
                                            <div class="bg-info-transparent p-1 rounded text-center my-3">
                                                <p class="text-info fw-medium">Customer need to recheck the product once</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                                <a href="javascript:void(0);" class="btn btn-md btn-orange">Open Order</a>
                                                <a href="javascript:void(0);" class="btn btn-md btn-teal" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#products">View Products</a>
                                                <a href="javascript:void(0);" class="btn btn-md btn-indigo">Print</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-light mb-0">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : #666659</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> admin</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> $900</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span> Lucia</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> 24 Dec 2024 13:39:11</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="paid" role="tabpanel">
                                <div class="input-icon-start pos-search position-relative mb-3">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search Product">
                                </div>
                                <div class="order-body">
                                    <div class="card bg-light mb-3">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : #45698</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> admin</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> $1000</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span> Hugo</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> 24 Dec 2024 13:39:11</p>
                                                </div>
                                            </div>
                                            <div class="bg-info-transparent p-1 rounded text-center my-3">
                                                <p class="text-info fw-medium">Customer need to recheck the product once</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                                                <a href="javascript:void(0);" class="btn btn-md btn-orange">Open Order</a>
                                                <a href="javascript:void(0);" class="btn btn-md btn-teal" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#products">View Products</a>
                                                <a href="javascript:void(0);" class="btn btn-md btn-indigo">Print</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-light mb-0">
                                        <div class="card-body">
                                            <span class="badge bg-dark fs-12 mb-2">Order ID : #666659</span>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Cashier :</span> admin</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Total :</span> $9100</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="fs-15 mb-1"><span class="fs-14 fw-bold text-gray-9">Customer :</span> Antonio</p>
                                                    <p class="fs-15"><span class="fs-14 fw-bold text-gray-9">Date :</span> 23 Dec 2024 13:39:11</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Orders -->

    <!-- Scan -->
    <div class="modal fade modal-default" id="scan-payment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                    <div class="success-wrap scan-wrap text-center">
                        <h5><span class="text-gray-6">Amount to Pay :</span> $150</h5>
                        <div class="scan-img">
                            <img src="images/scan-img.svg" alt="img">
                        </div>
                        <p class="mb-3">Scan your Phone or UPI App to Complete the payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Scan -->



    <!-- Order Tax -->
    <div class="modal fade modal-default" id="order-tax">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Tax</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Order Tax <span class="text-danger">*</span></label>
                            <select class="select" id="tax-select"> <!-- Added ID -->
                                <option value="0">No Tax</option>
                                <option value="5" selected>5%</option> <!-- Default 5% -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /Order Tax -->

    <!-- Shipping Cost -->
    <div class="modal fade modal-default" id="shipping-cost">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shipping Cost</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Shipping Cost <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Shipping Cost -->

    <!-- Coupon Code -->
    <div class="modal fade modal-default" id="coupon-code">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Coupon Code</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—</span>
                    </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Coupon Code <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select</option>
                                <option>NEWYEAR30</option>
                                <option>CHRISTMAS100</option>
                                <option>HALLOWEEN20</option>
                                <option>BLACKFRIDAY50</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Coupon Code -->

    <!-- Discount -->
    <div class="modal fade modal-default" id="discount">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Discount </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Value <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="discount-value-input">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /Discount -->





    <!-- Payment Cash -->
    <div class="modal fade modal-default" id="payment-cash">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalize Sale</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Bill Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
                                            <i class="ti ti-cash"></i>
                                        </span>
                                        <input type="text" class="form-control" id="bill-amount" value="0.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Recevied Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
                                            <i class="ti ti-cash"></i>
                                        </span>
                                        <input type="text" class="form-control" id="received-amount" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="change-item mb-3">
                                    <label class="form-label">Balance</label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
                                            <i class="ti ti-cash"></i>
                                        </span>
                                        <input type="text" class="form-control" id="balance-amount" value="0.00">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                    <select class="select select-payment">
                                        <option value="credit">Credit Card</option>
                                        <option value="cash" selected="">Cash</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="deposit">Deposit</option>
                                        <option value="points">Points</option>
                                    </select>
                                </div>
                                <div class="quick-cash payment-content bg-light  mb-3">
                                    <div class="d-flex align-items-center flex-wra gap-4">
                                        <h5 class="text-nowrap">Quick Cash</h5>
                                        <div class="d-flex align-items-center flex-wrap gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash1" checked="">
                                                <label class="btn btn-white" for="cash1">10</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash2">
                                                <label class="btn btn-white" for="cash2">20</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash3">
                                                <label class="btn btn-white" for="cash3">50</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash4">
                                                <label class="btn btn-white" for="cash4">100</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash5">
                                                <label class="btn btn-white" for="cash5">500</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash6">
                                                <label class="btn btn-white" for="cash6">1000</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="point-wrap payment-content mb-3">
                                    <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                        <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                        <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-md btn-primary" id="submitBtn">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Payment Cash  -->

    <!-- print modal -->
    <div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Receipt</h5>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">-->
                    <!--    <span aria-hidden="true">&times;</span>-->
                    <!--</button>-->
                </div>
                <div class="modal-body">
                    <div class="icon-head text-center">
                        <a href="javascript:void(0);">
                            <img src="{{ asset('assets/images/barLogo.jpg') }}" width="100" height="30" alt="Receipt Logo">
                        </a>
                    </div>
                    <div class="text-center info">
                        <h6>Ghaytah Restaurant 😊</h6>
                        <p class="mb-0">Phone Number: +971 50 740 2009</p>
                        <p class="mb-0">Address: <a href="">Iceroll Building , AI Qasimi Corniche Rd <br> RAK City Rass AI Khaimah - U.AE</a></p>
                    </div>
                    <div class="tax-invoice">
                        <h6 class="text-center">Invoice</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-user-name"><span>Tax: </span>100297087700003</div>

                                <div class="invoice-user-name" id="invoice_no"><span>Invoice No: </span>CS132453</div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-user-name"><span> </span><span id="invoice-date"></span></div>

                            </div>
                        </div>
                    </div>
                    <div class="section-divider"></div>
                    <table class="table-borderless w-100 table-fit">
                        <thead>
                            <tr>
                                <th># Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody id="receipt-items">
                            <!-- Cart items will be added dynamically here -->
                        </tbody>
                        <tr>
                            <td colspan="4">
                                <table class="table-borderless w-100 table-fit">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold">Subtotal</td>
                                            <td class="text-end" id="receipt-subtotal">AED0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Discount:</td>
                                            <td class="text-end text-danger" id="receipt-discount">-AED0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Tax (<span id="receipt-tax-percentage">5</span>%):</td>
                                            <td class="text-end" id="receipt-tax">AED0.00</td>
                                        </tr>



                                        <tr>
                                            <td class="fw-bold">Total Bill:</td>
                                            <td class="text-end fw-bold" id="receipt-total">AED0.00</td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="fw-bold">Received:</td>
                                            <td class="text-end fw-bold" id="receipt-received">AED0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold"> Balance:</td>
                                            <td class="text-end fw-bold" id="receipt-balance">AED0.00</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <div class="section-divider"></div>
                    <div class="text-center invoice-bar">
                        <div class="border-bottom border-dashed">
                            <p>**VAT against this challan is payable through central registration. Thank you for your business!</p>
                        </div>

                        <p>Thank You For Shopping With Us. Please Come Again</p>
                        <button onclick="printReceipt()" class="btn btn-md btn-primary">Print Receipt</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
            let orderItems = @json($orderItems);
            let order = @json($order);

            console.log(orderItems);
            console.log(order);

            // Check if there are items in the order
            if (orderItems.length > 0) {
                $(".empty-cart").hide();
                $(".product-list").show();
            } else {
                $(".empty-cart").show();
                $(".product-list").hide();
            }

            // Initialize totals
            let totalItems = 0;
            let subtotal = 0;

            // Clear cart items
            $("#cart-items").empty();

            // Loop through each item and append it to the cart
            orderItems.forEach(item => {
                totalItems += item.quantity;
                let price = parseFloat(item.product.product_selling_cost) || 0;
                let itemTotal = price * item.quantity;
                subtotal += itemTotal;

                let newRow = `
        <tr data-id="${item.product.id}">
            <td>
                <div class="d-flex align-items-center">
                    <a class="delete-icon" href="javascript:void(0);">
                        <i class="ti ti-trash-x-filled text-danger"></i>
                    </a>
                    <h6 class="fs-13 fw-normal">${item.product.name}</h6>
                </div>
            </td>
            <td>
                <div class="qty-item m-0">
                    <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center"><i class="ti ti-minus"></i></a>
                    <input type="text" class="form-control text-center qty" name="qty" value="${item.quantity}" data-price="${price.toFixed(2)}">
                    <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center"><i class="ti ti-plus"></i></a>
                </div>
            </td>
            <td class="fs-13 fw-semibold text-gray-9 text-end price">AED${itemTotal.toFixed(2)}</td>
        </tr>
        `;
                $("#cart-items").append(newRow);
            });

            // Update total items count
            $(".badge span.text-teal").text(totalItems);

            // Calculate payment summary
            let tax = parseFloat(order.tax) || 0;
            let discount = parseFloat(order.discount) || 0;

            // Calculate tax amount
            let taxAmount = (subtotal * tax) / 100;

            // Calculate total payable including tax
            let totalPayable = subtotal + taxAmount - discount;

            // Fill payment summary in the order section
            $("#tax-value").text(`${tax}%`);
            $("#discount-value").text(`AED${discount.toFixed(2)}`);
            $(".fw-bold.text-end").text(`AED${totalPayable.toFixed(2)}`);

            // Function to round to the nearest 5
            $(".select-product").on("click", function() {
                let productId = $(this).data("id");
                let productName = $(this).data("name");
                let productPrice = parseFloat($(this).data("price")); // Convert price to float

                let existingRow = $("#cart-items tr[data-id='" + productId + "']");
                if (existingRow.length > 0) {
                    let qtyInput = existingRow.find(".qty");
                    let currentQty = parseInt(qtyInput.val());
                    qtyInput.val(currentQty + 1);
                    updatePrice(existingRow, productPrice);
                } else {
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
                            <input type="text" class="form-control text-center qty" name="qty" value="1" data-price="${productPrice.toFixed(2)}">
                            <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center"><i class="ti ti-plus"></i></a>
                        </div>
                    </td>
                    <td class="fs-13 fw-semibold text-gray-9 text-end price">AED${productPrice.toFixed(2)}</td>
                </tr>
            `;
                    $("#cart-items").append(newRow);
                }
                calculateTotal();
            });

            // Function to update price when quantity changes
            function updatePrice(row, price) {
                let qty = parseInt(row.find(".qty").val());
                let totalPrice = price * qty;
                row.find(".price").text(`AED${totalPrice.toFixed(2)}`);
                calculateTotal();
            }

            // Decrease quantity
            $(document).on("click", ".dec", function() {
                let row = $(this).closest("tr");
                let qtyInput = row.find(".qty");
                let currentQty = parseInt(qtyInput.val());
                let price = parseFloat(qtyInput.data("price"));

                if (currentQty > 1) {
                    qtyInput.val(currentQty - 1);
                    updatePrice(row, price);
                } else {
                    row.remove();
                    calculateTotal();
                }
            });

            // Increase quantity
            $(document).on("click", ".inc", function() {
                let row = $(this).closest("tr");
                let qtyInput = row.find(".qty");
                let currentQty = parseInt(qtyInput.val());
                let price = parseFloat(qtyInput.data("price"));

                qtyInput.val(currentQty + 1);
                updatePrice(row, price);
            });

            // Remove item from cart
            $(document).on("click", ".delete-icon", function() {
                $(this).closest("tr").remove();
                calculateTotal();
            });

            // Function to calculate total price
            function calculateTotal() {
                let subtotal = 0;
                $("#cart-items tr").each(function() {
                    let price = parseFloat($(this).find(".price").text().replace("AED", ""));
                    subtotal += price;
                });
                $(".fw-bold.text-end").text(`AED${subtotal.toFixed(2)}`);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            let taxPercentage = 0; // Default tax percentage
            let discountAmount = 0; // Default discount value

            function calculateTotal() {
                let subtotal = 0;

                // Calculate subtotal by summing all item prices
                $("#cart-items tr").each(function() {
                    let price = parseFloat($(this).find(".price").text().replace("AED", "")) || 0;
                    subtotal += price;
                });

                // Calculate tax amount
                let taxAmount = (subtotal * taxPercentage) / 100;

                // Calculate total payable amount
                let totalPayable = subtotal + taxAmount - discountAmount;
                if (totalPayable < 0) totalPayable = 0; // Prevent negative values

                // Update the UI
                $("#tax-value").text(`${taxPercentage}%`);
                $("#discount-value").text(`AED${discountAmount.toFixed(2)}`);
                $("#total-payable").text(`AED${totalPayable.toFixed(2)}`);
            }

            // Listen for the discount form submission
            $("#discount .btn-primary").on("click", function(e) {
                e.preventDefault(); // Prevent form submission

                let discountInput = parseFloat($("#discount-value-input").val()) || 0;

                if (discountInput < 0) {
                    alert("Discount cannot be negative!");
                    return;
                }

                discountAmount = discountInput;

                // Update discount in the payment summary and recalculate total
                $("#discount-value").text(`AED${discountAmount.toFixed(2)}`);
                calculateTotal();

                // Close the modal
                $("#discount").modal("hide");
            });

            // Initialize total calculation
            calculateTotal();
        });
    </script>


    <!-- cash -->
    <script>
        $(document).ready(function() {
            function roundToNearestFive(amount) {
                return Math.ceil(amount / 5) * 5;
            }

            function generateQuickCashButtons(amount) {
                let quickCashContainer = $(".quick-cash .d-flex.align-items-center.flex-wrap.gap-3");
                quickCashContainer.empty();

                let roundedAmount = Math.ceil(amount / 5) * 5;
                let values = [amount, roundedAmount, roundedAmount + 5, roundedAmount + 10, roundedAmount + 50, roundedAmount + 100];

                values.forEach((val, index) => {
                    let checked = index === 0 ? "checked" : "";
                    let button = `
            <div class="form-check">
                <input type="radio" class="btn-check quick-cash-option" name="cash" id="cash${index}" value="${val}" ${checked}>
                <label class="btn btn-white" for="cash${index}">${val}</label>
            </div>`;
                    quickCashContainer.append(button);
                });
            }

            function updateBalance() {
                let billAmount = parseFloat($("#bill-amount").val()) || 0;
                let receivedAmount = parseFloat($("#received-amount").val()) || 0;
                let balance = receivedAmount - billAmount;
                $("#balance-amount").val(balance.toFixed(2));
            }

            // Show the modal with updated bill amount and quick cash options
            $(".payment-item").on("click", function() {
                let totalPayable = parseFloat($("#total-payable").text().replace("AED", "")) || 0;
                $("#bill-amount").val(totalPayable.toFixed(2));

                generateQuickCashButtons(totalPayable);
                updateBalance();
            });

            // Update received amount when quick cash is selected
            $(document).on("change", ".quick-cash-option", function() {
                let selectedAmount = parseFloat($(this).val()) || 0;
                $("#received-amount").val(selectedAmount.toFixed(2));
                updateBalance();
            });

            // Update balance dynamically when typing in received amount
            $("#received-amount").on("input", function() {
                updateBalance();
            });

            // On Confirm Payment
            $("#submitBtn").on("click", function() {
                let totalPayable = parseFloat($("#bill-amount").val()) || 0;
                let receivedAmount = parseFloat($("#received-amount").val()) || 0;

                if (receivedAmount < totalPayable) {
                    alert("Received amount is less than total payable!");
                    return;
                }

                //alert("Payment successful!");
                $("#payment-cash").modal("hide");
            });
        });
    </script>


    <!-- print -->
    <!-- <script>
    $(document).ready(function() {
        $("#submitBtn").on("click", function() {
            // Get the order details
            let subtotal = parseFloat($("#total-payable").text().replace("AED", "")) || 0;
            let discount = parseFloat($("#discount-value").text().replace("AED", "")) || 0;
            let taxPercentage = parseFloat($("#tax-value").text().replace("%", "")) || 0;
            let taxAmount = (subtotal * taxPercentage) / 100;
            let totalBill = subtotal + taxAmount - discount;
            let receivedAmount = parseFloat($("#received-amount").val()) || 0;
            let balance = receivedAmount - totalBill;

            // Populate the receipt table with cart items
            let receiptItems = $("#receipt-items");
            receiptItems.empty();

            $("#cart-items tr").each(function(index) {
                let itemName = $(this).find("h6").text();
                let price = $(this).find(".qty").data("price");
                let quantity = $(this).find(".qty").val();
                let total = $(this).find(".price").text().replace("AED", "");

                let newRow = `
                <tr>
                    <td>${itemName}</td>
                    <td>AED${parseFloat(price).toFixed(2)}</td>
                    <td>${quantity}</td>
                    <td class="text-end">AED${parseFloat(total).toFixed(2)}</td>
                </tr>
            `;
                receiptItems.append(newRow);
            });

            // Populate summary details
            $("#receipt-subtotal").text(`AED${subtotal.toFixed(2)}`);
            $("#receipt-discount").text(`-AED${discount.toFixed(2)}`);
            $("#receipt-tax-percentage").text(taxPercentage);
            $("#receipt-tax").text(`AED${taxAmount.toFixed(2)}`);
            $("#receipt-total").text(`AED${totalBill.toFixed(2)}`);
            $("#receipt-received").text(`AED${receivedAmount.toFixed(2)}`);
            $("#receipt-balance").text(`AED${balance.toFixed(2)}`);

            // Set the invoice date
            let today = new Date().toLocaleDateString();
            $("#invoice-date").text(today);

            // Show the receipt modal
            $("#print-receipt").modal("show");
        });

        // Print the receipt and update order status
        window.printReceipt = function() {
            // Get order IDs from the URL
            let orderIds = window.location.pathname.split("/").pop();

            // Update the order status via AJAX
            $.ajax({
                url: `/billing/update-status/${orderIds}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log("Order status updated to billed:", response);
                },
                error: function(xhr, status, error) {
                    console.error("Error updating order status:", error);
                }
            });

            // Print the receipt
            let printContent = document.getElementById("print-receipt").innerHTML;
            let originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            window.location.href = "{{ route('bills.order_list') }}";
        };
    });
</script> -->

    <script>
        $(document).ready(function() {
            let printType = "";

            $("#submitBtn, #printBtnBeforePayment").on("click", function() {
                printType = $(this).attr("id") === "printBtnBeforePayment" ? "beforePayment" : "afterPayment";

                let subtotal = parseFloat($("#total-payable").text().replace("£", "")) || 0;
                let discount = parseFloat($("#discount-value").text().replace("£", "")) || 0;
                let taxPercentage = parseFloat($("#tax-value").text().replace("%", "")) || 0;
                let taxAmount = (subtotal * taxPercentage) / 100;
                let totalBill = subtotal + taxAmount - discount;
                let receivedAmount = parseFloat($("#received-amount").val()) || 0;
                let balance = receivedAmount - totalBill;

                let receiptItems = $("#receipt-items");
                receiptItems.empty();

                $("#cart-items tr").each(function() {
                    let itemName = $(this).find("h6").text();
                    let price = $(this).find(".qty").data("price");
                    let quantity = $(this).find(".qty").val();
                    let total = $(this).find(".price").text().replace("£", "");

                    receiptItems.append(`
                    <tr>
                        <td>${itemName}</td>
                        <td>£${parseFloat(price).toFixed(2)}</td>
                        <td>${quantity}</td>
                        <td class="text-end">£${parseFloat(total).toFixed(2)}</td>
                    </tr>
                `);
                });

                $("#receipt-subtotal").text(`£${subtotal.toFixed(2)}`);
                $("#receipt-discount").text(`-£${discount.toFixed(2)}`);
                $("#receipt-tax-percentage").text(taxPercentage);
                $("#receipt-tax").text(`£${taxAmount.toFixed(2)}`);
                $("#receipt-total").text(`£${totalBill.toFixed(2)}`);

                if (printType === "beforePayment") {
                    $("#receipt-received").text(`£0.00`);
                    $("#receipt-balance").text(`£0.00`);
                } else {
                    $("#receipt-received").text(`£${receivedAmount.toFixed(2)}`);
                    $("#receipt-balance").text(`£${balance.toFixed(2)}`);
                }

                let today = new Date().toLocaleDateString();
                $("#invoice-date").text(today);

                // CALL print immediately after data is prepared
                printReceipt();
            });

            function printReceipt() {
                const receiptContent = document.getElementById("print-receipt").innerHTML;

                const printWindow = window.open("", "PrintWindow", "width=400,height=600");

                printWindow.document.open();
                printWindow.document.write(`
                <html>
                <head>
                    <title>Print Receipt</title>
                    <style>
                        @media print {
                            @page { size: 58mm auto; margin: 0; }
                            body { width: 58mm; font-size: 12px; font-family: Arial, sans-serif; }
                            .table-borderless th, .table-borderless td { font-size: 12px; padding: 2px; border-bottom: 1px dashed #000; }
                            .invoice-bar { font-size: 10px; margin-top: 1px; }
                            button { display: none; }
                        }
                    </style>
                </head>
                <body onload="window.print(); window.close();">
                    ${receiptContent}
                </body>
                </html>
            `);
                printWindow.document.close();

                // Update status if it's after payment
                if (printType === "afterPayment") {
                    let orderIds = window.location.pathname.split("/").pop();
                    $.post(`https://billingmark.com/cafe/public/billing/update-status/${orderIds}`, {
                        _token: '{{ csrf_token() }}'
                    }).done(function() {
                        window.location.href = "{{ route('bills.order_list') }}";
                    }).fail(function(err) {
                        console.error("Update error", err);
                    });
                } else {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            }
        });
    </script>

    <script>
        function generateRandomInvoiceNo() {
            const prefix = "CS";
            const randomNumber = Math.floor(100000 + Math.random() * 900000); // 6-digit number
            return prefix + randomNumber;
        }

        const invoiceNo = generateRandomInvoiceNo();
        document.getElementById("invoice_no").innerHTML = `<span>Invoice No: </span>${invoiceNo}`;
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