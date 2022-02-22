@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de usuarios') }}</div>
                {{--<div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    @if(session()->has('deleted'))
                        <div class="alert alert-danger">
                            {{session()->get('deleted')}}
                        </div>
                    @endif
                </div>--}}
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-md-2">
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Cédula</th>
                  <th scope="col">País</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Celular</th>
                  <th scope="col">Categoria</th>
                </tr>
              </thead>
              <tbody>
                @foreach($usrs as $usr)
                <tr>
                  <th scope="row">{{$usr->id}}</th>
                    <td>{{$usr->name}}</td>
                    <td>{{$usr->lastname}}</td>
                    <td>{{$usr->cc_number}}</td>
                    <td>{{$usr->country}}</td>
                    <td>{{$usr->email}}</td>
                    <td>{{$usr->address}}</td>
                    <td>{{$usr->cellphone}}</td>
                    <td>{{$usr->id_categories}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$usrs->links()}}
        </div>
    </div>
</div>
@endsection
