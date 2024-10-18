@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @forelse ($pokemons as $pokemon)
    <div class="col-md-4">

    <div class="card" style="width: 18rem; margin: 10px">
        <img src="{{ asset('storage/' . Str::after($pokemon->photo, 'public/')) }}" class="card-img-top rounded-top" alt="{{ $pokemon->name }}" style="border-radius: 15px 15px 0 0">
        <div class="card-body">
            <h5 class="card-title">#{{$padded = Str::padLeft($pokemon->id, 4, '0')}}</h5>
            <p class="card-text"><b><a href="{{ route('pokemon.show', $pokemon) }}" style="text-decoration: none; color: black; font-size: 20px">{{ $pokemon->name }}</a></b></p>
            <span class="badge rounded-pill bg-primary">{{ $pokemon->primary_type }}</span>
        </div>
    </div>
    </div>



    @empty

    @endforelse
    <div>

    </div>
    {{ $pokemons->links() }}

</div>



@endsection
