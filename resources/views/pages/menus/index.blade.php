@extends('layout')

@section('extra-headers')
    <script src="{{ asset('js/menus/index.js') }}"></script>
@endsection

@section('content')
    <!-- Index Page Content -->
    @if (!$dishes->isEmpty())
        <div class="d-flex flex-wrap my-4 gx-2">
            @foreach ($dishes as $dish)
                <x-dish-card :dish='$dish' />
            @endforeach
        @else
            <h5 class="pt-2 text-center"><b>No Data Found</b></h5>
    @endif
@endsection
