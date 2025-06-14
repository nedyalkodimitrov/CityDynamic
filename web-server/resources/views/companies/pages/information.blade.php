@extends('companies.layouts.master')

@section('title')
    Панел за компания
@endsection

@section("content")
    <div class="col-12">
        <h2>Информация за компанията</h2>
    </div>
    <form class="col-12 row mb-3" method="post" action="{{route('company.saveInformation')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-12 text-center">
            <label for="profileImage">Профилна снимка</label>
            <div class="profile-image-wrapper mb-3">
                <img
                    src="{{ $company->profile_photo ?? 'default-profile.png' }}"
                    alt="Profile Image"
                    id="profileImagePreview"
                    class="rounded-circle"
                    style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;"
                    onclick="document.getElementById('profileImageInput').click();"
                >
            </div>
            <input
                type="file"
                id="profileImageInput"
                name="profileImage"
                class="d-none"
                onchange="previewProfileImage(event)">
        </div>

        <!-- Add this script block right before the closing body tag or in a dedicated JS file -->

        <div>{{$company->name}}</div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Име</label>
            <input type="text" class="form-control" name="name" disabled value="{{$company->name}}">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Година на основаване</label>
            <input type="date" class="form-control" name="foundedAt" value="{{$company->founded_at}}">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Кратък текст</label>
            <input type="text" class="form-control" name="description" value="{{$company->description}}">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Имейл за контакт</label>
            <input type="email" class="form-control" name="contactEmail" value="{{$company->contact_email}}">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Телефон за контакт</label>
            <input type="text" class="form-control" name="contactPhone" value="{{$company->contact_phone}}">
        </div>
        <div class="form-group col-12">
            <label for="exampleInputEmail1">Седалище </label>
            <input type="text" class="form-control" name="contactAddress" value="{{$company->contact_address}}">
        </div>
        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif

        <input type="submit" class="btn btn-primary" value="Запамети">
    </form>

    <script>
        function previewProfileImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('profileImagePreview');
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
