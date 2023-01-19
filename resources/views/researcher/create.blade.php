@extends('layouts.master')

@section('head-tag')
    <title>اضافه نمودن تحقیق کننده جدید</title>
@endsection

@section('content')
    <section>

        <div class="d-flex mx-auto">

            <div>

                <h4 class="text-center p-3">اضافه نمودن تحقیق کننده جدید</h4>
                <hr>
                <form action="{{ route('researcher.store') }}" method="POST" class="d-flex flex-wrap col-11 mx-auto"
                    id="researcher-form" enctype="multipart/form-data">
                    @csrf
                    <div class="col-4">
                        <label class="form-label">نام</label>
                        <input type="text" name="firstname"
                            class="form-control mb-2 @error('firstname') is-invalid @enderror" placeholder="نام"
                            value="{{ old('firstname') }}">
                        @error('firstname')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">تخلص</label>
                        <input type="text" name="lastname"
                            class="form-control mb-2 @error('lastname') is-invalid @enderror" placeholder="تخلص"
                            value="{{ old('lastname') }}">
                        @error('lastname')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">پوهنځی</label>
                        <select name="faculty_id" class="form-control mb-2" id="faculty">
                            <option>انتخاب پوهنځی</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}" data-url="{{ route('getDepartment', $faculty->id) }}">
                                    {{ $faculty->name }}</option>
                            @endforeach
                        </select>
                        @error('faculty_id')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">دیپارتمنت</label>
                        <select name="department_id" class="form-control mb-2" id="department">
                            <option>انتخاب دیپارتمنت</option>
                        </select>
                        @error('department_id')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">عنوان موضوع</label>
                        <input type="text" name="research_title"
                            class="form-control mb-2 @error('research_title') is-invalid @enderror"
                            placeholder="عنوان موضوع" value="{{ old('research_title') }}">
                        @error('research_title')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">فایل pdf</label>
                        <input type="file" name="pdf_file" class="form-control mb-2">
                        @error('pdf_file')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">رتبه علمی فعلی</label>
                        <select name="old_position_id" class="form-control mb-2">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">ارتقا به</label>
                        <select name="new_position_id" class="form-control mb-2">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">پروتوکول</label>
                        <select name="protocol" class="form-control mb-2">
                            @for ($i = 1; $i < 501; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-4">
                        <label class="form-label">آثار علمی تحقیق</label>
                        <textarea name="scientific_research_works" rows="7"
                            class="form-control mb-2 @error('research_title') is-invalid @enderror" placeholder="آثار علمی تحقیق">{{ old('scientific_research_works') }}</textarea>
                        @error('scientific_research_works')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">پیشنهاد تعیین موضوع</label>
                        <textarea name="proposal_determine_topic" rows="7"
                            class="form-control @error('research_title') is-invalid @enderror" placeholder="پیشنهاد تعیین موضوع">{{ old('proposal_determine_topic') }}</textarea>
                        @error('proposal_determine_topic')
                            <p class="text-danger my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label class="form-label">موضوع تائیدی</label>
                        <div>
                            <label class="form-label">عدم تائید</label>
                            <input type="radio" name="agreement" value="0" checked>

                            <label class="form-label">تائید</label>
                            <input type="radio" name="agreement" value="1">
                        </div>
                    </div>

                    <div class="mx-auto my-2">
                        <input type="submit" class="btn btn-success" value="اضافه کردن">
                        <a href="{{ route('researcher.index') }}" class="btn btn-secondary">بازگشت</a>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#faculty').change(function() {
                let element = $('#faculty option:selected');
                let url = element.attr('data-url');

                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(response) {
                        console.log(response);
                        if (response.status) {
                            let departments = response.departments;
                            $('#department').empty();
                            departments.map((department) => {
                                $('#department').append($('<option/>').val(department
                                    .id).text(department.name));
                            });
                        } else {
                            console.log(error);

                        }
                    },
                    error: function() {
                        console.log('error');
                        console.log(error);
                    }
                });

            })
        });
    </script>
@endsection
