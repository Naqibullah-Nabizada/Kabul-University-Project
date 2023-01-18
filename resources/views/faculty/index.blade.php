@extends('layouts.master')

@section('head-tag')
    <title>پوهنځی</title>
@endsection

@section('content')
    <section>

        <div class="d-flex">
            <div class="col-5 mx-auto mb-3">
                <h3 class="text-center pt-5 pb-3">لیست پوهنځی های پوهنتون کابل</h3>
                <hr>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>شناسه</th>
                            <th>نام پوهنځی</th>
                            <th class="col-4"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facultis as $faculty)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $faculty->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('faculty.edit', $faculty->id) }}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete">
                                            <i class="fa fa-trash mx-1"></i>حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-2 my-auto mx-auto">
                <a href="{{ route('faculty.create') }}" class="btn btn-success w-100 mb-1 fw-bold">پوهنځی
                    جدید<i class="fa fa-plus mx-2"></i></a>
                <a href="{{ route('department.index') }}" class="btn btn-primary w-100 mb-1 fw-bold">لیست دیپارتمنت ها</a>
                <a href="{{ route('home') }}" class="btn btn-secondary w-100 mb-2">بازگشت</a>
            </div>

        </div>
    </section>
@endsection

@section('script')
    @include('alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
