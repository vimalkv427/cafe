@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Waiter Orders List</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table id="waiterOrderTable" class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>#</th>
                                <th>Table ID</th>
                                <th>Total Amount</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @forelse ($orders as $order)
                                @if ($order->waiter_id === $waiterId)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->table_id }}</td>
                                        <td>{{ number_format($order->total_amount, 2) }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" title="View Items"
                                                   href="{{ route('order.items', ['order_id' => $order->id]) }}">
                                                    <i class="ri-eye-line mr-0"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.include.footer')

<script>
    $(document).ready(function() {
        $('#waiterOrderTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10,
            "responsive": true,
            "columnDefs": [{
                "orderable": false,
                "targets": 3
            }]
        });
    });
</script>
