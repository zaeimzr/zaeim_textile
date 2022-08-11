@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-دسته بندی پارچه ها"}}
@endsection
@section('content')
    <div class="bg-light  mb-2">
        <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                <li class="breadcrumb-item active" aria-current="page">دسته بندی پارچه ها</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 g-2" >
        <a href="{{ route('admin.category.create')}}" class="btn btn-primary waves-effect waves-light mb-2">ایجاد دسته بندی جدید</a>
        @include('admin.layouts.massages')
        <div class="card m-b-30">
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead >
                        <tr class="bg-light">
                            <th>نام و جنس</th>
                            <th>توضیحات</th>
                            <th>اعمال تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)

                            <tr class`>

                                <th scope="row">{{$category->title}}</th>
                                <th scope="row">{{$category->description}}</th>


                                <td>
                                    <a href="{{ route('admin.category.edit',$category->id)}}" class="badge badge-success">ویرایش</a>
                                    <a href="{{ route('admin.category.delete',$category->id)}}"
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
