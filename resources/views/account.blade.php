@extends('layouts.navbar')

@section('contents')
<div class="container p-3">
    <div class="row justify-content-center">
        @if(count($accounts) == 0)
            <h3>@lang('index.noaccount')</h3>
        @else
            <table class="table border-dark">
                <thead>
                <tr>
                    <th class="w-75 text-center" scope="col"><h4>@lang('index.accounts')</h4></th>
                    <th class="text-center" colspan="2" scope="col"><h4>@lang('index.action')</h4></th>
                </tr>
                </thead>
                <tbody class="table-bordered border-dark">
                @foreach ($accounts as $account)
                <tr class="border-1">
                    <td class="ps-3 border-1 text-center">{{ $account->first_name . " " . $account->middle_name . " " . $account->last_name . " - " . $account->role_desc }}</td>
                    <td class="ps-3 text-center"><a class="btn btn-link" href="/account/role/{{ $account->account_id }}">@lang('index.role')</a></td>
                    <td class="ps-3 text-center">
                        <form action="{{ url('/account/delete', $account->account_id ) }}" method="POST">
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

            <div class="d-flex justify-content-center">
                {!! $accounts->links() !!}
            </div>
        @endif
    </div>
</div>
@endsection
