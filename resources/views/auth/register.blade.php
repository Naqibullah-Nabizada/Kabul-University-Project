@extends('layouts.master')

@section('head-tag')
    <title>صفحه ثبت نام</title>
@endsection

@section('content')
    <section>
        <header id="logout-page-header">
            <div>
                <h5 class="col-12 mx-auto text-center mt-4">ریاست پوهنتون کابل</h5>
                <h5 class="col-12 mx-auto text-center">معاونیت امور علمی</h5>
                <h5 class="col-12 mx-auto text-center">آمریت تحقیقات و مجله علمی</h5>
                <h5 class="col-12 mx-auto text-center">سیستم ثبت تحقیقات کادر علمی</h5>
            </div>
        </header>
        <hr>
        <div class="d-flex mx-auto">
            <div class="col-10 col-md-4 mx-auto p-md-3 my-md-5 border rounded">
                <h5 class="text-center pb-3">صفحه ثبت نام</h5>
                <form action="{{ route('register.store') }}" method="POST" class="p-3 border rounded">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" class="form-control mb-3" placeholder="ایمیل"
                            value="{{ old('email') }}" autofocus>
                        @error('email')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control mb-3" placeholder="رمز عبور">
                        @error('password')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control mb-3"
                            placeholder="تکرار رمز عبور">
                        @error('password_confirmation')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="submit" value="ثبت نام" class="btn btn-primary">
                </form>
            </div>

            <div class="col-6 d-none d-md-block" style="margin: 0 5rem; width: 48%;">
                <img src="{{ asset('assets/images/IMG_6342.JPG') }}" class="img-thumbnail">
            </div>
        </div>
    </section>
@endsection
