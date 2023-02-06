@extends('layout')

@section('extra-headers')
    <script src="{{ asset('js/menus/index.js') }}"></script>
@endsection

@section('content')
    <!-- Index Page Content -->
    @include('partials._search')
    @if (!$dishes->isEmpty())
        <!-- Dishes Table -->
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->duration }}</td>
                        <td class="d-flex">
                            <a href="{{ route('show-edit-dish', $dish) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST" action="{{ route('delete-dish', $dish->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ms-2 delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5 class="pt-2 text-center"><b>No Data Found</b></h5>
    @endif
@endsection
