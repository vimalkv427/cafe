@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div
                    class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Category List</h4>

                    </div>
                    <a href="page-add-category"
                        class="btn btn-primary add-list"><i
                            class="las la-plus mr-3"></i>Add
                        Category</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table
                        class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>
                                   Sl No:
                                </th>
                                <th>Category</th>
                                <th>Code</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                        @foreach($categories as $index => $category)
                        <tr>
                               
                                <td>{{ $index + 1 }}</td> <!-- Serial number starts from 1 -->

                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->code }}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">

                                        <a class="badge bg-success mr-2" data-toggle="tooltip" title="Edit" href="{{ route('category.edit', $category->id) }}">
                                            <i class="ri-pencil-line mr-0"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="badge bg-warning mr-2 delete-category" data-id="{{ $category->id }}" data-toggle="tooltip" title="Delete">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.data-table').DataTable({ // Target the table class
            "order": [[0, "asc"]], // Order by the first column (Sl No) descending
            "pageLength": 10, // Show 10 rows per page
            "lengthMenu": [10, 25, 50, 100], // Page length options
            "columnDefs": [{
                "targets": [3], // Disable sorting for the "Action" column
                "orderable": false
            }]
        });

        // Delete Category Without Reloading Page
        $(document).on('click', '.delete-category', function () {
            let categoryId = $(this).data('id');
            let url = "{{ route('category.destroy', ':id') }}".replace(':id', categoryId);

            if (confirm('Are you sure you want to delete this category?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        alert(response.success);
                        $('.data-table').DataTable().row($(this).parents('tr')).remove().draw();
                        location.reload();  // Remove row without reload
                    },
                    error: function () {
                        alert('Are you sure you want to delete this category!');
                    }
                });
            }
        });
    });
</script>

@include('admin.include.footer')