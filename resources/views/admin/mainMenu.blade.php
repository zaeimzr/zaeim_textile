@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-صفحه اصلی"}}
@endsection
@section('content')
    <div class="bg-light  mb-2">
        <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">پنل مدیریت</li>
            </ol>
        </nav>
    </div>
    <div class="alert alert-info" role="alert">
        {{auth()->user()->name}} به پنل مدیریت خوش آمدید
    </div>
@endsection
