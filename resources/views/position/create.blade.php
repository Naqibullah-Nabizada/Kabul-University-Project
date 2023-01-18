@extends('layouts.master')

@section('head-tag')
    <title>اضافه نمودن رتبه علمی جدید</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto">
            <div class="col-3 mx-auto mb-3">
                <h3 class="text-center pt-5 pb-3">اضافه نمودن رتبه علمی جدید</h3>
                <hr>
                <form action="{{ route('position.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                        placeholder="نام رتبه علمی">
                    @error('name')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                    <input type="submit" class="btn btn-success" value="اضافه کردن">
                    <a href="{{ route('position.index') }}" class="btn btn-secondary">بازگشت</a>
                </form>
            </div>

            <div class="col-6 mt-5" style="margin: 0 5rem">
                <img src="{{ asset('assets/images/img (3).jpg') }}" class="img-thumbnail w-100">
            </div>
        </div>
    </section>
@endsection
