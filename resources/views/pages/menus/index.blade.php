@extends('layout')

@section('content')
<!-- Index Page Content -->
<table class="table table-stripbed table-hover">
   <thead>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Duration</th>
         <th scope="col">Handle</th>
      </tr>
   </thead>
   <tbody>
      @if (!empty($dishes))
      @foreach ($dishes as $dish)
      <tr>
         <td>{{$loop->iteration}}</td>
         <td>{{$dish->name}}</td>
         <td>{{$dish->duration}}</td>
         <td class="d-flex">
            <a href="{{ route('menus.edit',$dish)}}" class="btn btn-sm btn-warning">Update</a>
            <form method="POST" action="{{ route('menus.delete', $dish->id) }}">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-sm btn-danger ms-2 delete">Delete</button>
            </form>
         </td>
      </tr>
      @endforeach
      @endif
   </tbody>
</table>
@endsection
