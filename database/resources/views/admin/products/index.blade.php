@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product List</h4>
                    </div>
                    <a href="{{ route('product.add') }}" class="btn btn-primary add-list">
                        <i class="las la-plus mr-3"></i>Add Product
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
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th>Image</th>
                               
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>

                               
                                <td>{{ $product->category ? $product->category->category_name : 'N/A' }}</td>
                                <td>{{ $product->subcategory ? $product->subcategory->name : 'N/A' }}</td>
                                <td>{{ $product->cost }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @if($product->image)
                                    <img src="{{ asset('uploads/' . $product->image) }}" width="50" height="50">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                

                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" title="Edit" href="{{ route('products.edit', $product->id) }}">
                                            <i class="ri-pencil-line mr-0"></i>
                                        </a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline delete-product">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-warning border-0" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="ri-delete-bin-line mr-0"></i>
                                            </button>
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
        <!-- Page end  -->
    </div>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#subcategoryTable').DataTable({
            "processing": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "lengthMenu": [10, 25, 50, 100], // Number of entries per page
            "language": {
                "search": "Search Products:", // Custom search placeholder
                "lengthMenu": "Show _MENU_ entries per page",
                "zeroRecords": "No matching products found",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No products available",
                "infoFiltered": "(filtered from _MAX_ total entries)"
            }
        });
    });
</script>


@include('admin.include.footer')