@extends('admin-pages.layouts.vertical', ['subtitle' => 'Editor'])

@section('css')
@vite(['node_modules/gridjs/dist/theme/mermaid.min.css'])
@endsection

@section('content')

@include('admin-pages.layouts.partials/page-title', ['title' => 'Template Management', 'subtitle' => 'Edit'])

<div class="card-body">
    <div class="mb-3">
        <form class="was-validated">
            <div class="col-md-4 position-relative">
                <label class="form-label">Template Name</label>
                <input type="text" class="form-control" id="name">
            </div>

            <div class="col-md-4 position-relative">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" id="price">
            </div>

            <div class="mb-3">
                <label class="form-label">Template File</label>
                <input type="file" class="form-control" id="template-link" accept=".html, .php">
                <small id="template-file-info" class="text-muted"></small>
            </div>

            <div class="mb-3">
                <label class="form-label">Preview File</label>
                <input type="file" class="form-control" id="template-preview" accept=".png, .jpg, .jpeg">
                <small id="preview-file-info" class="text-muted"></small>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save Changes</button>
                <button class="btn btn-secondary" type="button" id="cancel-button">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    const managementRoute = '{{ route('secondAdmin', ['user-management', 'manage-template']) }}';
</script>

@endsection

@section('scripts')
@vite(['resources/js/admin-pages/template-table-editor.js'])
@endsection