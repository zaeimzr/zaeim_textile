@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-ایجاد دسته بندی جدید"}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.category')}}">لیست دسته بندی ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">لیجاد دسته بندی جدید</li>
                    </ol>
                </nav>
                {{--           create form    --}}
                <form method="post" action="{{route('admin.category.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">نام</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="emailHelp" placeholder="لطفا اسم دسته را وارد کنید">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">توضیحات</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" style="height: 5rem" ></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </form>
            </div>
        </div>
    </div>
@endsection
