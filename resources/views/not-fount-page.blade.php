@extends('layouts.master')

@section('head-tag')
    <title>صفحه پیدا نشد</title>
@endsection

@section('content')
    <section class="text-center d-flex flex-column" id="not-found-page">
        <h1 class="text-center" style="font-size: 10rem; margin-top: 7rem">404</h1>
        <h1>صفحه مورد نظر پیدا نشد.</h1>
        <h5 class="my-3">مشکلی پیش آمده و صفحه مورد نظر شما پیدا نشد، دوباره امتحان کنید!</h5>
        <div class="text-center">
            <a href="{{ route('home') }}" class="btn btn-outline-dark my-4" id="link">صفحه اصلی</a>
        </div>
    </section>
@endsection
