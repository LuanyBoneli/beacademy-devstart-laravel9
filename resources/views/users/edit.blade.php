@extends('template.users')
@section('title',"Usuário {$user->name}")
@section('body')
    <h1>Usuário {{$user->name}}</h1>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </div>
    @endif

    <form action="{{ route('users.update',$user->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <input type="nome" name="name" class="form-control" placeholder="digite seu nome">
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="digite seu email">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="digite sua senha"/>
        </div>
        <div class="mb-3">
            <input type="file" name="image" id="image" class="form-control form control-md" />
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
