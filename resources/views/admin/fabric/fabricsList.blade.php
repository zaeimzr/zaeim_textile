@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-لیست پارچه ها "}}
@endsection
@section('content')
    <div class="bg-light  mb-2">
        <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                <li class="breadcrumb-item active" aria-current="page">لیست پارچه ها</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 g-2" >
        <a href="{{ route('admin.fabric.create')}}" class="btn btn-primary waves-effect waves-light mb-2">اضافه کردن پارچه جدید </a>
        @include('admin.layouts.massages')
        <div class="card m-b-30">
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead >
                        <tr class="bg-light">
                            <th>عنوان</th>
                            <th>دسته بندی</th>
                            <th>تصویر</th>
                            <th>اعمال تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fabrics as $fabric)

                            <tr class`>

                                <th scope="row">{{$fabric->title}}</th>
                                <th scope="row">{{$fabric->category->title}}</th>
                                <th scope="row">{{$fabric->image}}</th>


                                <td>
                                    <a href="{{ route('admin.fabric.edit',$fabric->id)}}" class="badge badge-success">ویرایش</a>
                                    <a href="{{ route('admin.fabric.delete',$fabric->id)}}"
                                       onclick="return confirm('آیا کاربر حذف شود؟');"
                                       class="badge badge-danger">حذف</a>
                                    <a href="{{route('admin.product',$fabric->id)}}" class="badge badge-info">نمایش کدها</a>
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
