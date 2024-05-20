@extends('app')

@section('title', $title)

@section('description', $description )

@section('content')
{{--- El for each es la variable del controlador, para que se pueda visualizar los datos  --}}
    @foreach ($threads as $thread)
    @include('_item')
    @endforeach

    {{ $threads->links()  }}
@endsection
