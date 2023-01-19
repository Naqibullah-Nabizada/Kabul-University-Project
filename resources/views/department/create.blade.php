@extends('layouts.master')

@section('head-tag')
    <title>اضافه نمودن دیپارتمنت جدید</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto">
            <div class="col-3 mx-auto mb-3">
                <h3 class="text-center pt-5 pb-3">اضافه نمودن دیپارتمنت جدید</h3>
                <hr>
                <form action="{{ route('department.store') }}" method="POST">
                    @csrf
                    <div>
                        <label class="form-label">نام دیپارتمنت</label>
                        <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                            placeholder="نام دیپارتمنت">
                        @error('name')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">پوهنځی</label>
                        <select name="faculty_id" class="form-control mb-2">
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success my-2" value="اضافه کردن">
                    <a href="{{ route('department.index') }}" class="btn btn-secondary">بازگشت</a>
                </form>
            </div>

            <div class="col-6 mt-5" style="margin: 0 5rem">
                <img src="{{ asset('assets/images/IMG_6250.JPG') }}" class="img-thumbnail w-100">
            </div>
        </div>
    </section>
@endsection
