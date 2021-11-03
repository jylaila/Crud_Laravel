@extends('templates.template')

@section('content')
    <h1 class="text-center">Noticias</h1>
    <div class= "col-8 m-auto">
    @csrf
    <div class="text-left mt-3 mb-4">
        <a href="{{url('noticia/create')}}"><button class="btn btn-primary">Adicionar</button></a>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Titulo</th>
      <th scope="col">Noticia</th>
      <th scope="col">Autor</th>
      <th scope="col">Imagem</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($noticia as $noticias)
    @php
        $user=$noticias->find($noticias->id)->relUser;
    @endphp

    <tr>
      <th scope="row">{{$noticias->id}}</th>
      <td>  {{$noticias->titulo}}</td>
      <td>  {{$noticias->noticia}}</td>
      <td>   {{$user->name}}</td>
      <td>  {{$noticias->imagem}}</td>
      <td>
    <a href="{{url("noticia/$noticias->id/edit")}}"><button class="btn btn-primary">Editar</button></a>
      <a href="{{url("noticia/$noticias->id")}}"><button id="js-del"
      class="btn btn-danger">Excluir</button></a>
      </td>

    </tr>
  @endforeach
</tbody>
</table>
    </div>
@endsection
