@extends('layouts.navbar')

@section('contents')
<div class="container p-3">

    <h2>@lang('index.detail')</h2>

    <div class="row mt-4">
        <h4 class="col-2">@lang('index.title'):</h4>
        <h4 class="col">{{ $book->title }}</h4>
    </div>

    <div class="row mt-4">
        <h4 class="col-2">@lang('index.author'):</h4>
        <h4 class="col">{{ $book->author }}</h4>
    </div>

    <div class="row mt-4">
        <h4 class="col-2">@lang('index.description'):</h4>
        <h4 class="col">{{ $book->description }}</h4>
    </div>

    <form action="{{ url('/rent', $book->ebook_id ) }}" method="POST">
        @csrf

        <div class="row mt-4">
            <div class="col mb-2 text-end">
                <button type="submit" class="btn btn-warning col-1 py-3 fw-bold fs-4">
                    @lang('index.rent')
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
