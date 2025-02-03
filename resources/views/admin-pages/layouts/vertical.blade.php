<!DOCTYPE html>
<html lang="en" @yield('html-attribute')>

<head>
    @include('admin-pages.layouts.partials/title-meta')

    @include('admin-pages.layouts.partials/head-css')
</head>

<body>

    <div class="app-wrapper">

        @include('admin-pages.layouts.partials/sidebar')

        @include('admin-pages.layouts.partials/topbar')

        <div class="page-content">

            <div class="container-fluid">

                @yield('content')

            </div>

            @include('admin-pages.layouts.partials/footer')
        </div>

    </div>

    @include('admin-pages.layouts.partials/vendor-scripts')

</body>

</html>