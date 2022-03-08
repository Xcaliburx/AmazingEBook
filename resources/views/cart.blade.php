@extends('layouts.navbar')

@section('contents')
<div class="container p-3">
    <div class="row justify-content-center">
        @if(count($orders) == 0)
            <h3>@lang('index.nocart')</h3>
        @else
            <table class="table table-borderless border-dark">
                <thead>
                <tr>
                    <th class="w-100 text-center" scope="col"><h4>@lang('index.title')</h4></th>
                    <th class="text-center" scope="col"></th>
                </tr>
                </thead>
                <tbody class="border-dark">
                @foreach ($orders as $order)
                <tr>
                    <td class="ps-3 border-1 text-center">{{ $order->title }}</td>
                    <td class="ps-3">
                        <form action="{{ url('/cart/delete', $order->order_id ) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure want to delete?');">
                                @lang('index.delete')
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <form action="{{ url('/cart/submit' ) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="row mt-4">
                    <div class="col mb-2 text-end">
                        <button type="submit" class="btn btn-warning col-1 py-3 fw-bold fs-4">
                            @lang('index.submit')
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection
