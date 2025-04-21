@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    @media print {
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            width: 58mm;
            padding: 0 3mm;
            color: black;
            font-weight: normal;
            font-family: "Courier", monospace;
            font-size: 12px;
        }

        .modal-content {
            color: black;
            box-shadow: none;
            border: none;
        }

        /* Set a fixed font size for clarity */
        * {
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 3px 4px;
            word-wrap: break-word;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        /* Ensure footer is not cut off */
        .invoice-bar {
            page-break-before: avoid;
            page-break-after: always;
        }

        /* Hide buttons while printing */
        .invoice-bar button {
            display: none;
        }
    }
</style>
<div class="content-page">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Takeaway</h4>
                    </div>
                    <!-- <a href="{{ route('sales.index') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Sale
                    </a> -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table id="billTable" class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                        $lastOrderId = null;
                        @endphp

                        <tbody class="ligth-body">
                            @forelse ($takeaways as $takeaway)
                            <tr>
                                <td><strong>#{{ $takeaway->id }}</strong></td>
                                <td>{{ $takeaway->item_name }}</td>
                                <td>{{ $takeaway->quantity }}</td>
                                <td>{{ number_format($takeaway->price, 2) }}</td>
                                <td>{{ number_format($takeaway->price * $takeaway->quantity, 2) }}</td>

                                {{-- Show action only for the first occurrence of an order --}}
                                <td>
                                    @if ($lastOrderId !== $takeaway->id)
                                    <a class="badge bg-info mr-2 print-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#discount"
                                        data-order-id="{{ $takeaway->id }}">
                                        <i class="ri-printer-line mr-0"></i>
                                    </a>
                                    @php $lastOrderId = $takeaway->id; @endphp
                                    @endif
                                </td>



                            </tr>

                            @php
                            $lastOrderId = $takeaway->id;
                            @endphp
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No takeaway orders found today.</td>
                            </tr>
                            @endforelse
                        </tbody>


                    </table>

                </div>
            </div>
        </div>
        <div class="modal fade modal-default" id="discount">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Amount </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body pb-1">

                            <div class="mb-3">
                                <label class="form-label">Value <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="Paying_amont" placeholder="Enter amount" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Payment Method <span class="text-danger">*</span></label>
                                <select class="form-select" id="payment_method" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Card">Card</option>
                                    <option value="UPI">UPI</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                            <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-md btn-primary">Print</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- End Row -->
        <div class="modal fade modal-default" id="print-receipt" tabindex="-1" aria-labelledby="print-receipt">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Receipt</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/klogo.jpg') }}" width="100" height="30" alt="Receipt Logo">
                            <h6>Karimeen 😊</h6>
                            <p class="mb-0">Phone Number: +1 5656665656</p>
                            <p class="mb-0">Email: <a href="mailto:restaurantkarimeen@gmail.com">restaurantkarimeen@gmail.com</a></p>
                        </div>

                        <div class="text-center">
                            <h6>Invoice</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div><strong>Invoice No:</strong> <span id="invoice-id"></span></div>
                            </div>
                            <div class="col-md-6 text-end">
                                <div><strong>Date:</strong> <span id="invoice-date"></span></div>
                            </div>
                        </div>

                        <hr>
                        <table class="table w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody id="receipt-items"></tbody>
                        </table>

                        <table class="w-100">
                            <tr>
                                <td><strong>Subtotal</strong></td>
                                <td class="text-end" id="receipt-subtotal">£0.00</td>
                            </tr>
                            <tr>
                                <td><strong>Discount</strong></td>
                                <td class="text-end" id="receipt-discount">-£0.00</td>
                            </tr>
                            <tr>
                                <td><strong>Tax (<span id="receipt-tax-percentage">0</span>%)</strong></td>
                                <td class="text-end" id="receipt-tax">£0.00</td>
                            </tr>
                            <tr>
                                <td><strong>Total Bill</strong></td>
                                <td class="text-end" id="receipt-total">£0.00</td>
                            </tr>
                            <tr>
                                <td><strong>Received</strong></td>
                                <td class="text-end" id="receipt-received">£0.00</td>
                            </tr>
                            <tr>
                                <td><strong>Balance</strong></td>
                                <td class="text-end" id="receipt-balance">£0.00</td>
                            </tr>
                        </table>

                        <hr>
                        <div class="text-center">
                            <p>**VAT against this challan is payable through central registration.</p>
                            <p>Thank You For Shopping With Us. Please Come Again</p>
                            <button onclick="printReceipt()" class="btn btn-primary">Print Receipt</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).on('click', '.print-btn', function() {
        const orderId = $(this).data('order-id');
        $('#discount').data('order-id', orderId); // store it in the modal if needed
    });
</script>
<script>
    let selectedOrderId = null;

    // Capture order ID when "Print" button is clicked in discount modal
    $(document).on('click', '.print-btn', function() {
        selectedOrderId = $(this).data('order-id');

        // Fetch subtotal and fill in modal input
        $.get('/get-takeaway-subtotal/' + selectedOrderId, function(data) {
            $('#Paying_amont').val(data.subtotal);
        });
    });

    // Handle submit of discount modal and open receipt modal
    $('form').on('submit', function(e) {
        e.preventDefault();
        const payingAmount = parseFloat($('#Paying_amont').val());
        const paymentMethod = $('#payment_method').val();

        if (!selectedOrderId || !payingAmount || !paymentMethod) {
            alert("All fields are required!");
            return;
        }

        $('#discount').modal('hide');

        // Step 1: Mark as printed
        $.post('/takeaway/mark-printed/' + selectedOrderId, {
            _token: '{{ csrf_token() }}' // CSRF token for POST
        }, function(res) {
            if (res.success) {
                // Step 2: Fetch and show receipt
                $.get('/get-takeaway-receipt/' + selectedOrderId, function(data) {
                    $('#invoice-id').text(selectedOrderId);
                    $('#invoice-date').text(data.date);

                    let itemsHtml = '';
                    data.items.forEach((item, index) => {
                        const total = item.price * item.quantity;
                        itemsHtml += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.item_name}</td>
                            <td>${item.quantity}</td>
                            <td class="text-end">£${total.toFixed(2)}</td>
                        </tr>`;
                    });
                    $('#receipt-items').html(itemsHtml);

                    $('#receipt-subtotal').text('£' + parseFloat(data.subtotal).toFixed(2));
                    $('#receipt-discount').text('-£' + parseFloat(data.discount).toFixed(2));
                    $('#receipt-tax-percentage').text(data.tax_percentage);
                    $('#receipt-tax').text('£' + parseFloat(data.tax_amount).toFixed(2));
                    $('#receipt-total').text('£' + parseFloat(data.total_payable).toFixed(2));
                    $('#receipt-received').text('£' + payingAmount.toFixed(2));
                    const balance = payingAmount - parseFloat(data.total_payable);
                    $('#receipt-balance').text('£' + balance.toFixed(2));

                    $('#print-receipt').modal('show');
                });
            }
        });
    });


    function printReceipt() {
    const printContents = document.querySelector('#print-receipt .modal-body').innerHTML;
    const originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();

    // Restore the original page content
    document.body.innerHTML = originalContents;

    // After short delay, redirect to takeaway billing
    setTimeout(function () {
        window.location.href = "{{ route('bills.take_away') }}";
    }, 500); // 0.5 second delay
}

</script>


@include('admin.include.footer')