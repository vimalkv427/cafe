@include('superadmin.include.header')
@include('superadmin.include.sidebar')
@include('superadmin.include.navbar')

@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Users</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Show all validation errors at the top --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="row"> 
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>    

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone No" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div> 

                                <!-- New Fields for Shop Name and Address -->
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Shop Name *</label>
                                        <input type="text" name="shop_name" class="form-control" placeholder="Enter Shop Name" value="{{ old('shop_name') }}" required>
                                        @error('shop_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address *</label>
                                        <textarea name="address" class="form-control" placeholder="Enter Address" required>{{ old('address') }}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Password *</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>  

                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Confirm Password *</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                        @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                                             
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Add User</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('superadmin.include.footer')
