<!DOCTYPE html>
<html lang="fa-IR">

<head>
    @include('layouts.head-tag')
    @yield('head-tag')
</head>

<body dir="rtl">


    <section class="body-container">

        <section id="main-body" class="main-body">

            @yield('content')

        </section>
    </section>

    @include('layouts.script')
    @yield('script')

    <div class="toast-wrapper flex-row-reverse">
        @include('alerts.toast.success')
        @include('alerts.toast.error')
    </div>

    @include('alerts.sweetalert.success')
    @include('alerts.sweetalert.error')

</body>

</html>
