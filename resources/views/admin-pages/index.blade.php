@extends('admin-pages.layouts.vertical', ['subtitle' => 'Dashboard'])

@section('content')

@include('layouts.partials/page-title', ['title' => 'Darkone', 'subtitle' => 'Dashboard'])

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
                            <iconify-icon icon="solar:globus-outline"
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
                            <iconify-icon icon="solar:users-group-two-rounded-broken"
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
    <div class="col-lg-4">
        <div class="card card-height-100">
            <div class="card-header d-flex align-items-center justify-content-between gap-2">
                <h4 class=" mb-0 flex-grow-1 mb-0">Revenue</h4>
                <div>
                    <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                    <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                    <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                    <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
                </div>
            </div>

            <div class="card-body pt-0">
                <div dir="ltr">
                    <div id="dash-performance-chart" class="apex-charts"></div>
                </div>
            </div>

        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card card-height-100">
            <div class="card-header d-flex align-items-center justify-content-between gap-2">
                <h4 class="card-title flex-grow-1 mb-0">Sales By Category</h4>
                <div>
                    <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                    <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                    <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                    <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
                </div>
            </div>

            <div class="card-body">
                <div dir="ltr">
                    <div id="conversions" class="apex-charts"></div>
                </div>
                <div class="table-responsive mb-n1 mt-2">
                    <table class="table table-nowrap table-borderless table-sm table-centered mb-0">
                        <thead class="bg-light bg-opacity-50 thead-sm">
                            <tr>
                                <th class="py-1">
                                    Category
                                </th>
                                <th class="py-1">Orders</th>
                                <th class="py-1">Perc.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Grocery</td>
                                <td>187,232</td>
                                <td>
                                    48.63%
                                    <span class="badge badge-soft-success float-end">2.5% Up</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Electonics</td>
                                <td>126,874</td>
                                <td>
                                    36.08%
                                    <span class="badge badge-soft-success float-end">8.5% Up</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Other</td>
                                <td>90,127</td>
                                <td>
                                    23.41%
                                    <span class="badge badge-soft-danger float-end">10.98% Down</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive-->
            </div>

        </div> <!-- end card-->
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div
                class="d-flex card-header justify-content-between align-items-center border-bottom border-dashed">
                <h4 class="card-title mb-0">Sessions by Country</h4>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        View Data
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Download</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Import</a>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div id="world-map-markers" class="mt-3" style="height: 309px">
                </div>
            </div> <!-- end card-body-->


        </div> <!-- end card-->
    </div> <!-- end col-->

</div> <!-- End row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">New Accounts</h4>
                <a href="{{ route('second', ['user-management', 'manage-user']) }}" class="btn btn-sm btn-light">
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

                <a href="{{ route('second', ['user-management', 'manage-transaction']) }}" class="btn btn-sm btn-light">
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