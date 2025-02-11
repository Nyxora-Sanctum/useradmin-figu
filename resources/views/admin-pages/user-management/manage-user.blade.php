@extends('admin-pages.layouts.vertical', ['subtitle' => 'Account Management'])

@section('css')
@vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')

@include('admin-pages.layouts.partials/page-title', ['title' => 'Management', 'subtitle' => 'Accounts'])

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Accounts Management Table</h5>
        <p class="text-muted mb-0">
        </p>
    </div>
    <div class="card-body">
        <div id="table-search"></div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Inventory</h5>
        <p class="text-muted mb-0">
        </p>
    </div>
    <div class="card-body" id="inventory-table">
        <div id="table-search" class="inventory-table"></div>
        <p class="text-muted mb-0">Please select one of the user</p>
    </div>
    <div class="card-body" id="inventory-table">
        <div id="table-search" class="used-table"></div>
        <p class="text-muted mb-0">Please select one of the user</p>
    </div>
</div>
</dv>

<div class="toast-container position-fixed end-0 top-0 p-3">
    <div id="InventoryLoaded" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <div class="auth-logo me-auto">
                <img class="logo-dark" src="/images/logo-dark.png" alt="logo-dark" height="18" />
                <img class="logo-light" src="/images/logo-light.png" alt="logo-light"
                    height="18" />
            </div>
            <small class="text-muted">2 seconds ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Inventory Loaded
        </div>
    </div>
</div>


@section('scripts')
<script>
    const manageUserUrl = "{{ route('fourthAdmin', ['user-management', 'table-editor', 'user-table-editor', 'id-from-table']) }}";
</script>

@endsection

@vite(['resources/js/admin-pages/manageuser.js'])
@endsection