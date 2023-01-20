@extends('layouts.master')

@section('head-tag')
    <title>ویرایش نمودن رتبه علمی جدید</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto my-5">
            <div class="col-3 mx-auto mb-3">
                <h5 class="text-center pt-5 pb-3">ویرایش نمودن رتبه علمی جدید</h5>
                <hr>
                <form action="{{ route('position.update', $position->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" class="form-control mb-3" placeholder="نام رتبه علمی"
                        value="{{ old('name', $position->name) }}">

                    <input type="submit" class="btn btn-warning" value="ویرایش کردن">
                    <a href="{{ route('position.index') }}" class="btn btn-secondary">بازگشت</a>
                </form>
            </div>

            <div class="col-6 mt-5"style="margin: 0 5rem">
                <img src="{{ asset('assets/images/IMG_6250.JPG') }}" class="img-thumbnail w-100">
            </div>
        </div>
    </section>
@endsection
