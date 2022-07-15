@extends("template.users")
@section("title", "Listar postagens de {$user->name}")

@section("body")

        <h1>Postagens do {{ $user->name }}</h1>

        @foreach($posts as $post)
            <div class="mb-3">
                <label class="form-label">identificação Nº:<br><b> {{ $post->id }}</b></label>
                <br/>
                <label class="form-label">status:<br><b> {{ $post->active?"ativo":"inativo" }}</b></label>
                <br/>
                <label class="form-label">Titulo:<br><b> {{ $post->title }}</b></label>
                <br/>
                <label class="form-label">Postagem:<br></label>
                <br/>
                <textarea class="form-control" rows="3">{{ $post->post }}</textarea>
                <br/>
            </div>
        @endforeach

@endsection
