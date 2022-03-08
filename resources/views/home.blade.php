@extends('layouts.navbar')

@section('contents')
<div class="container p-3">
    <div class="row justify-content-center">
        <table class="table border-dark">
            <thead>
              <tr>
                <th class="w-25 text-center" scope="col"><h4>@lang('index.author')</h4></th>
                <th class="text-center" scope="col"><h4>@lang('index.title')</h4></th>
              </tr>
            </thead>
            <tbody class="table-bordered border-dark">
              @foreach ($books as $book)
              <tr class="border-1">
                <td class="ps-3 border-1">{{ $book->author }}</td>
                <td class="ps-3 border-1"><a href="/detail/{{ $book->ebook_id }}">{{ $book->title }}</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center">
            {!! $books->links() !!}
        </div>
    </div>
</div>
@endsection
