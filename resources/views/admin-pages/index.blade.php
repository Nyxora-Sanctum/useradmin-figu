@extends('admin-pages.layouts.vertical', ['subtitle' => 'Dashboard'])

@section('content')

    @include('layouts.partials/page-title', ['title' => 'Figu', 'subtitle' => 'Dashboard'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Users</p>
                            <h3 class="text-dark mt-2 mb-0" id="total-users"></h3>
                        </div>

                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="solar:users-group-two-rounded-broken"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart01"></div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Incomes</p>
                            <h3 class="text-dark mt-2 mb-0" id="total-incomes"></h3>
                        </div>

                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="solar:globus-outline"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart02"></div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Orders</p>
                            <h3 class="text-dark mt-2 mb-0" id="total-orders"></h3>
                        </div>

                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="solar:cart-5-broken"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart03"></div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-0 text-truncate">Templates</p>
                            <h3 class="text-dark mt-2 mb-0" id="total-templates"></h3>
                        </div>

                        <div class="col-6">
                            <div class="ms-auto avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="solar:pie-chart-2-broken"
                                    class="fs-32 avatar-title text-primary"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart04"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">New Accounts</h4>
                    <a href="{{ route('secondAdmin', ['user-management', 'manage-user']) }}" class="btn btn-sm btn-light">
                        View All
                    </a>
                </div>
                <!-- end card-header-->
                <div class="card-body pb-1">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-centered">
                            <thead>
                                <th class="py-1">ID</th>
                                <th class="py-1">Date</th>
                                <th class="py-1">Username</th>
                                <th class="py-1">Email</th>
                                <th class="py-1">Gender</th>
                            </thead>
                            <tbody id="new-user-tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card-->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        Recent Transactions
                    </h4>

                    <a href="{{ route('secondAdmin', ['user-management', 'manage-transaction']) }}" class="btn btn-sm btn-light">
                        View All
                    </a>
                </div>
                <!-- end card-header-->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 table-centered">
                            <thead>
                                <th class="py-1">Order ID</th>
                                <th class="py-1">Date</th>
                                <th class="py-1">Amount</th>
                                <th class="py-1">Status</th>
                                <th class="py-1">
                                    ID
                                </th>
                            </thead>
                            <tbody id="recent-transaction-tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@section('scripts')
@vite(['resources/js/admin-pages/dashboard.js'])
@endsection