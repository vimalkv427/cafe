@include('superadmin.include.header')
@include('superadmin.include.sidebar')
@include('superadmin.include.navbar')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                        <h4 class="mb-3">User List</h4>
                    </div>
                    <a href="{{ route('users.create') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add User
                    </a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info" id="userTable">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Shop Name</th>
                                <th>Address</th>
                                <th>Created Date</th>
                                <th>Trial End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->shop_name ?? 'N/A' }}</td>
                                <td>{{ $user->address ?? 'N/A' }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>
                                    @if($user->status == 'blocked')
                                        <span class="blink text-danger font-weight-bold">Blocked</span>
                                    @elseif($user->trial_end_date)
                                        @php
                                            $trialExpired = \Carbon\Carbon::parse($user->trial_end_date)->isPast();
                                        @endphp
                                        <span class="{{ $trialExpired ? 'blink text-danger font-weight-bold' : '' }}">
                                            {{ \Carbon\Carbon::parse($user->trial_end_date)->format('d-m-Y') }}
                                        </span>
                                    @else
                                        <span class="badge badge-danger">No Trial Set</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <!-- Extend Trial Form -->
                                        <form action="{{ route('users.extend-trial', $user->id) }}" method="POST" class="mr-2">
                                            @csrf
                                            <input type="number" name="extra_days" class="form-control form-control-sm d-inline-block" style="width: 80px;" placeholder="Days" required>
                                            <button type="submit" class="btn btn-sm btn-success">Extend</button>
                                        </form>
                                        @if($user->status == '0')
                                            <!-- Show Unblock Button If User is Blocked -->
                                            <form action="{{ route('users.unblock', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to unblock this user?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning">Unblock</button>
                                            </form>
                                        @else
                                            <!-- Show Block Button If User is Active -->
                                            <form action="{{ route('users.block', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to block this user?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">Block</button>
                                            </form>
                                        @endif
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
@include('superadmin.include.footer')

<!-- jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [10, 25, 50, 100],
            "language": {
                "search": "Search Users:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ users",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });

        // Auto-dismiss success message after 3 seconds
        setTimeout(function() {
            $(".alert-success").fadeOut("slow");
        }, 3000);
    });
</script>
