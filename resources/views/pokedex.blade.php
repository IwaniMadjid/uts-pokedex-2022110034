@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    @forelse ($pokemons as $pokemon)
    <div class="col-md-4">

    @php
        $badgeClasses = [
            'Normal' => 'bg-secondary',
            'Fire' => 'bg-danger',
            'Water' => 'bg-info',
            'Grass' => 'bg-success',
            'Electric' => 'bg-warning',
            'Ice' => 'bg-light',
            'Fighting' => 'bg-dark text-light',
            'Poison' => 'bg-indigo text-light',
            'Ground' => 'bg-brown text-light',
            'Flying' => 'bg-primary',
            'Psychic' => 'bg-secondary',
            'Bug' => 'bg-success',
            'Rock' => 'bg-warning',
            'Ghost' => 'bg-dark',
            'Dragon' => 'bg-info',
            'Dark' => 'bg-dark text-light',
            'Fairy' => 'bg-pink text-light',
            'Steel' => 'bg-silver',
        ];

        $lightColors = [
            'bg-secondary' => 'rgba(108, 117, 125, 0.2)',
            'bg-danger' => 'rgba(220, 53, 69, 0.2)',
            'bg-info' => 'rgba(23, 162, 184, 0.2)',
            'bg-success' => 'rgba(40, 167, 69, 0.2)',
            'bg-warning' => 'rgba(255, 193, 7, 0.2)',
            'bg-light' => 'rgba(248, 249, 250, 0.2)',
            'bg-dark' => 'rgba(52, 58, 64, 0.2)',
            'bg-purple' => 'rgba(128, 0, 128, 0.2)',
            'bg-brown' => 'rgba(165, 42, 42, 0.2)',
            'bg-primary' => 'rgba(0, 123, 255, 0.2)',
            'bg-pink' => 'rgba(255, 192, 203, 0.2)',
            'bg-silver' => 'rgba(192, 192, 192, 0.2)',
        ];

        $badgeClass = $badgeClasses[$pokemon->primary_type] ?? 'bg-light';
        $cardBackgroundColor = $lightColors[$badgeClass] ?? 'rgba(248, 249, 250, 0.2)';
    @endphp

    <div class="card" style="width: 18rem; margin: 10px; background-color: {{ $cardBackgroundColor }};">
        <img src="{{ asset('storage/' . Str::after($pokemon->photo, 'public/')) }}" class="card-img-top rounded-top" alt="{{ $pokemon->name }}" style="border-radius: 15px 15px 0 0">
        <div class="card-body">
            <h5 class="card-title">#{{$padded = Str::padLeft($pokemon->id, 4, '0')}}</h5>
            <p class="card-text"><b><a href="{{ route('pokemon.show', $pokemon) }}" style="text-decoration: none; color: black; font-size: 20px">{{ $pokemon->name }}</a></b></p>
            <span class="badge rounded-pill {{ $badgeClass }}">{{ $pokemon->primary_type }}</span>
        </div>
    </div>
    </div>

    @empty
        <p>No Pokémon found.</p>
    @endforelse

    <div>
    </div>
    {{ $pokemons->links() }}

</div>

@endsection
