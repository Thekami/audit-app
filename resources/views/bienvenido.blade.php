
@extends('layouts.app') 

@section('content')
    <h1>Bienvenido, {{ $usuario->name }}</h1>

    <div class="card mt-2">
        <div class="card-header">
            Ruta {{ $vista }}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mt-4">
            <footer class="blockquote-footer">Email: {{ $usuario->email }} </footer>
          </blockquote>
        </div>
      </div>
@endsection