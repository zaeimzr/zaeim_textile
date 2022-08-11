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
    </div>
@endsection
