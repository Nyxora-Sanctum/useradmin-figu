@extends('admin-pages.layouts.vertical', ['subtitle' => 'Grid JS'])

@section('css')
@vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')

@include('admin-pages.layouts.partials/page-title', ['title' => 'Tables', 'subtitle' => 'Grid JS'])




@endsection

@section('scripts')
@vite(['resources/js/admin-pages/invoices.js'])
@endsection