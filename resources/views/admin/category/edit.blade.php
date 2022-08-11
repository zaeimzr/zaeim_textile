@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-ویرایش دسته بندی"}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.category')}}">دسته بندی پارچه ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ویرایش</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ویرایش دسته بندی</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.category.update',$category->id)}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">نام دسته بندی</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $category->title }}" required autocomplete="name" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">توضیحات</label>

                                <div class="col-md-6">
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{$category->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
