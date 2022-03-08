@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"><h3 class="fw-bold"> @lang('index.register') </h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="row mb-4">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-end">@lang('index.fname')</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">@lang('index.lname')</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-md-4 col-form-label text-md-end">@lang('index.gender')</label>

                                    <div class="col-md-6 mt-2">
                                        <input id="male" type="radio" name="gender" value="1" required>
                                        <label for="male">Male</label>

                                        <input id="female" type="radio" name="gender" value="2" required>
                                        <label for="female">Female</label>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">@lang('index.pass')</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row mb-4">
                                    <label for="middle_name" class="col-md-4 col-form-label text-md-end">@lang('index.mname')</label>

                                    <div class="col-md-6">
                                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name">

                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">@lang('index.email')</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                    <div class="col-md-6">
                                        <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" aria-label="Select Role" required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->role_id }}">{{ $role->role_desc }}</option>
                                            @endforeach
                                          </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="display_picture" class="col-md-4 col-form-label text-md-end">@lang('index.picture')</label>

                                    <div class="col-md-6">
                                         <input id="display_picture" type="file" class="form-control @error('display_picture') is-invalid @enderror" name="display_picture" placeholder="Choose File" required>

                                         @error('display_picture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col text-center mb-2">
                                <button type="submit" class="btn btn-warning col-2">
                                    @lang('index.submit')
                                </button>
                            </div>
                            <a class="text-center" href="{{ route('login') }}">@lang('index.haveaccount')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
