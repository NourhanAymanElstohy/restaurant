@props(['dish'])
<div {{ $attributes->merge(['class' => 'col-6 border border-danger rounded p-4']) }}
    style="height:25vh;min-height:250px">
    <div class="row" style="height:100%">
        <div class="col-6 d-flex flex-column justify-content-between">
            <h2 class="text-danger text-nowrap m-0" style="height:20%">{{ $dish->name }}</h2>
            <div style="height:65%;overflow-y:hidden">{{ $dish->description }}</div>
            <div style="height:10%">
                <b>{{ $dish->duration }}</b> mins
            </div>
        </div>
        <div class="col d-flex justify-content-center">
            <img style="height:20vh"
                src="{{ $dish->image ? asset('storage/' . $dish->image) : asset('storage/dishes/dish.png') }} "
                alt="">
        </div>
    </div>
</div>
