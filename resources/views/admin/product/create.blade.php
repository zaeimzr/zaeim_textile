@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-اضافه نمودن کد جدید"}}
@endsection
@if(($product->first()) !== null)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.fabric')}}">لیست پارچه ها</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product',$product->first()->fabric->id)}}">لیست کد ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ایجاد کد جدید </li>
                    </ol>
                </nav>
                {{--           create form    --}}
                <form method="post" action="{{route('admin.product.store',$product->first()->fabric->id)}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان پارچه</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="emailHelp" value="{{ $product->first()->fabric->title}}"disabled >
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="color_code" class="form-label">کد رنگ</label>
                        <input type="text" class="form-control @error('color_code') is-invalid @enderror" name="color_code" id="color_code" aria-describedby="emailHelp" placeholder="لطفا کد رنگ را وارد کنید">
                        @error('color_code')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">ظرفیت (متر)</label>
                        <input type="text" class="form-control @error('capacity') is-invalid @enderror" name="capacity" id="color_code" aria-describedby="emailHelp" placeholder="لطفا متراژ موجود را وارد کنید">
                        @error('capacity')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">قیمت (ریال)</label>
                        <input type="text" class="form-control @error('color_code') is-invalid @enderror" name="price" id="price" aria-describedby="emailHelp" placeholder="لطفا قیمت را وارد کنید">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="color_hex" class=" form-label ">کد 8 رقمی رنگ</label>

                            <input type="color" class="form-control col-md-1 form-control-color" id="color_hex" value="#563d7c" name="color_hex" title="color_hex">

                    </div>

                    <button type="submit" class="btn btn-primary">ثبت</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@else
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.fabric')}}">لیست پارچه ها</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product',$fabricId)}}">لیست کد ها</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ایجاد کد جدید </li>
                    </ol>
                </nav>
                {{--           create form    --}}
                <form method="post" action="{{route('admin.product.store',$fabricId)}}">
                    @csrf
                    <div class="mb-3">
                        @php
                            $Title=\App\Models\Fabric::where('id', $fabricId)->first()->title;
                        @endphp
                        <label for="title" class="form-label">عنوان پارچه</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="emailHelp" value="{{ $Title}}"disabled >
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="color_code" class="form-label">کد رنگ</label>
                        <input type="text" class="form-control @error('color_code') is-invalid @enderror" name="color_code" id="color_code" aria-describedby="emailHelp" placeholder="لطفا کد رنگ را وارد کنید">
                        @error('color_code')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">ظرفیت (متر)</label>
                        <input type="text" class="form-control @error('capacity') is-invalid @enderror" name="capacity" id="color_code" aria-describedby="emailHelp" placeholder="لطفا متراژ موجود را وارد کنید">
                        @error('capacity')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">قیمت (ریال)</label>
                        <input type="text" class="form-control @error('color_code') is-invalid @enderror" name="price" id="price" aria-describedby="emailHelp" placeholder="لطفا قیمت را وارد کنید">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="color_hex" class=" form-label ">کد 8 رقمی رنگ</label>

                        <input type="color" class="form-control col-md-1 form-control-color" id="color_hex" value="#563d7c" name="color_hex" title="color_hex">

                    </div>

                    <button type="submit" class="btn btn-primary">ثبت</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@endif
