@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-ویرایش کد پارچه"}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.fabric')}}">لیست پارچه ها</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product',$product->fabric->id)}}">لیست کد ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ویرایش کد </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ویرایش دسته بندی</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.product.update',$product->id)}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">عنوان پارچه</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"  class=" form-control @error('title') is-invalid @enderror" name="title" value="{{ $product->fabric->title }}" required autocomplete="name" autofocus disabled>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="color_code" class="col-md-4 col-form-label text-md-end">کد رنگ</label>

                                <div class="col-md-6">
                                    <input id="color_code" type="text"  class="disabled form-control @error('color_code') is-invalid @enderror" name="color_code" value="{{ $product->color_code }}" required autocomplete="name" autofocus>

                                    @error('color_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="capacity" class="col-md-4 col-form-label text-md-end">ظرفیت (متر)</label>

                                <div class="col-md-6">
                                    <input id="capacity" type="text"  class="disabled form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ $product->capacity }}" required autocomplete="name" autofocus>

                                    @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">قیمت(ریال)</label>

                                <div class="col-md-6">
                                    <input id="price" type="text"  class="disabled form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="name" autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="color_hex" class="col-md-4 col-form-label text-md-end">کد 8 رقمی رنگ</label>
                                <div class="col-md-1">
                                    <input type="color" class="form-control form-control-color" id="color_hex" value="{{$product->color_hex}}" name="color_hex" title="color_hex">
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
