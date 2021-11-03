@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($noticia))Editar @else Cadastrando nova noticia @endif</h1>
    <div class= "col-8 m-auto">
        @if(isset($noticia))
        <form name="form-cad" id="form-edit" method="post" action="{{url("noticia/$noticia->id")}}">
        @method("PUT")
        @else
        <form name="form-cad" id="form-cad" method="post" action="{{url('noticia')}}">
        @endif
        @csrf
        <label for="titulo">Titulo</label>
        <input class="form-control" type="text" name="titulo" id="titulo"
        value="{{$noticia->titulo ?? ''}}"placeholder="titulo">
        <label for="noticia">Noticia</label>
        <input class="form-control" type="text" name="noticia" id="noticia"
        value="{{$noticia->noticia ?? ''}}" placeholder="noticia">
        <label for="imagem">Imagem</label>
        <input class="form-control" type="file" name="imagem" id="imagem"
        value="{{$noticia->imagem ?? ''}}" placeholder="imagem">

        <label for="user_id">Autor</label>
        <select class="form-control" id="user_id" name="user_id">
            <option value="{{$noticia->relUser->id ?? ''}}">{{$noticia->relUser->name ?? ''}}</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>


        <input class="btn btn-primary mt-4" type="submit"
        value="@if(isset($noticia))Atualizar @else Cadastrar @endif">

        </form>

    </div>
