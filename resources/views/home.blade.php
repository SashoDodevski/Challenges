@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('title', 'Home')

@section('banner')
    <h1 class="font-weight-bold">Clean Blog</h1>
    <p>A Blog Theme by Start Bootstrap</p>
@endsection

@section('content')

        <h3>Lorem ipsum</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam ut cum ad ea temporibus explicabo!</p>
        <p class="text-muted"><small><em>Posted by <strong>John Doe</strong></em></small></p>
        <hr>
        <h3>Lorem ipsum 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore veniam earum odio a assumenda, aliquid repellat numquam.</p>
        <p class="text-muted"><small><em>Posted by <strong>John Doe</strong> in another boring news</em></small></p>
        <hr>
        <h3>Lorem ipsum 3</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim labore delectus itaque!</p>
        <p class="text-muted"><small><em>Posted by <strong>Jane Doe</strong></em></small></p>
        <hr>
        <h3>Lorem ipsum 4</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum laboriosam dolore fugiat a consequatur.</p>
        <p class="text-muted"><small><em>Posted by <strong>Missy Doe</strong></em></small></p>
        <hr>
        <div class="text-right">
        <button type="button" class="btn btn-info"><small>Older posts -></small></button>
        </div>

@endsection
