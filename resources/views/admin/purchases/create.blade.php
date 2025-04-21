<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')
<!-- Add these in your header or layout file -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    /* Rounded Corners for Select2 */
    /* Rounded Corners for Select2 */
    .select2-container .select2-selection--single {
        border-radius: 8px !important;
        border: 1px solid #ced4da;
        height: 38px;
        padding: 5px;
        box-shadow: none;
        background-color: #fff;
    }

    .select2-selection__rendered {
        line-height: 28px;
        /* Center text vertically */
        color: #495057;
    }

    .select2-selection__arrow {
        height: 36px;
        border-left: 1px solid #ced4da;
        border-radius: 0 8px 8px 0;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #495057 transparent transparent transparent;
    }

    /* Dropdown menu */
    .select2-container .select2-dropdown {
        border-radius: 8px;
        border: 1px solid #ced4da;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Prevent overlapping of select2 elements */
    .select2-container--bootstrap .select2-selection {
        border-radius: 8px;
    }
</style>


<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ isset($purchase) ? 'Update Purchase' : 'Add Purchase' }}</h4>
                        </div>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPartyModal">
                                Add New Party
                            </button>
                        </span>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ isset($purchase) ? route('purchases.update', $purchase->id) : route('purchases.store') }}"
                            method="POST" data-toggle="validator">
                            @csrf
                            @if(isset($purchase))
                            @method('PUT')
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="party_id">Select Party *</label>
                                        <select name="party_id" id="party_id" class="form-control select2" required>
                                            <option value="">Select Party</option>
                                            @foreach($parties as $party)
                                            <option value="{{ $party->id }}">{{ $party->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_number">Invoice Number *</label>
                                        <input type="text" name="invoice_number" id="invoice_number" class="form-control"
                                            value="{{ old('invoice_number', isset($purchase) ? $purchase->invoice_number : '') }}" required>
                                    </div>
                                </div>

                                <!-- Invoice Date -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_date">Invoice Date *</label>
                                        <input type="date" name="invoice_date" id="invoice_date" class="form-control"
                                            value="{{ old('invoice_date', isset($purchase) ? $purchase->invoice_date : '') }}" required>
                                    </div>
                                </div>

                                <!-- Amount -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Amount *</label>
                                        <input type="number" name="invoice_amount" id="invoice_amount" class="form-control"
                                            value="{{ old('invoice_amount', isset($purchase) ? $purchase->invoice_amount : '') }}" required>
                                    </div>
                                </div>
                            </div>



                            <br>
                            <table class="table table-bordered" id="productsTable" style="zoom:80%;">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Tax (%)</th>
                                        <th>Tax Amount</th>
                                        <th>Discount (%)</th>
                                        <th>Discount Amount</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="zoom:80%;">
                                            <!-- Barcode Input Field -->
                                            <input type="text" name="barcode[]" class="form-control barcode-input" placeholder="Scan Barcode" required>
                                            <br>

                                            <!-- Product Dropdown Field -->
                                            <select name="product_id[]" class="form-control product-select" required>
                                                <option value="">Select Product</option>
                                                @foreach($products as $product)
                                                <option value="{{ $product->id }}" data-barcode="{{ $product->barcode }}">
                                                    {{ $product->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" name="quantity[]" class="form-control quantity" required></td>
                                        <td><input type="number" name="unit_price[]" class="form-control unit_price" required></td>
                                        <td><input type="number" name="tax_percentage[]" class="form-control tax_percentage"></td>
                                        <td><input type="number" name="tax[]" class="form-control tax"></td>
                                        <td><input type="number" name="discount_percentage[]" class="form-control discount_percentage"></td>
                                        <td><input type="number" name="discount[]" class="form-control discount"></td>
                                        <td><input type="number" name="total_price[]" class="form-control total_price" readonly></td>
                                        <td><button type="button" class="btn btn-danger remove-row">X</button></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6"><button type="button" class="btn btn-primary" id="addRow">Add Product</button></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Grand Total:</td>
                                        <td><input type="number" id="grandTotal" class="form-control" readonly></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPartyModal" tabindex="-1" role="dialog" aria-labelledby="addPartyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPartyModalLabel">Add New Party</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addPartyForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="party_name">Party Name *</label>
                        <input type="text" class="form-control" id="party_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_person">Contact Person</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Party</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        console.log("jQuery is working");

        $('#addRow').click(function() {
            var row = `<tr>
            <td sstyle="zoom:80%;">
            <!-- Barcode Input Field -->
            <input type="text" name="barcode[]" class="form-control barcode-input" placeholder="Scan Barcode" required>
            <br>
            <!-- Product Dropdown Field -->
            <select name="product_id[]" class="form-control product-select" required>
                <option value="">Select Product</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}" data-barcode="{{ $product->barcode }}">
                    {{ $product->name }}
                </option>
                @endforeach
            </select>
        </td>
            <td><input type="number" name="quantity[]" class="form-control quantity" required></td>
            <td><input type="number" name="unit_price[]" class="form-control unit_price" required></td>
            <td><input type="number" name="tax_percentage[]" class="form-control tax_percentage"></td>
            <td><input type="number" name="tax[]" class="form-control tax"></td>
            <td><input type="number" name="discount_percentage[]" class="form-control discount_percentage"></td>
            <td><input type="number" name="discount[]" class="form-control discount"></td>
            <td><input type="number" name="total_price[]" class="form-control total_price" readonly></td>
            <td><button type="button" class="btn btn-danger remove-row">X</button></td>
        </tr>`;
            $('#productsTable tbody').append(row);
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
            calculateGrandTotal();
        });

        $(document).on('input', '.quantity, .unit_price, .tax_percentage, .tax, .discount_percentage, .discount', function() {
            var row = $(this).closest('tr');
            var quantity = parseFloat(row.find('.quantity').val()) || 0;
            var unitPrice = parseFloat(row.find('.unit_price').val()) || 0;

            // Tax Calculations
            var taxPercentage = parseFloat(row.find('.tax_percentage').val()) || 0;
            var taxAmount = parseFloat(row.find('.tax').val()) || 0;

            if ($(this).hasClass('tax_percentage')) {
                taxAmount = (quantity * unitPrice) * (taxPercentage / 100);
                row.find('.tax').val(taxAmount.toFixed(2));
            } else if ($(this).hasClass('tax')) {
                taxPercentage = (taxAmount / (quantity * unitPrice)) * 100;
                row.find('.tax_percentage').val(taxPercentage.toFixed(2));
            }

            // Discount Calculations
            var discountPercentage = parseFloat(row.find('.discount_percentage').val()) || 0;
            var discountAmount = parseFloat(row.find('.discount').val()) || 0;

            if ($(this).hasClass('discount_percentage')) {
                discountAmount = (quantity * unitPrice) * (discountPercentage / 100);
                row.find('.discount').val(discountAmount.toFixed(2));
            } else if ($(this).hasClass('discount')) {
                discountPercentage = (discountAmount / (quantity * unitPrice)) * 100;
                row.find('.discount_percentage').val(discountPercentage.toFixed(2));
            }

            // Calculate total for the row
            var total = (quantity * unitPrice) + taxAmount - discountAmount;
            row.find('.total_price').val(total.toFixed(2));

            // Update grand total
            calculateGrandTotal();
        });

        function calculateGrandTotal() {
            var grandTotal = 0;
            $('.total_price').each(function() {
                grandTotal += parseFloat($(this).val()) || 0;
            });
            $('#grandTotal').val(grandTotal.toFixed(2));
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addPartyForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("purchases.storeParty") }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        alert('Party created successfully!');
                        $('#addPartyModal').modal('hide');
                        $('#addPartyForm')[0].reset();
                        location.reload();
                        // Optionally, add the new party to the select dropdown
                        $('#party_id').append(
                            $('<option>', {
                                value: response.party.id,
                                text: response.party.name
                            }).prop('selected', true)
                        );
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        alert(Object.values(errors).join('\n'));
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap'
        });
    });
</script>

<script>
    $(document).on('change', '.barcode-input', function() {
        var barcode = $(this).val().trim(); // Get the scanned barcode
        var productSelect = $(this).closest('td').find('.product-select'); // Find the related product dropdown

        // Automatically select the product based on the barcode
        productSelect.val('');
        productSelect.find('option').each(function() {
            if ($(this).data('barcode') == barcode) {
                productSelect.val($(this).val());
                return false; // Stop loop when matched
            }
        });
    });
    $(document).on('change', '.barcode-input', function() {
    var barcode = $(this).val().trim(); // Get the scanned barcode
    var productSelect = $(this).closest('td').find('.product-select'); // Find the related product dropdown
    
    // Automatically select the product based on the barcode
    productSelect.val('');
    productSelect.find('option').each(function() {
        if ($(this).data('barcode') == barcode) {
            productSelect.val($(this).val());
            return false; // Stop loop when matched
        }
    });
});

// Remove row on click of 'X' button
$(document).on('click', '.remove-row', function() {
    $(this).closest('tr').remove();
});

</script>


@include('admin.include.footer')