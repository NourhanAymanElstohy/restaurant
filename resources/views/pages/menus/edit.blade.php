@extends('layout')

@section('extra-headers')
<script src="{{ asset('js/menus/edit.js') }}"></script>
<link rel="stylesheet" href="{{asset('css/menus/edit.css')}}">
@endsection

@section('content')
   <!-- Edit Page Content -->
   <form class='edit-form' method="POST" action="{{ route('menus.update',$dish->id) }}">
      @csrf
      @method('PUT')
      <h1>Create a new Dish 🍴</h1>

      <div class="form-group">
         <label for="name">Name:</label>
         <input class="form-control" type="text" id="name" value="{{$dish->name}}" name="name" placeholder="What are you making?!">
      </div>

      <div class="form-group">
         <label for="duration">Duration</label>
         <input class="form-control" type="number" max=180  id="duration" value="{{$dish->duration}}" name="duration" placeholder="How long will it take?! (in minutes)">
      </div>

      <button type="submit" class="btn btn-danger">Save</button>

   </form>
@endsection
