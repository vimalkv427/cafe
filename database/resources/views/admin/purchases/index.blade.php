<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid">

    @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Purchase List</h4>
                    </div>
                    <a href="{{ route('purchases.create') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Purchase
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
    <table id="purchaseTable" class="data-table table mb-0 tbl-server-info">
        <thead class="bg-white text-uppercase">
            <tr class="ligth ligth-data">
                <th>ID</th>
                <th>User</th>
                <th>Invoice Number</th>
                <th>Invoice Amount</th>
                <th>Total Price</th>
                <th>Invoice Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="ligth-body">
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->user->name ?? 'N/A' }}</td>
                    <td>{{ $purchase->invoice_number ?? 'N/A' }}</td>
                    <td>${{ number_format($purchase->invoice_amount, 2) }}</td>
                    <td>${{ number_format($purchase->total_price, 2) }}</td>
                    <td>{{ $purchase->created_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex align-items-center list-action">
                            <a class="badge bg-info mr-2" data-toggle="modal" data-target="#purchaseModal"
                               data-id="{{ $purchase->id }}" title="View">
                                <i class="ri-eye-line mr-0"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>
</div>

<!-- Purchase Details Modal -->
<div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="purchaseModalLabel">Purchase Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalLoader" class="text-center p-5">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div id="purchaseDetailsContent" style="display:none;">
   
    <h6>Products:</h6>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Discount (%)</th>
                <th>Discount ($)</th>
                <th>Tax (%)</th>
                <th>Tax ($)</th>
                <th>Total Price ($)</th>
            </tr>
        </thead>
        <tbody id="productsTableBody"></tbody>
    </table>
</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function() {
        $('#purchaseTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
            "responsive": true,
            "columnDefs": [
                { "orderable": false, "targets": [6] } // Prevent sorting on the 'Action' column
            ]
        });

        $('#purchaseModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var purchaseId = button.data('id');
            $('#modalLoader').show();
            $('#purchaseDetailsContent').hide();

            $.ajax({
                url: '/purchases/' + purchaseId,
                method: 'GET',
                success: function (data) {
                    $('#modalLoader').hide();
                    $('#purchaseDetailsContent').show();

                    var productsHtml = '';
                    $.each(data.items, function (index, item) {
                        productsHtml += `<tr>
                            <td>${item.product.name}</td>
                            <td>${item.quantity}</td>
                            <td>$${parseFloat(item.unit_price).toFixed(2)}</td>
                            <td>${parseFloat(item.discount_percentage).toFixed(2)}%</td>
                            <td>$${parseFloat(item.discount_amount).toFixed(2)}</td>
                            <td>${parseFloat(item.tax_percentage).toFixed(2)}%</td>
                            <td>$${parseFloat(item.tax_amount).toFixed(2)}</td>
                            <td>$${parseFloat(item.total_price).toFixed(2)}</td>
                        </tr>`;
                    });
                    
                    $('#productsTableBody').html(productsHtml);
                },
                error: function () {
                    alert('Failed to load purchase item details.');
                }
            });
        });
    });


$(document).ready(function () {
    $('#purchaseModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var purchaseId = button.data('id');
        $('#modalLoader').show();
        $('#purchaseDetailsContent').hide();

        $.ajax({
            url: '/purchases/' + purchaseId,
            method: 'GET',
            success: function (data) {
                $('#modalLoader').hide();
                $('#purchaseDetailsContent').show();

                var productsHtml = '';
                $.each(data.items, function (index, item) {
                    productsHtml += `<tr>
                        <td>${item.product.name}</td>
                        <td>${item.quantity}</td>
                        <td>$${parseFloat(item.unit_price).toFixed(2)}</td>
                        <td>${parseFloat(item.discount_percentage).toFixed(2)}%</td>
                        <td>$${parseFloat(item.discount_amount).toFixed(2)}</td>
                        <td>${parseFloat(item.tax_percentage).toFixed(2)}%</td>
                        <td>$${parseFloat(item.tax_amount).toFixed(2)}</td>
                        <td>$${parseFloat(item.total_price).toFixed(2)}</td>
                    </tr>`;
                });
                
                $('#productsTableBody').html(productsHtml);
            },
            error: function () {
                alert('Failed to load purchase item details.');
            }
        });
    });
});


</script>

@include('admin.include.footer')
