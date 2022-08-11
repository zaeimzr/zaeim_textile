@extends('admin.layouts.masteradmin')
@section('title')
    {{"پنل مدیریت-ویرایش کاربر"}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-light  mb-2">
                <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class=" pt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.mainPage')}}">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.users')}}">لیست کاربران</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ویرایش</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('edit-profile') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="balance" class="col-md-4 col-form-label text-md-end">موجودی</label>

                                <div class="col-md-6">
                                    <input id="balance" type="text"  class="form-control @error('balance') is-invalid @enderror" name="balance" value="{{ $user->balance }}" required autocomplete="name" autofocus>

                                    @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-end">شماره همراه</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="name" autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end">نقش</label>
                                <div class="col-md-6 fs-6 font-weight-light">
                                <select class="form-select  fs-6  " id="role" name="role" aria-label="Default select example">
                                    <option selected value="0">کاربر</option>
                                    <option value="1">مدیر</option>
                                </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('edit') }}
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
