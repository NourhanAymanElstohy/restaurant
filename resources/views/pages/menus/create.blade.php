@extends('layout')

@section('extra-headers')
<script src="{{ asset('js/menus/create.js') }}"></script>
<link rel="stylesheet" href="{{asset('css/menus/create.css')}}">
@endsection

@section('content')
<!-- Create Page Content -->
<form class='create-form' method="POST" action="{{ route('menus.store') }}">
   @csrf
   <h1>Create a new Dish 🍴</h1>

   <div class="form-group">
      <label for="name">Name:</label>
      <input class="form-control" type="text" id="name" name="name" placeholder="What are you making?!">
   </div>

   <div class="form-group">
      <label for="duration">Duration</label>
      <input class="form-control" type="number" max=180  id="duration" name="duration" placeholder="How long will it take?! (in minutes)">
   </div>

   <button type="submit" class="btn btn-danger">Submit</button>

</form>
@endsection
