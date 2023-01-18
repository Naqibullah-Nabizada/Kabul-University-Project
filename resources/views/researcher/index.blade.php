@extends('layouts.master')

@section('head-tag')
    <title>تحقیق کننده گان</title>
@endsection

@section('content')
    <section>
        <div class="col-12 mt-4">
            <a href="{{ route('researcher.create') }}" class="btn btn-outline-success mb-1 fw-bold col-2 mx-4">تحقیق کننده
                جدید<i class="fa fa-plus mx-2"></i></a>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-1 col-1">بازگشت</a>
            <span class="h3 text-center mt-3 col-5" style="margin: 0 13rem">لیست تحقیق کننده گان</span>

            <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="form-group col-3 d-flex mx-4 my-2">
                    <input type="text" name="research_title" class="form-control" placeholder="جستجو">
                    <button type="submit" class="btn btn-outline-dark mx-2"><i class="fa fa-search"></i></button>
                </div>
                <div class="mx-4">
                    @error('research_title')
                        <p class="text-danger my-2">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </div>

        <div>

            <div class="mx-auto mb-3" style="width: 98%">

                <hr>
                <table class="table table-sm table-bordered table-responsive table-striped text-center"
                    style="font-size: .8rem;;">
                    <thead class="table-dark">
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>تخلص</th>
                            <th>پوهنځی</th>
                            <th>دیپارتمنت</th>
                            <th>رتبه علمی فعلی</th>
                            <th>ارتقا به</th>
                            <th>عنوان موضوع</th>
                            <th>فایل</th>
                            <th>موضوع تائیدی</th>
                            <th>پروتوکول</th>
                            <th>آثار علمی تحقیق</th>
                            <th>پیشنهاد تعیین موضوع</th>
                            <th class="col-1 text-center"><i class="fa fa-cogs mx-2"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($researchers as $researcher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $researcher->firstname }}</td>
                                <td class="fw-bold">{{ $researcher->lastname }}</td>
                                <td class="fw-bold">{{ $researcher->faculty->name }}</td>
                                <td class="fw-bold">{{ $researcher->department->name }}</td>
                                <td class="fw-bold">{{ $researcher->oldPosition->name }}</td>
                                <td class="fw-bold">{{ $researcher->newPosition->name }}</td>
                                <td class="fw-bold">{{ Str::limit($researcher->research_title, 25) }}</td>
                                <td class="fw-bold">{{ $researcher->pdf_file == null ? 'ندارد' : 'دارد' }}</td>
                                <td class="fw-bold">{{ $researcher->agreement == 1 ? 'تائید شده' : 'تائید نشده' }}</td>
                                <td class="fw-bold">{{ $researcher->protocol }}</td>
                                <td class="fw-bold">{{ Str::limit($researcher->scientific_research_works, 25) }}</td>
                                <td class="fw-bold">{{ Str::limit($researcher->proposal_determine_topic, 25) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('researcher.edit', $researcher->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fa fa-edit mx-1"></i></a>
                                    <form action="{{ route('researcher.destroy', $researcher->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete">
                                            <i class="fa fa-trash mx-1"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection

@section('script')
    @include('alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
