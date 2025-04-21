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
                                {{ isset($category) ? 'Edit Category' : 'Add Category' }}
                            </h4>
                        </div>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            document.getElementById('successMessage').style.display = 'none';
                        }, 3000); // Hide after 3 seconds
                    </script>
                    @endif

                    <div class="card-body">
                        <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                            method="POST">
                            @csrf
                            @if(isset($category))
                            @method('PUT') <!-- Use PUT method for update -->
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <input type="text" name="category_name" class="form-control"
                                            value="{{ old('category_name', $category->category_name ?? '') }}"
                                            placeholder="Enter Category Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Code *</label>
                                        <input type="text" class="form-control" name="code"
                                            value="{{ old('code', $category->code ?? '') }}"
                                            placeholder="Enter Code" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ isset($category) ? 'Update Category' : 'Add Category' }}
                            </button>
                            <a href="{{ route('categories.index') }}">
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