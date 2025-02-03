@extends('admin-pages.layouts.vertical', ['subtitle' => 'Form Validation'])

@section('content')
@include('admin-pages.layouts.partials/page-title', ['title' => 'Template Management', 'subtitle' => 'Create'])

<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            Upload New Template
        </h5>
        <p class="card-subtitle">Fill all and make sure uploaded right file.</p>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <form class="was-validated">
                <div class="col-md-4 position-relative">
                    <label class="form-label">Template Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>

                <div class="col-md-4 position-relative">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" >Template File</label>
                    <input type="file" class="form-control" aria-label="file example" id="template-link" accept=".html, .php" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" >Preview File</label>
                    <input type="file" class="form-control" aria-label="file example" id="template-preview" accept=".png, .jpg, .jpeg" required>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row" id="template-list">

</div>
@endsection

@section('scripts')
@vite(['resources/js/admin-pages/managetemplate.js'])
@endsection