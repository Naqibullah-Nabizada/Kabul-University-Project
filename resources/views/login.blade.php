@extends('layouts.master')

@section('head-tag')
    <title>صفحه ورود</title>
@endsection

@section('content')
    <section>
        <header>
            {{-- <div class="col-1">
                <img src="{{ asset('assets/images/ku-logo.jpg') }}">
            </div> --}}
            <div>
                <h5 class="col-12 mx-auto text-center mt-4">ریاست پوهنتون کابل</h5>
                <h5 class="col-12 mx-auto text-center">معاونیت امور محصلان</h5>
                <h5 class="col-12 mx-auto text-center">آمریت تحقیقات و مجله علمی</h5>
                <h5 class="col-12 mx-auto text-center">سیستم ثبت تحقیقات کادر علمی</h5>
            </div>
            {{-- <div class="col-1">
                <img src="{{ asset('assets/images/ku-logo.jpg') }}">
            </div> --}}
        </header>

        <div class="d-flex mx-auto">
            <div class="col-4 mx-auto p-3 my-3 border shadow">
                <h5 class="text-center pt-3 pb-3">صفحه ورود</h5>
                <form action="{{ route('login.store') }}" method="POST" class="p-3 border rounded">
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

                    <input type="submit" value="ورود" class="btn btn-primary">
                </form>
            </div>

            {{-- <div class="col-6">
                <img src="{{ asset('assets/images/login.svg') }}" class="img-fluid w-75">
            </div> --}}
        </div>
    </section>
@endsection
