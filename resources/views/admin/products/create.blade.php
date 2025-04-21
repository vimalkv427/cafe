@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div
                        class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
                            method="POST" enctype="multipart/form-data" data-toggle="validator">
                            @csrf
                            @if(isset($product))
                            @method('PUT')
                            @endif

                            <div class="row">
                                <!-- Product Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name *</label>
                                        <input type="text"
                                            class="form-control"
                                            placeholder="Enter Name"
                                            name="name"
                                            value="{{ old('name', $product->name ?? '') }}"
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category *</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Sub Category -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Category *</label>
                                        <select id="sub_category_id" name="sub_category_id" class="form-control" required>
                                            <option value="">Select Subcategory</option>
                                            @if(isset($subcategories))
                                            @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                {{ old('sub_category_id', $product->sub_category_id ?? '') == $subcategory->id ? 'selected' : '' }}>
                                                {{ $subcategory->name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <!-- Cost -->
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cost *</label>
                                        <input type="number"
                                            class="form-control"
                                            placeholder="Enter Cost"
                                            name="product_cost"
                                            value="{{ old('product_cost', $product->cost ?? '') }}"
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Cost *</label>
                                        <input type="number" class="form-control" name="product_selling_cost" value="{{ old('product_selling_cost', $product->product_selling_cost ?? '') }}">

                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <!-- Product Barcode -->
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="barcode">Product Barcode:</label>
                                        <input type="text"
                                            class="form-control @error('barcode') is-invalid @enderror"
                                            id="barcode" name="barcode"
                                            value="{{ old('barcode', $product->barcode ?? '') }}"
                                            placeholder="Scan or Enter Barcode"
                                            required>
                                        @error('barcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Unit *</label>
                                        <select id="unit" name="unit" class="form-control">
                                            <option value="">Select Unit</option>
                                            <option value="dozen" {{ old('unit', $product->unit ?? '') == 'dozen' ? 'selected' : '' }}>Dozen</option>
                                            <option value="carton" {{ old('unit', $product->unit ?? '') == 'carton' ? 'selected' : '' }}>Carton</option>
                                            <option value="bag" {{ old('unit', $product->unit ?? '') == 'bag' ? 'selected' : '' }}>Bag</option>
                                            <option value="kg" {{ old('unit', $product->unit ?? '') == 'kg' ? 'selected' : '' }}>Kg</option>
                                            <option value="pieces" {{ old('unit', $product->unit ?? '') == 'pieces' ? 'selected' : '' }}>Pieces</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- special -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Special *</label>
                                        <select id="special" name="special" class="form-control">
                                            <!-- <option value="">Select</option> -->
                                            <option value="normal" {{ old('unit', $product->unit ?? '') == 'normal' ? 'selected' : '' }}>Normal</option>
                                            <option value="special" {{ old('unit', $product->unit ?? '') == 'special' ? 'selected' : '' }}>Special</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Quantity *</label>
                                        <input type="text"
                                            class="form-control"
                                            placeholder="Enter Quantity"
                                            name="product_quantity"
                                            value="{{ old('product_quantity', $product->quantity ?? '') }}"
                                            required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file"
                                            class="form-control image-file"
                                            name="image"
                                            accept="image/*">
                                    </div>
                                    @if(isset($product) && $product->image)
                                    <div>
                                        <img src="{{ asset('uploads/' . $product->image) }}" width="100" alt="Product Image">
                                    </div>
                                    @endif
                                </div>

                                <!-- Description / Product Details -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description / Product Details</label>
                                        <textarea class="form-control" name="product_details" rows="4">{{ old('product_details', $product->description ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mr-2">{{ isset($product) ? 'Update Product' : 'Add Product' }}</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            let category_id = $(this).val();

            if (category_id) {
                $.ajax({
                    url: '{{ route("get.subcategories") }}',
                    type: 'GET',
                    data: {
                        category_id: category_id
                    },
                    success: function(response) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="">Select Subcategory</option>');

                        if (response.length > 0) {
                            $.each(response, function(index, subcategory) {
                                $('#sub_category_id').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                            });
                        } else {
                            $('#sub_category_id').append('<option value="">No Subcategories Available</option>');
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            } else {
                $('#sub_category_id').empty();
                $('#sub_category_id').append('<option value="">Select Subcategory</option>');
            }
        });
    });
</script>
<script>
    document.getElementById('barcode').focus();
</script>
@include('admin.include.footer')