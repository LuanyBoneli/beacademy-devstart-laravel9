@extends('template.users')
@section('title','Listagem de Postagens')
@section('body')
<h1>Listagem de Postagens</h1>

<table class="table">
    <thead class="text-center">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Usuário</th>
        <th scope="col">Titulo</th>
        <th scope="col">Post</th>
        <th scope="col">Data Cadastro</th>
    </tr>
    </thead>
    <tbody class="text-center">
    @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <th scope="row">{{$post->user->name}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->post}}</td>
            <td>{{date('d/m/Y - H:i',strtotime($post->created_at))}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="justify-content-center pagination">
</div>
@endsection
