@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="list-group">
                      <a href="{{route('register')}}" class="list-group-item list-group-item-action" aria-current="true">
                        Registrar usuarios
                      </a>
                      <a href="{{route('users.list')}}" class="list-group-item list-group-item-action">
                        Listado de usuarios
                      </a>
                      {{--
                      <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                      <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                      <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();" 
                      class="list-group-item list-group-item-action">
                        Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                      </form>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
