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

                <div class="col-md-4 position-relative" style="margin-top: 20px;"></div>
                <div class="d-flex flex-wrap gap-2">
                    <!--     Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        Save Changes
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Do you really want to save the
                                        changes?
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Your action cannot be reverted</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="submit">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
    const managementRoute = '{{ route('second', ['user-management', 'manage-user']) }}';
</script>

@endsection

@section('scripts')
@vite(['resources/js/admin-pages/user-table-editor.js'])
@endsection