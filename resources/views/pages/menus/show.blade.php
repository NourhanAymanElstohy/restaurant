@extends('layout')

@section('extra-headers')
<script src="{{ asset('js/menus/edit.js') }}"></script>
<link rel="stylesheet" href="{{asset('css/menus/edit.css')}}">
@endsection

@section('content')
   <!-- Edit Page Content -->
   <div class="flex">
        <h1>{{$dish->name}}</h1>
        <p>{{$dish->duration}}</p>
   </div>
    <a href="{{url()->previous(}}">
        <i class="fa-solid fa-back-arrow"></i> back
    </a>
@endsection
