@include('admin.include.header')
@include('admin.include.sidebar')
@include('admin.include.navbar')

<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">
                                {{ isset($subcategory) ? 'Edit Subcategory' : 'Add Subcategory' }}
                            </h4>
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


                    <div class="card-body">
                        <form action="{{ isset($subcategory) ? route('subcategories.update', $subcategory->id) : route('subcategories.store') }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @if(isset($subcategory))
                            @method('PUT') <!-- Use PUT method for update -->
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subcategory Name *</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $subcategory->name ?? '') }}"
                                            placeholder="Enter Subcategory Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category *</label>
                                        <select name="category_id" class="form-control" required>
                                            <option value="">Choose Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (isset($subcategory) && $subcategory->category_id == $category->id) ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subcategory Image</label>
                                        <input type="file" name="image" class="form-control image-file">
                                    </div>
                                    @if(isset($subcategory) && $subcategory->image)
                                    <img src="{{ asset('uploads/subcategories/' . $subcategory->image) }}" width="100" alt="Subcategory Image">
                                    @endif
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ isset($subcategory) ? 'Update Subcategory' : 'Add Subcategory' }}
                            </button>
                            <a href="{{ route('subcategories.index') }}">
                                <button type="button" class="btn btn-danger">Back</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.include.footer')