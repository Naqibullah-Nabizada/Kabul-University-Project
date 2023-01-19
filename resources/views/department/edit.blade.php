@extends('layouts.master')

@section('head-tag')
    <title>ویرایش نمودن دیپارتمنت</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto">
            <div class="col-3 mx-auto mb-3">
                <h3 class="text-center pt-5 pb-3">ویرایش نمودن دیپارتمنت</h3>
                <hr>
                <form action="{{ route('department.update', $department->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="form-label">نام دیپارتمنت</label>
                        <input type="text" name="name" class="form-control mb-3 @error('name') is-invalid @enderror"
                            placeholder="نام دیپارتمنت" value="{{ old('name', $department->name) }}">
                        @error('name')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label">پوهنځی</label>
                        <select name="faculty_id" class="form-control mb-2">
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" @if (old('faculty_id', $department->faculty_id == $faculty->id)) selected @endif>
                                    {{ $faculty->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" class="btn btn-warning my-2" value="ویرایش کردن">
                    <a href="{{ route('department.index') }}" class="btn btn-secondary">بازگشت</a>
                </form>
            </div>

            <div class="col-6 mt-5"style="margin: 0 5rem">
                <img src="{{ asset('assets/images/IMG_6250.JPG') }}" class="img-thumbnail w-100">
            </div>
        </div>
    </section>
@endsection
