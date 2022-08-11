@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-ویرایش پارچه"}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.fabric')}}">لیست پارچه ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ویرایش پارچه </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ویرایش دسته بندی</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.fabric.update',$fabric->id)}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">عنوان پارچه</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $fabric->title }}" required autocomplete="name" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="category_id" class="col-md-4 form-label text-md-end pt-2">دسته بندی</label>
                                <div class=" col-md-6 fs-6 font-weight-light">
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

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        ویرایش
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
