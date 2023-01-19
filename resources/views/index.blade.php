@extends('layouts.master')
@section('head-tag')
    <title>تحقیقات علمی پوهنتون کابل</title>
@endsection

@section('content')
    <section id="main-page">
        <header id="main-page-header">
            <div>
                <h5 class="col-12 mx-auto text-center mt-4">ریاست پوهنتون کابل</h5>
                <h5 class="col-12 mx-auto text-center">معاونیت امور علمی</h5>
                <h5 class="col-12 mx-auto text-center">آمریت تحقیقات و مجله علمی</h5>
                <h5 class="col-12 mx-auto text-center">سیستم ثبت تحقیقات کادر علمی</h5>
            </div>
        </header>
        <hr>
        <div class="d-flex justify-content-around">

            <div class="col-10 col-lg-2 d-lg-flex flex-lg-column my-auto" id="sidebar">

                <form action="{{ route('logout') }}" method="POST" class="mx-4 mt-4" id="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger"><i
                            class="fa fa-arrow-alt-circle-right mx-2"></i>خروج</button>
                    <a href="{{ route('update.profile.edit') }}" class="btn btn-sm btn-outline-primary"><i
                            class="fa fa-user px-2"></i>ویرایش پروفایل</a>
                </form>

                <a href="{{ route('researcher.index') }}" class="btn btn-outline-dark mb-3" id="main-page-links">لیست تحقیق کننده گان</a>
                <a href="{{ route('faculty.index') }}" class="btn btn-outline-dark mb-3" id="main-page-links">لیست پوهنځی ها</a>
                <a href="{{ route('position.index') }}" class="btn btn-outline-dark mb-3" id="main-page-links">لیست رتبه های علمی</a>
            </div>

            <div class="col-log-7 d-none d-lg-block">
                <img src="{{ asset('assets/images/IMG_6342.JPG') }}" class="img-thumbnail"
                    style="width: 100%; height: 68vh; object-fit: cover">
            </div>
        </div>
    </section>
@endsection
