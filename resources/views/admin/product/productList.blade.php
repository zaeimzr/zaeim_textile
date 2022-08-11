@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-لیست کد ها "}}
@endsection
@if(($products->first()) !== null)
@section('content')
    <div class="bg-light  mb-2">
        <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.fabric')}}">لیست پارچه ها</a></li>
                <li class="breadcrumb-item active" aria-current="page">لیست کدها</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 g-2" >
        <a href="{{route('admin.product.create',$products->first()->fabric->id)}}" class="btn btn-primary waves-effect waves-light mb-2">اضافه کردن پارچه جدید </a>
        @include('admin.layouts.massages')
        <div class="card m-b-30">
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead >
                        <tr class="bg-light">
                            <th>عنوان</th>
                            <th>کد رنگ</th>
                            <th>ظرفیت به متر</th>
                            <th>قیمت</th>
                            <th>کد 8 رقمی رنگ</th>
                            <th>اعمال تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)

                            <tr class`>

                                <th scope="row ">{{$product->fabric->title}}</th>
                                <th scope="row">{{$product->color_code}}</th>
                                <th scope="row">{{$product->capacity}}</th>
                                <th scope="row">{{$product->price}}</th>
                                <th scope="row"  >
                                    <div class="w-50" style=" background:{{$product->color_hex}}">
                                        {{$product->color_hex}}
                                    </div>
                                </th>


                                <td>
                                    <a href="{{route('admin.product.edit',$product->id)}}" class="badge badge-success">ویرایش</a>
                                    <a href="{{route('admin.product.delete',$product->id)}}"
                                       onclick="return confirm('آیا کاربر حذف شود؟');"
                                       class="badge badge-danger">حذف</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
@section('content')
    <div class="bg-light  mb-2">
        <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.fabric')}}">لیست پارچه ها</a></li>
                <li class="breadcrumb-item active" aria-current="page">لیست کدها</li>
            </ol>
        </nav>
    </div>
        <div class="col-lg-12 g-2" >
            <a href="{{route('admin.product.create',$fabricId)}}" class="btn btn-primary waves-effect waves-light mb-2">اضافه کردن پارچه جدید </a>

            <div class="alert alert-dark" role="alert">
            @php
                $fabric=\App\Models\Fabric::where('id', $fabricId)->first()->title;
            @endphp
            هیچ کدی از  پارچه {{ $fabric }}   وجود ندارد

        </div>
    </div>
@endsection

@endif
