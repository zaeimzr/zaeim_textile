@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-اضافه نمودن پارچه جدید"}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.fabric')}}">لیست پارچه ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">اضافه نمودن پارچه جدید</li>
                    </ol>
                </nav>
                {{--           create form    --}}
                <form method="post" action="{{route('admin.fabric.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="emailHelp" placeholder="لطفا اسم دسته را وارد کنید">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label text-md-end">دسته بندی</label>
                        <div class=" fs-6 font-weight-light">
                            @php
                            $categories=\App\Models\Category::get();
                            @endphp
                            <select class="form-select  fs-6  " id="category_id" name="category_id" aria-label="Default select example">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </form>
            </div>
        </div>
    </div>
@endsection
