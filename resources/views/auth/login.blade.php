@extends('layouts.master')

@section('head-tag')
    <title>صفحه ورود</title>
@endsection

@section('content')
    <section>
        <header id="logout-page-header">
            <div>
                <h5 class="col-12 mx-auto text-center mt-2 mt-md-4">ریاست پوهنتون کابل</h5>
                <h5 class="col-12 mx-auto text-center">معاونیت امور علمی</h5>
                <h5 class="col-12 mx-auto text-center">آمریت تحقیقات و مجله علمی</h5>
                <h5 class="col-12 mx-auto text-center">سیستم ثبت تحقیقات کادر علمی</h5>
            </div>
        </header>
        <hr>
        <div class="d-flex mx-auto">
            <div class="col-11 col-md-4 mx-auto p-3 my-2 my-lg-3 border rounded shadow-lg">
                <h1 class="text-center"><i class="fa fa-user-check"></i></h1>
                <h5 class="text-center pt-1 pb-3">صفحه ورود</h5>
                <form action="{{ route('login.store') }}" method="POST" class="p-3 border rounded">
                    @csrf
                    <div>
                        <input type="text" name="email" class="form-control mb-3" placeholder="ایمیل"
                            value="{{ old('email') }}" autofocus>
                        @error('email')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="password" name="password" class="form-control mb-3" placeholder="رمز عبور">
                        @error('password')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-outline-primary">ورود <i class="fa fa-arrow-alt-circle-left mx-1"></i></button>
                </form>
            </div>
            <div class="col-6 d-none d-md-block" style="margin: 0 5rem; width: 48%;">
                <img src="{{ asset('assets/images/IMG_6342.JPG') }}" class="img-thumbnail">
            </div>
        </div>
    </section>
@endsection
