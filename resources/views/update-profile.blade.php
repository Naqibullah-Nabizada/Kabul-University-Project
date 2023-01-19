@extends('layouts.master')

@section('head-tag')
    <title>صفحه ویرایش پروفایل</title>
@endsection

@section('content')
    <section>
        <h2 class="col-12 mx-auto text-center p-3 mt-4">تحقیقات علمی پوهنتون کابل</h2>

        <div class="d-flex mx-auto">
            <div class="col-4 mx-auto p-3 my-3">
                <h3 class="text-center pt-5 pb-3">صفحه ویرایش پروفایل</h3>
                <form action="{{ route('update.profile.store') }}" method="POST" class="p-3 border rounded">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="form-label">ایمیل</label>
                        <input type="text" name="email" class="form-control mb-3" placeholder="ایمیل"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">رمز عبور قبلی</label>
                        <input type="password" name="old_password" class="form-control mb-3" placeholder="رمز عبور قبلی">
                        @error('old_password')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">رمز عبور جدید</label>
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

            <div class="col-6">
                <img src="{{ asset('assets/images/login.svg') }}" class="img-fluid w-75">
            </div>
        </div>
    </section>
@endsection
