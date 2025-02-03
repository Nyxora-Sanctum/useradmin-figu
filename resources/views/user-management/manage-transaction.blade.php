@extends('admin-pages.layouts.vertical', ['subtitle' => 'Grid JS'])

@section('css')
@vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')

@include('admin-pages.layouts.partials/page-title', ['title' => 'Tables', 'subtitle' => 'Transaction Management'])


<div class="card">
    <div class="card-header">
        <h5 class="card-title">Transactions Management</h5>
        <p class="text-muted mb-0">
        </p>
    </div>
    <div class="card-body">
        <div id="table-search"></div>
    </div>
</div>

@endsection

@section('scripts')
@vite(['resources/js/admin-pages/transactions.js'])
@endsection