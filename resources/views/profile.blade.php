@extends('layouts.navbar')

@section('contents')
<div class="container pt-5">
    <form method="POST" action="{{ url('/profile/update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-2">
                <img class="w-100 h-100" style="border: 1px solid #b86ebb" src="{{ Storage::url($user->display_picture_link) }}" height="300" alt="">
            </div>

            <div class="col">
                <div class="row mb-4">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">@lang('index.fname')</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

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
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name">

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
                        <input id="male" type="radio" name="gender" value="1" required @if($user->gender_id == 1) checked @endif>
                        <label for="male">Male</label>

                        <input id="female" type="radio" name="gender" value="2" required @if($user->gender_id == 2) checked @endif>
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
                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ $user->middle_name }}" autocomplete="middle_name">

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

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
                        <select id="role" disabled class="form-select @error('role') is-invalid @enderror" aria-label="Select Role" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}" @if($user->role_id == $role->role_id) selected @endif>{{ $role->role_desc }}</option>
                            @endforeach
                          </select>

                          <input type="hidden" name="role" value="{{ $user->role_id }}">

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
                         <input id="display_picture" type="file" class="form-control @error('display_picture') is-invalid @enderror" name="display_picture">

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
                    @lang('index.save')
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
