<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid">
        <!-- Success Message -->
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

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Sales Details</h4>
                    </div>
                    <a href="{{ route('sales.index') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Sale
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table id="salesTable" class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Bill ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ isset($sale->product->name) ? $sale->product->name : 'N/A' }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ number_format($sale->unit_price, 2) }}</td>
                                    <td>{{ number_format($sale->total_price, 2) }}</td>
                                    <td>{{ $sale->created_at ? $sale->created_at->format('d M Y H:i:s') : 'N/A' }}</td>
                                    <td>{{ $sale->updated_at ? $sale->updated_at->format('d M Y H:i:s') : 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

@include('admin.include.footer')

<!-- Place DataTables initialization script AFTER the table markup -->
<script>
    $(document).ready(function() {
        $('#salesTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": "&laquo;",
                    "next": "&raquo;"
                }
            }
        });
    });
</script>
