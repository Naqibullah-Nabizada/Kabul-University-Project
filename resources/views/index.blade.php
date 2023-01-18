@extends('layouts.master')
@section('head-tag')
    <title>تحقیقات علمی پوهنتون کابل</title>
@endsection

@section('content')
    <section id="main-page">
        <div class="d-flex mx-auto">
            <form action="{{ route('logout') }}" method="POST" class="col-2 mx-4 mt-4">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger"><i
                        class="fa fa-arrow-alt-circle-right mx-2"></i>خروج</button>
                <a href="{{ route('update.profile.edit') }}" class="btn btn-sm btn-outline-primary"><i
                        class="fa fa-user px-2"></i>ویرایش پروفایل</a>
            </form>
            <h1 class="p-3 text-center col-8">تحقیقات علمی پوهنتون کابل</h1>
        </div>
        <hr>
        <div class="d-flex justify-content-around">

            <div class="col-2 d-flex flex-column mx-5 my-auto">
                <a href="{{ route('researcher.index') }}" class="btn btn-outline-dark mb-3">لیست تحقیق کننده گان</a>
                <a href="{{ route('faculty.index') }}" class="btn btn-outline-dark mb-3">لیست پوهنځی ها</a>
                <a href="{{ route('position.index') }}" class="btn btn-outline-dark mb-3">لیست رتبه های علمی</a>
            </div>

            <div class="col-8">
                <img src="{{ asset('assets/images/image.jpg') }}" class="img-thumbnail" style="width: 90%">
            </div>
        </div>
    </section>
@endsection
