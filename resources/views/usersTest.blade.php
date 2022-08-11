@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-لیست کاربران"}}
@endsection
@section('content')
    <div class="bg-light  mb-2">
        <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                <li class="breadcrumb-item active" aria-current="page">لیست کاربران</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 g-2" >
        @include('admin.layouts.massages')
        <div class="card m-b-30">
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead >
                        <tr class="bg-light">
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>نقش</th>
                            <th>موجودی</th>
                            <th>شماره همراه</th>
                            <th>اعمال تغییرات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @switch($user->role)
                                @case(0)
                                @php  $role="کاربر" @endphp
                                @break
                                @case(1)
                                @php  $role="مدیر" @endphp
                                @break
                            @endswitch
                            <tr class`>

                                <th scope="row">{{$user->name}}</th>
                                <td>{{$user->email}}</td>
                                <td>{{$role}}</td>
                                <td>{{$user->balance}}</td>
                                <td>{{$user->phone_number}}</td>

                                <td>
                                    <a href="{{route('admin.users.edit',$user->id)}}" class="badge badge-success">ویرایش</a>
                                    <a href="{{route('admin.users.delete',$user->id)}}"
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
        <div id="1" class="row">
            <button id="p1" type="button" class="col-md-1 btn add btn-dark">اضافه 1</button>
            <button id="l1" type="button" class="col-md-1 btn less btn-danger">کم1</button>
        </div>
        <div id="2" class="row">
        <button id="p2" type="button" class="col-md-1 btn add btn-dark">اضافه 2</button>
        <button id="l2" type="button" class="col-md-1 btn less btn-danger">کم2</button>
        </div>


        <div class="alert cardd alert-info" role="alert">
            0
        </div>


                    {{--card--}}
        <div class="card   mb-4" style="width: 35rem;">
            <div class="card-header">
               لیست خرید
            </div>
            <ul class="list-group  list-group-flush">
                <li id="item0" class="list-group-item ">
                    <div class="row text-center">
                        <div class="col-md-5 m-t-10 "> an item</div>
                        <button  type="button" class="btn btn-secondary col-md-1 btn-sm increase">+</button>
                        <div class="alert alert-secondary col-md-4 " role="alert">
                            33
                        </div>
                        <button  type="button" class="btn btn-warning col-md-1 decrease">-</button>
                    </div>
                </li>

            </ul>
            <div class="p-3 mx-4">
                <a href="#" class="btn btn-primary col-md-5 ">نهایی کردن سبد خرید</a>
                <a href="#" id="deleteList" class="btn btn-danger col-md-5">حذف همه</a>
            </div>
        </div>
        <div>s</div>
    </div>


    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/query.js')}}"></script>
@endsection
