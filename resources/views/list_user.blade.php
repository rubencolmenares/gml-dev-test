@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de usuarios') }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="id_categories" class="col-md-4 col-form-label float-right">{{ __('Buscar por categoria:') }}</label>
                        <form action = "{{route('users.index')}}" method="get">
                            <div class="col-md-3">                  
                                <select id="search" type="text" class="form-control" name="search" autocomplete="search" autofocus>
                                    <option value="">Todas</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                     @endforeach
                                </select>
                                <div class="col-auto mt-3"> 
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Buscar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                  <th scope="col">Acciones</th>
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
                    <td>
                        @if($usr->id_categories == 1 ) 
                            Cliente
                        @elseif($usr->id_categories == 2 ) 
                            Proveedor
                        @elseif($usr->id_categories == 3 ) 
                            Funcionario Interno
                        @elseif($usr->id_categories == 4 ) 
                            Administrador
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{route('listuser.edit', $usr->id)}}">Editar</a>
                        <br>
                        <form action="{{ route('listuser.delete', $usr->id)}}" method="post">
                           @method('delete')
                           @csrf
                           <input class="btn btn-danger btn-sm" type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$usrs->links()}}
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/register.js') }}" type="module"></script>
@endsection