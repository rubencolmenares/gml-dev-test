@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de usuarios') }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                            <label for="id_categories" class="col-md-4 col-form-label text-md-end">{{ __('Buscar por categoria:') }}</label>

                            <div class="col-md-6">                  
                                <select id="id_categories" type="text" class="form-control @error('id_categories') is-invalid @enderror" name="id_categories" required autocomplete="id_categories" autofocus>
                                    <option value="">Seleccione una categoria</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                        @if($usr->id_categories == 1)
                            Cliente
                        @elseif($usr->id_categories == 2)
                            Proveedor
                        @elseif($usr->id_categories == 3)
                            Funcionario Interno
                        @elseif($usr->id_categories == 4)
                            Administrador
                        @endif
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
