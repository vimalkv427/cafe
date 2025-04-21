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
                            <h4 class="card-title">Manage Permissions for {{ $user->name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('update.permissions', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @foreach ($availablePermissions as $permission)
                                    <div class="col-md-6">
                                        <div class="form-group form-check">
                                            <input 
                                                type="checkbox" 
                                                name="permissions[]" 
                                                value="{{ $permission }}" 
                                                id="permission_{{ $permission }}"
                                                class="form-check-input"
                                                @if(in_array($permission, $user->permissions->pluck('permission')->toArray())) checked @endif
                                            >
                                            <label class="form-check-label" for="permission_{{ $permission }}">
                                                {{ ucwords(str_replace('_', ' ', $permission)) }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update Permissions</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.include.footer')