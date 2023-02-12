@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('title', 'Contact')

@section('banner')
    <h1 class="font-weight-bold">Contact me</h1>
    <p>Have questions? I have answers!</p>
@endsection

@section('content')

        <p class="text-muted"><small>Name</small></p>
        <hr>
        <p class="text-muted"><small>Email Address</small></p>
        <hr>
        <p class="text-muted"><small>Phone Number</small></p>
        <hr>
        <p class="text-muted"><small>Message</small></p>
        <textarea name="" id="" cols="30" rows="3" class="w-100 textarea"></textarea>
        <div>
        <button type="button" class="btn btn-info mt-3"><small>SEND</small></button>
        </div>

@endsection
