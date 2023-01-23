@extends('layouts.master')

@section('head-tag')
    <title>صفحه ویرایش پروفایل</title>
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
            <div class="col-10 col-md-4 mx-auto p-3 my-md-5 border rounded">
                <h5 class="text-center p-3">صفحه ویرایش پروفایل</h5>
                <form action="{{ route('update.profile.store') }}" method="POST" class="p-3 border rounded shadow">
                    @csrf
                    @method('PUT')
                    <div>
                        <input type="text" name="email" class="form-control mb-3" placeholder="ایمیل"
                            value="{{ old('email') }}" autofocus>
                        @error('email')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="password" name="old_password" class="form-control mb-3" placeholder="رمز عبور قبلی">
                        @error('old_password')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="password" name="new_password" class="form-control mb-3" placeholder="رمز عبور جدید">
                        @error('new_password')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="submit" value="ویرایش پروفایل" class="btn btn-sm btn-warning">
                        <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">بازگشت</a>
                    </div>

                </form>
            </div>
            <div class="col-6 d-none d-md-block" style="margin: 0 5rem; width: 48%;">
                <img src="{{ asset('assets/images/IMG_6342.JPG') }}" class="img-thumbnail">
            </div>
        </div>
    </section>
@endsection
