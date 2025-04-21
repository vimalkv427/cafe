<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>


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
                        <h4 class="mb-3">Bill List</h4>
                    </div>
                    <a href="{{ route('sales.index') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Sale
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table id="billTable" class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>#</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Remaining Credit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($bills as $bill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bill->created_at ? $bill->created_at->format('d M Y') : 'N/A' }}</td>
                                    <td>{{ $bill->customer->name ?? 'N/A' }}</td>
                                    <td>{{ number_format($bill->total_amount, 2) }}</td>
                                    <td>{{ number_format($bill->paid_amount, 2) }}</td>
                                    <td>{{ number_format($bill->remaining_credit, 2) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <!-- Change the eye button to a link to the bill details page -->
                                            <a class="badge badge-info mr-2" data-toggle="tooltip" title="View"
                                               href="{{ route('bills.show', $bill->id) }}">
                                                <i class="ri-eye-line mr-0"></i>
                                            </a>
                                            <a class="badge bg-success mr-2" data-toggle="tooltip" title="Edit" href="{{ route('bills.edit', $bill->id) }}">
                                                <i class="ri-pencil-line mr-0"></i>
                                            </a>
                                            <a class="badge bg-warning mr-2" data-toggle="tooltip" title="Delete" href="javascript:void(0);"
                                               onclick="if(confirm('Are you sure?')) { document.getElementById('delete-bill-{{ $bill->id }}').submit(); }">
                                                <i class="ri-delete-bin-line mr-0"></i>
                                            </a>
                                            <form id="delete-bill-{{ $bill->id }}" action="{{ route('bills.destroy', $bill->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
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


<script>
    $(document).ready(function() {
        $('#billTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
            "responsive": true,
            "columnDefs": [
                { "orderable": false, "targets": 6 }
            ]
        });
    });
</script>


