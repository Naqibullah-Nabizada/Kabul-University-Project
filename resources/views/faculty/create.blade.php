@extends('layouts.master')

@section('head-tag')
    <title>اضافه نمودن پوهنځی جدید</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto">
            <div class="col-3 mx-auto mb-3">
                <h3 class="text-center pt-5 pb-3">اضافه نمودن پوهنځی جدید</h3>
                <hr>
                <form action="{{ route('faculty.store') }}" method="POST">
                    @csrf
                    <div>
                        <label class="form-label">نام پوهنځی</label>
                        <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                            placeholder="نام پوهنځی">
                        @error('name')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-success" value="اضافه کردن">
                    <a href="{{ route('faculty.index') }}" class="btn btn-secondary">بازگشت</a>
                </form>
            </div>

            <div class="col-6 mt-5 mx-4">
                <img src="{{ asset('assets/images/img (3).jpg') }}" class="img-thumbnail w-100">
            </div>
        </div>
    </section>
@endsection
