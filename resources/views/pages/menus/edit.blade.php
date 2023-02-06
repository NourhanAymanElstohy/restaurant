@extends('layout')

@section('extra-headers')
<script src="{{ asset('js/menus/edit.js') }}"></script>
<link rel="stylesheet" href="{{asset('css/menus/edit.css')}}">
@endsection

@section('content')
   <!-- Edit Page Content -->
   <form class='edit-form' method="POST" action="{{ route('update-dish',$dish->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <h1>Edit {{$dish->name}} 🍴</h1>

      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" value="{{$dish->name}}" name="name" placeholder="What are you making?!">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Descirpiton:</label>
        <textarea class="form-control" name="description" placeholder="Could you description your recipe for us?">{{$dish->description}}</textarea>
        @error('description')
        <p class="text-danger">{{$message}}</p>

        @enderror
    </div>
    <div class="row">
        <div class="col">
            <div>
                <label for="duration">Duration</label>
                <input class="form-control" type="number" max=180 id="duration" value="{{$dish->duration}}" name="duration" placeholder="How long will it take?! (in minutes)">
                @error('duration')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="col">
            <div>
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" value="{{$dish->image}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

    </div>

    <button type="submit" class="right col-5 btn btn-danger mt-3">Save</button>

   </form>
@endsection
