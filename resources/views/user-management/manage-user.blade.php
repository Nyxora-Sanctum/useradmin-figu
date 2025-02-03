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
    <div class="card-body">
        <p class="text-muted mb-0">Please select one of the user</p>
    </div>
</div>


<script>
    const manageUserUrl = "{{ route('fourth', ['user-management', 'table-editor', 'user-table-editor', 'id-from-table']) }}";
</script>

@endsection

@section('scripts')
@vite(['resources/js/admin-pages/manageuser.js'])
@endsection