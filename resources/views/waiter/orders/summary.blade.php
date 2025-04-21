<!DOCTYPE html>
<html>

<head>
    <!-- TABLES CSS CODE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>POS</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://billing.creatantech.com/theme/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/css/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/select2/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/FixedHeader-3.1.4/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/FixedHeader-3.1.4/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/css/buttons.bootstrap.min.css">
    <!-- end -->
    <!-- Theme style -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/dist/css/newcustom.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap date-range-picker -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/datepicker/datepicker3.css">
    <!--Toastr notification -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/toastr/toastr.css">
    <!--Toastr notification end-->
    <!-- iCheck -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/iCheck/square/orange.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--Custom Css File-->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/dist/css/custom.css">
    <!-- <link rel="stylesheet" href="https://billing.creatantech.com/theme/dist/css/sidebar.css"> -->

    <!-- Autocomplete -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/autocomplete/autocomplete.css">
    <!-- Pace Loader -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/pace/pace.min.css">
    <!-- Theme color finder -->
    <script type="text/javascript">
        var theme_skin = 'skin-blue';
        var sidebar_collapse = 'skin-blue';
    </script>
    <!-- jQuery 2.2.3 -->
    <script src="https://billing.creatantech.com/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- iCheck -->
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://billing.creatantech.com/theme/css/pos.css">
    <style>
        @media print {
            @page {
                size: 58mm auto;
                /* Adjust for 58mm or 80mm printers */
                margin: 0;
                /* Remove browser margins */
            }

            body {
                width: 58mm;
                font-size: 12px;
                font-family: 'Courier New', monospace;
                text-align: center;
                margin: 0;
                padding: 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                font-size: 12px;
                padding: 2px 0;
            }

            .cs-border {
                border-top: 1px dashed #000;
                margin-top: 5px;
                margin-bottom: 5px;
            }

            img {
                max-width: 100px;
                display: block;
                margin: auto;
            }
        }
    </style>
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">


        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ route('admin.dashboard') }}" class="navbar-brand" title="Go to Dashboard!"><b class="hidden-xs">Home</b><b class="hidden-lg">POS</b></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class=""><a href="{{ route('sales.index') }}" title="View Sales List!"><i class="fa fa-list text-yellow"></i> <span>Sales List</span></a></li>

                            <li class=""><a href="#" title="View Customers List"><i class="fa  fa-group  text-yellow "></i> <span>Customers List</span></a></li>
                            <li class=""><a href="{{ route('product.index') }}" title="View Items List"><i class="fa  fa-cubes text-yellow "></i> <span>Items List</span></a></li>
                            <!-- <li class=""><a href="#" title="Create New POS Invoice"><i class="fa fa-calculator text-yellow "></i> <span>New Invoice</span></a></li> -->
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">




                            <!-- Messages: style can be found in dropdown.less-->
                            <!-- <li class="hidden-xs" id="fullscreen"><a title="Fullscreen On/Off"><i class="fa fa-tv text-white"></i> </a></li> -->
                            <li class="text-center" id="">
                                <a title="Dashboard" href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard text-yellow"></i><b class="hidden-xs">Dashboard</b></a>
                            </li>

                            <!-- User Account Menu -->

                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>

        @if(session()->has('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        </script>
        @endif


        <!-- **********************MODALS***************** -->
        <div class="modal fade " id="customer-modal" tabindex='-1'>
            <form action="{{ route('add.customer') }}" id="customer-form" method="POST">
                @csrf <!-- Laravel CSRF Token for security -->

                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header header-custom">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <label aria-hidden="true">&times;</label>
                            </button>
                            <h4 class="modal-title text-center">Add Customer</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="customer_name">Customer Name*</label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="tel" class="form-control" id="mobile" name="mobile" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" maxlength="10" class="form-control" id="phone" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="gstin">GST Number</label>
                                            <input type="text" class="form-control" id="gstin" name="gstin">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="tax_number">TAX Number</label>
                                            <input type="text" class="form-control" id="tax_number" name="tax_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="credit_limit">Credit Limit</label>
                                            <input type="number" class="form-control" id="credit_limit" name="credit_limit" value="-1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="opening_balance">Previous Due</label>
                                            <input type="number" class="form-control" id="opening_balance" name="opening_balance">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.modal -->
        <div class="sales_item_modal">
            <div class="modal fade in" id="sales_item" tabindex='-1'>
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header header-custom">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title text-center">Manage Sales Item</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row invoice-info">
                                        <div class="col-md-12">
                                            <div class="col-sm-6 invoice-col">
                                                <b>Item Name : </b> <span id='popup_item_name'><span>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <div class="col-md-12">
                                    <div>

                                        <div class="col-md-12 ">
                                            <div class="box box-solid bg-gray">
                                                <div class="box-body">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="popup_tax_type">Tax Type</label>
                                                                <select class="form-control select2" id="popup_tax_type" name="popup_tax_id" style="width: 100%;">
                                                                    <option value="Exclusive">Exclusive</option>
                                                                    <option value="Inclusive">Inclusive</option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="popup_tax_id">Tax</label>
                                                                <select class="form-control select2" id="popup_tax_id" name="popup_tax_id" style="width: 100%;">
                                                                    <option value="">-Select-</option>
                                                                    <option data-tax='0.0000' data-tax-value='Tax 0%' value='144'>Tax 0%</option>
                                                                    <option data-tax='5.0000' data-tax-value='Tax 5%' value='145'>Tax 5%</option>
                                                                    <option data-tax='9.0000' data-tax-value='Tax 9%' value='146'>Tax 9%</option>
                                                                    <option data-tax='18.0000' data-tax-value='GST 18%' value='147'>GST 18%</option>
                                                                    <option data-tax='14.0000' data-tax-value='Tax 14%' value='148'>Tax 14%</option>
                                                                </select>
                                                            </div>

                                                        </div>



                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="item_discount_type">Discount Type</label>
                                                                <select class="form-control" id="item_discount_type" name="item_discount_type" style="width: 100%;">
                                                                    <option value='Percentage'>Percentage(%)</option>
                                                                    <option value='Fixed'>Fixed($)</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="item_discount_input">Discount</label>
                                                                <input type="text" class="form-control only_currency" id="item_discount_input" name="item_discount_input" placeholder="" value="0" onkeyup="click_this(event,'.set_options')">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="popup_tax_type">Description</label>
                                                                <textarea type="text" class="form-control" id="popup_description" placeholder=""></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- col-md-12 -->
                                    </div>
                                </div>
                                <!-- col-md-9 -->
                                <!-- RIGHT HAND -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="popup_row_id">
                            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                            <button type="button" onclick="set_info()" class="btn bg-green btn-lg place_order btn-lg set_options">Set<i class="fa  fa-check "></i></button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>

        <!-- /.modal -->
        <div class="modal fade " id="item-or-service" tabindex='-1'>

            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header header-custom">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">What you wanted to add ?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <button type="button" title="Click to Add New Item" class="btn bg-purple col-md-12 show_item_modal"><i class="fa fa-plus"></i> Item</button>
                                        <br>
                                        <br>
                                        <button type="button" title="Click to Add New Service" class="btn bg-purple col-md-12 show_service_modal"><i class="fa fa-plus"></i> Service</button>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->

        </div>
        <!-- /.modal -->


        <!-- **********************MODALS END***************** -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form class="form-horizontal" id="pos-form">
                            <div class="box-header with-border" style="padding-bottom: 0px;">
                                <div class="row">
                                    <div class="col-md-12">



                                    </div>
                                </div>




                            </div>
                            <!-- /.box-header -->

                            <input type="hidden" name="csrf_test_name" value="b2f42fe440779a6337bd5ba655d8f0ba">
                            <input type="hidden" value='0' id="hidden_rowcount" name="hidden_rowcount">
                            <input type="hidden" value='' id="hidden_invoice_id" name="hidden_invoice_id">
                            <input type="hidden" id="base_url" value="https://billing.creatantech.com/">
                            <input type="hidden" class="scroll_or_not" value="true">


                            <input type="hidden" value='' id="walk_in_customer_name" value="Walk-in customer">

                            <!-- **********************MODALS***************** -->
                            <div class="modal fade" id="multiple-payments-modal" tabindex='-1'>

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header header-custom">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center">Payments</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <!-- LEFT HAND -->
                                                <div class="col-md-8">
                                                    <div class="box box-solid bg-default">

                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <span for="">
                                                                        <label>
                                                                            Advance : <label class="customer_tot_advance">0.00</label>
                                                                        </label>
                                                                    </span>
                                                                    <div class="checkbox">
                                                                        <label id="click_to_uncheck">
                                                                            <input type="checkbox" id="allow_tot_advance" name="allow_tot_advance"> Adjust Advance Payment </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8">
                                                                    <span for="">
                                                                        <label>
                                                                            Discount Coupon Code </label>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="">
                                                                    <label class="control-label pull-left">Coupon Type:<span class="coupon_type">---</span></label>
                                                                    <label class="control-label pull-right">Coupon Value:<span class="coupon_value">0.00</span></label>
                                                                </div>

                                                                <div class="col-md-8 col-md-offset-4 div1 hide">
                                                                    <div class="alert text-left msg_color">
                                                                        <strong id="coupon_code_msg">
                                                                        </strong>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div>

                                                        <input type="hidden" name="payment_row_count" id='payment_row_count' value="1">


                                                        <div class="col-md-12  payments_div">




                                                            <div class="box box-solid bg-gray">
                                                                <div class="box-body">
                                                                    <div class="row">


                                                                        <div class="col-md-6">
                                                                            <div class="">
                                                                                <label for="amount_1">Amount</label>
                                                                                <input type="text" class="form-control text-right payment" id="amount_1" name="amount_1" placeholder="" onkeyup="calculate_payments()">
                                                                                <span id="amount_1_msg" style="display:none" class="text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="">
                                                                                <label for="payment_type_1">Payment Type</label>
                                                                                <select class="form-control" id='payment_type_1' name="payment_type_1">
                                                                                    <option value='Cash'>Cash</option>
                                                                                    <option value='Cheque'>Cheque</option>
                                                                                </select>
                                                                                <span id="payment_type_1_msg" style="display:none" class="text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="">
                                                                                <label for="account_id_1">Account</label>
                                                                                <select class="form-control" id='account_id_1' name="account_id_1">
                                                                                    <option value="">-Select-</option>
                                                                                    <optgroup class="bg-yellow" label="Office Account">
                                                                                        <option data-account-name='Office Account' value='2'>Office Account</option>
                                                                                    </optgroup>
                                                                                    <option data-account-name='Expense Account' value='3'>--Expense Account</option>
                                                                                    <optgroup class="bg-yellow" label="Revenue accounts">
                                                                                        <option data-account-name='Revenue accounts' value='4'>Revenue accounts</option>
                                                                                    </optgroup>
                                                                                    <optgroup class="bg-yellow" label="Asset accounts">
                                                                                        <option data-account-name='Asset accounts' value='5'>Asset accounts</option>
                                                                                    </optgroup>
                                                                                    <option data-account-name='Bank Account' value='6'>--Bank Account</option>
                                                                                    <option selected data-account-name='Cash' value='1'>--Cash</option>
                                                                                </select>
                                                                                <span id="account_id_1_msg" style="display:none" class="text-danger"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="">
                                                                                <label for="payment_note_1">Payment Note</label>
                                                                                <textarea type="text" class="form-control" id="payment_note_1" name="payment_note_1" placeholder=""></textarea>
                                                                                <span id="payment_note_1_msg" style="display:none" class="text-danger"></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- col-md-12 -->

                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-primary btn-block" id="add_payment_row">Add Payment Row</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <div class="">
                                                                        <label for="sales_note">Note</label>
                                                                        <textarea type="text" class="form-control" id="sales_note" name="sales_note" placeholder=""></textarea>
                                                                        <span id="sales_note_msg" style="display:none" class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- col-md-9 -->


                                                <!-- RIGHT HAND -->
                                                <div class="col-md-4">




                                                    <div class="col-md-12">

                                                        <div class="box box-solid bg-blue">
                                                            <div class="box-body">
                                                                <div class="row ">
                                                                    <div class="col-md-12 border-custom-bottom">
                                                                        <span class="col-md-6 text-right text-bold ">Total Items:</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_qty">0.00</span>
                                                                    </div>
                                                                </div>

                                                                <div class="row ">
                                                                    <div class="col-md-12 border-custom-bottom">
                                                                        <span class="col-md-6 text-right text-bold ">Total:</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_amt">0.00</span>
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                                <div class="row ">
                                                                    <div class="col-md-12 border-custom-bottom">
                                                                        <span class="col-md-6 text-right text-bold ">Discount(-):</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_discount">0.00</span>
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                                <div class="row ">
                                                                    <div class="col-md-12 border-custom-bottom">
                                                                        <span class="col-md-6 text-right text-bold ">Coupon Discount(-):</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size coupon_discount_div_amt">0.00</span>
                                                                        <input type="hidden" name="coupon_discount_amt" id='coupon_discount_amt' value="0">
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                                <div class="row bg-red">
                                                                    <div class="col-md-12 border-custom-bottom">
                                                                        <span class="col-md-6 text-right text-bold ">Total Payable:</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_payble">0.00</span>
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                                <div class="row ">
                                                                    <div class="col-md-12 border-custom-bottom">
                                                                        <span class="col-md-6 text-right text-bold ">Total Paying:</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_paid">0.00</span>
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                                <!--  -->
                                                                <div class="row ">
                                                                    <div class="col-md-12 border-custom-bottom">
                                                                        <span class="col-md-6 text-right text-bold ">Balance:</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_balance">0.00</span>
                                                                    </div>
                                                                </div>
                                                                <!--  -->
                                                                <div class="row ">
                                                                    <div class="col-md-12 bg-orange">
                                                                        <span class="col-md-6 text-right text-bold ">Change Return:</span>
                                                                        <span class="col-md-6 text-right text-bold  custom-font-size sales_div_change_return">0.00</span>
                                                                    </div>
                                                                </div>
                                                                <!--  -->

                                                            </div>
                                                            <!-- /.box-body -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn bg-maroon btn-lg make_sale btn-lg" onclick="save()"><i class="fa  fa-save "></i> Save</button>
                                            <button type="button" class="btn btn-success btn-lg make_sale btn-lg" onclick="save(true)"><i class="fa  fa-print "></i> Save & Print</button>

                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- **********************MODALS***************** -->
                            <div class="modal fade" id="terms-modal" tabindex='-1'>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Terms & Conditions</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="box-body">
                                                        <div class="form-group">

                                                            <textarea class="form-control" id="invoice_terms" name="invoice_terms" placeholder="Enter Invoice Terms and Conditions"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- **********************MODALS END***************** -->
                            <!-- **********************MODALS END***************** -->
                            <!-- **********************MODALS***************** -->
                            <div class="modal fade" id="discount-modal" tabindex='-1'>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Set Discount</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="discount_input">Discount</label>
                                                            <input type="text" class="form-control" id="discount_input" name="discount_input" placeholder="" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="discount_type">Discount Type</label>
                                                            <select class="form-control" id='discount_type' name="discount_type">
                                                                <!-- <option value='in_percentage'>Per%</option> -->
                                                                <option value='in_fixed'>Fixed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary discount_update">Update</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- **********************MODALS END***************** -->
                            <div class="box-body">
                                <!-- Store Code -->
                                <input type='hidden' name='store_id' id='store_id' value='2'> <!-- Store Code end -->


                                <div class="row">
                                    <!-- <div class="col-md-6">
                                        <div class="input-group" data-toggle="tooltip" title="Warehouse">
                                            <span class="input-group-addon"><i class="fa fa-building text-red"></i></span>
                                            <select class="form-control select2" id="warehouse_id" name="warehouse_id" style="width: 100%;">
                                                <option value='2'>System Warehouse</option>
                                                <option value='86'>Warehouse 2</option>
                                            </select>

                                        </div>

                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="input-group" data-toggle="tooltip" title="Customer">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <select class="form-control select2" id="customer_id" name="customer_id" style="width: 100%;">
                                                <option value="">Search Customer</option>
                                            </select>
                                            <span class="input-group-addon pointer" data-toggle="modal" data-target="#customer-modal" title="New Customer?">
                                                <i class="fa fa-user-plus text-primary fa-lg"></i>
                                            </span>
                                        </div>
                                        <span class="customer_points text-success" style="display: none;"></span>
                                        <lable>Previous Due :<label class="customer_previous_due text-red" style="font-size: 18px;">0.00</label></lable>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group" data-toggle="tooltip" title="Invoice Initial Code">
                                            <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
                                            <input type="text" class="form-control" placeholder="Invioce Initial Code" id="init_code" name="init_code" value="SL/2021/02/">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                        <input type="text" class="form-control" data-toggle="tooltip" title="Invoice Count ID" placeholder="Invioce Number" id="count_id" name="count_id" value="10">
                                    </div> -->

                                </div><!-- row end -->

                                <br>


                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="input-group" data-toggle="tooltip" title="Select Items">
                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                            <input type="text" class="form-control" placeholder="Item name/Barcode/Itemcode" id="item_search">
                                            <span class="input-group-addon pointer show_item_service" title="New Item?"><i class="fa fa-plus text-primary fa-lg"></i></span>
                                        </div>
                                    </div>
                                </div><!-- row end -->
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12" style="overflow-y:auto;height: 300px;border:1px solid #337ab7;">
                                                <table class="table table-condensed table-bordered  table-responsive items_table" style="">
                                                    <thead class="bg-gray">

                                                        <th width="5%">Sl No</th>
                                                        <th width="20%">Bar Code</th>
                                                        <th width="30%">Item Name</th>
                                                        <th width="15%">Unit</th>
                                                        <th width="15%">Quantity</th>
                                                        <th width="15%">Price</th>
                                                        <th width="10%">Vat</th>
                                                        <th width="15%">Subtotal</th>
                                                        <th width="5%"><i class="fa fa-close"></i></th>
                                                    </thead>
                                                    <tbody id="pos-form-tbody" style="font-size: 16px;font-weight: bold;overflow: scroll;">
                                                        <!-- body code -->
                                                    </tbody>
                                                    <tfoot>
                                                        <!-- footer code -->
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer bg-gray">
                                <div class="row">
                                    <div class="col-md-3 text-right">
                                        <label> Quantity:</label><br>
                                        <span class="text-bold tot_qty"></span>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <label>Total Amount:</label><br>
                                        $ <span style="font-size: 19px;" class="tot_amt text-bold"></span>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <label>Total Discount:<a class="fa fa-pencil-square-o cursor-pointer" data-toggle="modal" data-target="#discount-modal"></a></label><br>
                                        $ <span style="font-size: 19px;" class="tot_disc text-bold"></span>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <label>Grand Total:</label><br>
                                        $ <span style="font-size: 19px;" class="tot_grand text-bold"></span>
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-md-12 text-right">

                                        <div class="col-sm-3">
                                            <button type="button" id="clear" name="" class="btn bg-maroon btn-block btn-flat btn-lg btnhold" title="Hold Invoice [Alt+H]" style="">
                                                <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                                                Clear
                                            </button>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-primary btnhold btn-block btn-flat btn-lg show_payments_modal"
                                                title="Multiple Payments [Alt+M]" onclick="handlePayment('Credit')">
                                                <i class="fa fa-money" aria-hidden="true"></i> Credit
                                            </button>
                                        </div>

                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-success btnhold btn-block btn-flat btn-lg"
                                                title="By Cash & Save [Alt+C]" onclick="handlePayment('Cash')">
                                                <i class="fa fa-money" aria-hidden="true"></i> Cash
                                            </button>
                                        </div>

                                        <div class="col-sm-3">
                                            <button type="button" class="btn bg-purple btnhold btn-block btn-flat btn-lg"
                                                title="By Card & Save [Alt+A]" onclick="handlePayment('Card')">
                                                <i class="fa fa-credit-card" aria-hidden="true"></i> Card
                                            </button>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Billing Book -v3.1</b>
        </div>
        <strong>Copyright &copy; 2025 All rights reserved.</strong>
    </footer>
    <!-- Control Sidebar -->

    </div>
    <!-- ./wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">
        var failed_sound = document.getElementById("failed");
        var success_sound = document.getElementById("success");
    </script>

    <script type="text/javascript">
    </script>
    <!-- Notification end --><!-- GENERAL CODE -->
    <script>
        var base_url = 'https://billing.creatantech.com/';
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="https://billing.creatantech.com/theme/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/FixedHeader-3.1.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Responsive-2.2.2/js/responsive.bootstrap.min.js"></script>
    <!-- end -->
    <!--  FOR EXPORT BUTTONS START -->
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/JSZip-2.5.0/jszip.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/dataTables.buttons.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.flash.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.html5.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.print.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.colVis.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/DataTables-1.10.18/extensions/Buttons-1.5.4/js/buttons.bootstrap.min.js"></script>
    <!--  FOR EXPORT BUTTONS END -->

    <!-- SlimScroll -->
    <script src="https://billing.creatantech.com/theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="https://billing.creatantech.com/theme/plugins/fastclick/fastclick.js"></script>
    <!-- Shortcut Keys -->
    <script src="https://billing.creatantech.com/theme/plugins/shortcuts/shortcuts.js"></script>
    <!-- Select2 -->
    <script src="https://billing.creatantech.com/theme/plugins/select2/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script>
        var AdminLTEOptions = {
            /*https://adminlte.io/themes/AdminLTE/documentation/index.html*/
            sidebarExpandOnHover: true,
            navbarMenuHeight: "200px", //The height of the inner menu
            animationSpeed: 250,
        };
    </script>
    <script src="https://billing.creatantech.com/theme/dist/js/app.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="https://billing.creatantech.com/theme/dist/js/demo.js"></script> -->
    <!-- page script -->
    <!--Toastr notification -->
    <script src="https://billing.creatantech.com/theme/toastr/toastr.js"></script>
    <script src="https://billing.creatantech.com/theme/toastr/toastr_custom.js"></script>
    <!--Toastr notification end-->
    <!-- bootstrap datepicker -->
    <script src="https://billing.creatantech.com/theme/plugins/daterangepicker/moment.min.js"></script>
    <script src="https://billing.creatantech.com/theme/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="https://billing.creatantech.com/theme/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Autocomplete -->
    <script src="https://billing.creatantech.com/theme/plugins/autocomplete/autocomplete.js"></script>
    <!-- Custom JS -->
    <script src="https://billing.creatantech.com/theme/js/special_char_check.js"></script>
    <script src="https://billing.creatantech.com/theme/js/custom.js"></script>

    <!-- Pace Loader -->
    <script src="https://billing.creatantech.com/theme/plugins/pace/pace.min.js"></script>
    <script type="text/javascript">
        $(document).ajaxStart(function() {
            Pace.restart();
        });
    </script>
    <!-- Sweet alert -->
    <script src="https://billing.creatantech.com/theme/js/sweetalert.min.js"></script>


    <!-- iCheck -->
    <script src="https://billing.creatantech.com/theme/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customer_id').select2({
                placeholder: 'Search by Name or Mobile',
                ajax: {
                    url: '{{ route("search.customers") }}', // Route to fetch customers
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            query: params.term // Search query (customer_name or mobile)
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.customer_name + ' - ' + item.mobile + ''
                                };
                            })
                        };
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let barcodeQueue = [];
            let processing = false;
            let storedProducts = JSON.parse(localStorage.getItem("scannedProducts")) || [];
            let discountAmount = 0; // Initialize discount

            storedProducts.forEach(product => addToTable(product, product.quantity));

            $('#item_search').on('keypress', function(event) {
                if (event.which === 13) { // Enter key press
                    event.preventDefault();
                    let searchTerm = $(this).val().trim();
                    if (searchTerm !== '') {
                        fetchProducts(searchTerm);
                        $(this).val('');
                    }
                }
            });

            function fetchProducts(searchTerm) {
                $.ajax({
                    url: '{{ route("get.products.by.barcodes") }}',
                    method: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        if (response.success && response.products.length > 0) {
                            response.products.forEach(product => addToTable(product, 1));
                        } else {
                            alert('Product not found!');
                        }
                    },
                    error: function() {
                        alert('Error fetching products!');
                    }
                });
            }

            function addToTable(product, scannedQty) {
                let existingRow = $("#pos-form-tbody").find(`tr[data-barcode="${product.barcode}"]`);

                if (existingRow.length > 0) {
                    let qtyInput = existingRow.find('.qty');
                    let newQty = parseInt(qtyInput.val()) + scannedQty;
                    qtyInput.val(newQty);
                    updateSubtotal(qtyInput);
                } else {
                    let taxRate = 0.05; // 5% tax
                    let taxAmount = (product.product_selling_cost * scannedQty * taxRate).toFixed(2);
                    let subtotal = (product.product_selling_cost * scannedQty + parseFloat(taxAmount)).toFixed(2);
                    let slNo = $("#pos-form-tbody tr").length + 1;
                    let newRow = `<tr data-barcode="${product.barcode}">
                                 <td class="sl-no">${slNo}</td>

                    <td>${product.barcode}</td>
                <td>${product.name}</td>
                <td>${product.unit}</td>
                <td><input type="number" value="${scannedQty}" class="form-control qty" data-price="${product.product_selling_cost}" min="1" onchange="updateSubtotal(this)"></td>
                <td><input type="number" value="${product.product_selling_cost}" class="form-control item-cost" min="0" step="0.01" onchange="updateSubtotal(this)"></td>
  
                <td class="tax-amount">${taxAmount}</td>
                <td class="subtotal">${subtotal
             
                }</td>
                <td><button class="btn btn-danger btn-sm remove-item"><i class="fa fa-trash"></i></button></td>
            </tr>`;
                    $('#pos-form-tbody').append(newRow);
                }
                saveProductToStorage(product, scannedQty);
                updateTotals();
            }

            function saveProductToStorage(product, scannedQty) {
                let existingProducts = JSON.parse(localStorage.getItem("scannedProducts")) || [];
                let found = existingProducts.find(p => p.barcode === product.barcode);
                if (found) {
                    found.quantity += scannedQty;
                } else {
                    product.quantity = scannedQty;
                    existingProducts.push(product);
                }
                localStorage.setItem("scannedProducts", JSON.stringify(existingProducts));
            }

            $(document).on('click', '.remove-item', function() {
                let row = $(this).closest('tr');
                let barcode = row.attr("data-barcode");
                row.remove();

                let existingProducts = JSON.parse(localStorage.getItem("scannedProducts")) || [];
                existingProducts = existingProducts.filter(product => product.barcode !== barcode);
                localStorage.setItem("scannedProducts", JSON.stringify(existingProducts));

                updateTotals();
            });

            window.updateSubtotal = function(el) {
                let qty = $(el).val();
                let price = $(el).data('price');
                let taxRate = 0.05; // 5% tax
                let taxAmount = (qty * price * taxRate).toFixed(2);
                let newSubtotal = (qty * price + parseFloat(taxAmount)).toFixed(2);

                let row = $(el).closest('tr');
                row.find('.tax-amount').text(taxAmount);
                row.find('.subtotal').text(newSubtotal);

                updateTotals();
            };

            function updateTotals() {
                let totalQty = 0;
                let totalAmount = 0;

                $("#pos-form-tbody tr").each(function() {
                    let qty = parseInt($(this).find('.qty').val());
                    let subtotal = parseFloat($(this).find('.subtotal').text());

                    totalQty += qty;
                    totalAmount += subtotal;
                });

                $(".tot_qty").text(totalQty);
                $(".tot_amt").text(totalAmount.toFixed(2));

                let grandTotal = totalAmount - discountAmount;
                $(".tot_grand").text(grandTotal.toFixed(2));
            }

            $(".discount_update").on("click", function() {
                let discountValue = parseFloat($("#discount_input").val()) || 0;
                let discountType = $("#discount_type").val();
                let totalAmount = parseFloat($(".tot_amt").text()) || 0;

                if (discountType === "in_fixed") {
                    discountAmount = discountValue;
                } else {
                    discountAmount = (totalAmount * discountValue) / 100;
                }

                $(".tot_disc").text(discountAmount.toFixed(2));
                let grandTotal = totalAmount - discountAmount;
                $(".tot_grand").text(grandTotal.toFixed(2));

                $("#discount-modal").modal("hide");
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Clear button click event
            $('#clear').on('click', function() {
                $('#pos-form-tbody').empty(); // Remove all rows from the table
                localStorage.removeItem("scannedProducts"); // Clear stored products

                // Reset all totals to zero
                $(".tot_qty").text("0");
                $(".tot_amt").text("0.00");
                $(".tot_disc").text("0.00");
                $(".tot_grand").text("0.00");

                // Reset discount input field
                $("#discount_input").val("0");

                // Reset discount type selection to default (Fixed)
                $("#discount_type").val("in_fixed");
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // Handle payment button click with payment mode
            window.handlePayment = function(paymentMode) {
                if ($("#pos-form-tbody tr").length === 0) {
                    alert("Please select at least one item before proceeding with payment.");
                    return;
                }
                saveBillAndSales(paymentMode);
            };


            // Save Bill and Sales to Database
            function saveBillAndSales(paymentMode) {
                let salesData = [];

                // Collect sales data from the POS form
                $('#pos-form-tbody tr').each(function() {
                    salesData.push({
                        product_id: $(this).find(".product-id").val() || 0,
                        quantity: $(this).find(".qty").val() || 1,
                        unit_price: $(this).find(".item-cost").val() || 0, // Corrected line
                        total_price: $(this).find(".subtotal").text() || 0
                    });
                });

                // AJAX request to save the bill and sales data
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'store-bill',
                    method: 'POST',
                    data: {
                        customer_id: $('#customer_id').val() || 0,
                        total_amount: $(".tot_amt").val() || 0,
                        paid_amount: $(".paid_amount").val() || 0,
                        remaining_credit: $(".remaining_credit").val() || 0,
                        sales: salesData,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Bill and sales saved successfully!');
                            let printContent = generateReceipt(paymentMode);
                            printReceipt(printContent);
                        } else {
                            alert('Error saving bill.');
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            }

            // Generate Receipt with Payment Mode
            function generateReceipt(paymentMode) {
                let receipt = `
      <div class="cs-container style1">
        <div class="cs-invoice cs-style1 padding_40">
            <div class="cs-invoice_in" id="download_section">
                <div class="cs-invoice_head cs-type1 column border-bottom-none">
                    <div class="display-flex justify-content-center cs-width_12">
                        <div class="cs-text_center">
                            <p class="cs-f18 cs-primary_color cs-bold cs-mb2">Supermarket Name</p>
                            <p class="cs-m0 cs-primary_color cs-f14">Address Line 1</p>
                            
                        </div>
                    </div>
                </div>
                <div class="cs-border cs-mb10"></div>
                <h5 class="cs-f16 cs-text_center text-transform-uppercase cs-mb10">Cash Receipt</h5>
                <div class="cs-border"></div>

                <div class="cs-table cs-style2 padding-rignt-left">
                    <table>
                        <thead>
                            <tr class="cs-f12">
                                <th class="cs-width_6 cs-normal cs-primary_color">Item</th>
                                <th class="cs-normal cs-primary_color">Price</th>
                                <th class="cs-normal cs-primary_color">Qty</th>
                                <th class="cs-normal cs-primary_color cs-text_right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="cs-f12 tm-border-none">`;

                // Loop through POS items
                $('#pos-form-tbody tr').each(function() {
                    let itemName = $(this).find("td:eq(1)").text();
                    let qty = $(this).find(".qty").val();
                    let price = $(this).find("td:eq(3)").text();
                    let subtotal = $(this).find(".subtotal").text();

                    receipt += `<tr class="cs-primary_color">
            <td class="cs-p0 cs-p-b5">${itemName}</td>
            <td class="cs-p0 cs-p-b5">${price}</td>
            <td class="cs-p0 cs-p-b5">${qty}</td>
            <td class="cs-text_right cs-p0 cs-p-b5">${subtotal}</td>
        </tr>`;
                });

                // Additional rows for totals
                receipt += `</tbody>
                    </table>
                </div>

                <div class="cs-border cs-mt12"></div>
                <div class="cs-table cs-style2 padding-rignt-left display-flex justify-content-flex-end">
                    <table class="cs-width_9">
                        <tbody class="cs-f12 tm-border-none">
                            <tr class="cs-primary_color">
                                <td>Total Quantity:</td>
                                <td class="cs-text_right">${$(".tot_qty").text()}</td>
                            </tr>
                            <tr class="cs-primary_color">
                                <td>Total Amount:</td>
                                <td class="cs-text_right">$${$(".tot_amt").text()}</td>
                            </tr>
                            <tr class="cs-primary_color">
                                <td>Total Discount:</td>
                                <td class="cs-text_right">$${$(".tot_disc").text()}</td>
                            </tr>
                            <tr class="cs-primary_color">
                                <td>Grand Total:</td>
                                <td class="cs-text_right">$${$(".tot_grand").text()}</td>
                            </tr>
                            <tr class="cs-primary_color">
                                <td>Payment Mode:</td>
                                <td class="cs-text_right">${paymentMode}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="cs-border cs-mb15 cs-mt12"></div>
                <div class="cs-text_center cs-mb10">
                    <img src="reciept/barcode.png" alt="Qr Code" />
                </div>
                <p class="cs-text_center cs-f16 cs-primary_color">Thank You</p>
            </div>
        </div>
       </div>`;

                return receipt;
            }

            // Print the receipt
            function printReceipt(content) {
                let printWindow = window.open('', '', 'width=400,height=600');
                printWindow.document.write(`
              <html>
              <head>
                <link rel="stylesheet" href="reciept/style.css" />
              </head>
              <body>${content}</body>
              </html>`);
                printWindow.document.close();
                printWindow.print();
            }
        });
    </script>

</body>

</html>