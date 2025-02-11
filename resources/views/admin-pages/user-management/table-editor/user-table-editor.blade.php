@extends('admin-pages.layouts.vertical', ['subtitle' => 'Editor'])

@section('css')
@vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')

@include('admin-pages.layouts.partials/page-title', ['title' => 'Management', 'subtitle' => 'Accounts'])

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit User Information</h5>
        <p class="card-subtitle"></p>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <form id="userForm" class="was-validated">
                <div class="col-md-4 position-relative">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="username" required>
                </div>

                <div class="col-md-4 position-relative">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="col-md-4 position-relative">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" required>
                </div>

                <div class="col-md-4 position-relative">    
                    <label for="phone-number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone-number" name="phone_number" required>
                </div>

                <div class="col-md-4 position-relative">
                    <label for="address" class="form-label">Addressing</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <button type="button" class="btn btn-primary" id="submit" type="submit">
                    Save Changes
                </button>

            </form>
        </div>
    </div>
</div>

<script>
    const managementRoute = '{{ route('secondAdmin', ['user-management', 'manage-user']) }}';
</script>

@endsection

@section('scripts')
@vite(['resources/js/admin-pages/user-table-editor.js'])
@endsection