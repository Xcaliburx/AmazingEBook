@extends('layouts.navbar')

@section('contents')
<div class="container pt-3">

    <h2>{{ $user->first_name . " " . $user->middle_name . " " . $user->last_name }}</h2>

    <form action="{{ url('/account/update', $user->account_id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="row mt-5">
            <label for="role" class="col-md-1 col-form-label">{{ __('Role:') }}</label>

            <div class="col-md-4">
                <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" aria-label="Select Role" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->role_id }}" @if($user->role_id == $role->role_id) selected @endif>{{ $role->role_desc }}</option>
                    @endforeach
                  </select>

                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mt-5 ms-5">
            <div class="col mb-2">
                <button type="submit" class="btn btn-warning col-1 fs-4">
                    @lang('index.save')
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
