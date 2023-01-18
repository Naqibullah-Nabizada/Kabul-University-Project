@extends('layouts.master')

@section('head-tag')
    <title>صفحه ثبت نام</title>
@endsection

@section('content')
    <section>
        <h2 class="col-12 mx-auto text-center p-3 mt-4">تحقیقات علمی پوهنتون کابل</h2>

        <div class="d-flex mx-auto">
            <div class="col-4 mx-auto p-3 my-3">
                <h3 class="text-center pt-5 pb-3">صفحه ثبت نام</h3>
                <form action="{{ route('register.store') }}" method="POST" class="p-3 border rounded">
                    @csrf
                    <div>
                        <input type="text" name="email" class="form-control mb-3" placeholder="ایمیل"
                            value="{{ old('email') }}">
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
                    <div>
                        <input type="password" name="password_confirmation" class="form-control mb-3"
                            placeholder="تکرار رمز عبور">
                        @error('password_confirmation')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" value="ثبت نام" class="btn btn-primary">
                </form>
            </div>

            <div class="col-6">
                <img src="{{ asset('assets/images/login.svg') }}" class="img-fluid w-75">
            </div>
        </div>
    </section>
@endsection
