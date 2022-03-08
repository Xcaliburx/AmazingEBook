@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 20%">
        <div class="border border-4 border-info rounded-circle text-center w-50" style="padding-top: 20%; padding-bottom: 20%;">
            <div class="flex-row justify-content-center align-items-center">
                <h1>@lang('index.find')</h1>
                <h1>@lang('index.here')</h1>
            </div>
        </div>
    </div>
</div>
@endsection
