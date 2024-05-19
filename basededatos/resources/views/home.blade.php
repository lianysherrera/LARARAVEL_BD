@extends('app')

@section('title', 'home')

@section('description', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, sapiente porro id ad assumenda natus placeat reprehenderit exercitationem temporibus! Explicabo voluptates minima iure neque mollitia sapiente totam quam hic obcaecati!' )

@section('content')
{{--- El for each es la variable del controlador, para que se pueda visualizar los datos  --}}
    @foreach ($threads as $thread)
    @include('_item')
    @endforeach

    {{ $threads->links()  }}
@endsection
