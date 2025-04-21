@include('superadmin.include.header')
@include('superadmin.include.sidebar')

<div class="content-page">
    <div class="container-fluid">
        <h4>Set Free Trial Days</h4>
        <form action="{{ route('master-settings.update') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="trial_days">Trial Days:</label>
                <input type="number" name="trial_days" class="form-control" value="{{ $settings->trial_days ?? 30 }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@include('superadmin.include.footer')
