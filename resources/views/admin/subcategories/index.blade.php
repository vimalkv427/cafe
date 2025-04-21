@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Subcategory List</h4>
                    </div>
                    <a href="{{ route('subcategories.create') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Subcategory
                    </a>
                </div>
            </div>
            


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


            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table id="subcategoryTable" class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Sl No:</th>
                                <th>Image</th>
                                <th>Subcategory Name</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                        @foreach($subcategories as $index => $subcategory)
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Serial number starts from 1 -->
                            <td>
                                @if($subcategory->image)
                                    <img src="{{ asset('uploads/subcategories/' . $subcategory->image) }}" alt="Subcategory Image" width="50" height="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->category->category_name }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" title="Edit" href="{{ route('subcategories.edit', $subcategory->id) }}">
                                        <i class="ri-pencil-line mr-0"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="badge bg-warning mr-2 delete-subcategory" data-id="{{ $subcategory->id }}" data-toggle="tooltip" title="Delete">
                                        <i class="ri-delete-bin-line mr-0"></i>
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
        <!-- Page end  -->
    </div>
</div>

<!-- Include jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<script>
    $(document).ready(function() {
        $('#subcategoryTable').DataTable({
            "order": [[0, "asc"]],
            "pageLength": 10
        });

        $(document).on('click', '.delete-subcategory', function() {
            let subcategoryId = $(this).data('id');
            let url = "{{ route('subcategories.destroy', ':id') }}".replace(':id', subcategoryId);

            if (confirm('Are you sure you want to delete this subcategory?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.success);
                        location.reload(); // Reload the page after successful deletion
                    },
                    error: function() {
                        alert('Something went wrong!');
                    }
                });
            }
        });
    });
</script>

@include('admin.include.footer')
