@extends('layouts.app')

@section('content')

    <nav class="bg-warning d-flex flex-row justify-content-around pt-2">
        <a class="nav-link fw-bold {{ Route::currentRouteNamed('home', 'detail') ? 'text-primary' : 'text-black' }}" aria-current="page" href="/home"><h5>@lang('index.home')</h5></a>

        <a class="nav-link fw-bold {{ Request::is('cart') ? 'text-primary' : 'text-black' }}" href="/cart"><h5>@lang('index.cart')</h5></a>

        <a class="nav-link fw-bold {{ Request::is('profile') ? 'text-primary' : 'text-black' }}" href="/profile"><h5>@lang('index.profile')</h5></a>

        @if(Auth::user()->role_id == 1)
            <a class="nav-link fw-bold {{ Route::currentRouteNamed('account', 'changerole') ? 'text-primary' : 'text-black' }}" href="/account"><h5>@lang('index.account')</h5></a>
        @endif

    </nav>

    <main class="py-4">
        @yield('contents')
    </main>

@endsection
