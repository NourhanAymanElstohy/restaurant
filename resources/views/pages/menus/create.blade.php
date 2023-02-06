@extends('layout')

@section('extra-headers')
<script src="{{ asset('js/menus/create.js') }}"></script>
<link rel="stylesheet" href="{{asset('css/menus/create.css')}}">
@endsection

@section('content')
<!-- Create Page Content -->
<form class='create-form' method="POST" action="{{ route('store-dish') }}" enctype="multipart/form-data">
    @csrf
    <h1>Create a new Dish 🍴</h1>


    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" value="{{old('name')}}" name="name" placeholder="What are you making?!">
        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Descirpiton:</label>
        <textarea class="form-control" name="description" id="description" placeholder="Could you description your recipe for us?">{{old('description')}}</textarea>
        @error('description')
        <p class="text-danger">{{$message}}</p>

        @enderror
    </div>
    <div class="row">
        <div class="col">
            <div>
                <label for="duration">Duration</label>
                <input class="form-control" type="number" max=180 id="duration" value="{{old('duration')}}" name="duration" placeholder="How long will it take?! (in minutes)">
                @error('duration')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="col">
            <div>
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" value="{{old('image')}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

    </div>

    <button type="submit" class="right col-5 btn btn-danger mt-3">Submit</button>

</form>
@endsection
