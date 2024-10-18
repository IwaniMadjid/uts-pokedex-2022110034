@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom, white, {{ getTypeColor($pokemon->primary_type) }});
    }
</style>

<div class="container">
    <main>
        <center>
            <img src="{{ asset('storage/' . Str::after($pokemon->photo, 'public/')) }}" alt="{{ $pokemon->name }}" style="width: 200px">
            <h1><b>{{$pokemon->name}}</b></h1>
        </center>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td><b>Species</b></td>
                    <td>{{$pokemon->species}}</td>
                </tr>
                <tr>
                    <td><b>Primary Type</b></td>
                    <td>
                        @switch($pokemon->primary_type)
                            @case('Normal') 🐾 Normal @break
                            @case('Fighting') 🥋 Fighting @break
                            @case('Flying') 🕊️ Flying @break
                            @case('Poison') ☠️ Poison @break
                            @case('Ground') ⛏️ Ground @break
                            @case('Rock') 🪨 Rock @break
                            @case('Bug') 🐛 Bug @break
                            @case('Ghost') 👻 Ghost @break
                            @case('Steel') ⚙️ Steel @break
                            @case('Fire') 🔥 Fire @break
                            @case('Water') 💧 Water @break
                            @case('Grass') 🌿 Grass @break
                            @case('Electric') ⚡ Electric @break
                            @case('Psychic') 🧠 Psychic @break
                            @case('Ice') ❄️ Ice @break
                            @case('Dragon') 🐉 Dragon @break
                            @case('Dark') 🌑 Dark @break
                            @case('Fairy') 🧚 Fairy @break
                            @default ❓ Other
                        @endswitch
                    </td>
                </tr>
                <tr>
                    <td><b>Attack</b></td>
                    <td>{{$pokemon->attack}}⚔️</td>
                </tr>
                <tr>
                    <td><b>HP</b></td>
                    <td>{{$pokemon->hp}}❤️</td>
                </tr>
                <tr>
                    <td><b>Defense</b></td>
                    <td>{{$pokemon->defense}}🛡️</td>
                </tr>
                <tr>
                    <td><b>Legendary</b></td>
                    <td>{{$pokemon->is_legendary ? 'Yes' : 'No'}}</td>
                </tr>
            </tbody>
        </table>
    </main>
</div>

@endsection

@php
function getTypeColor($type) {
    $colors = [
        'Normal' => '#A8A878',
        'Fighting' => '#C22D28',
        'Flying' => '#A98FF3',
        'Poison' => '#A040B0',
        'Ground' => '#E2BF5D',
        'Rock' => '#B8A038',
        'Bug' => '#A8B820',
        'Ghost' => '#705898',
        'Steel' => '#B7B7CE',
        'Fire' => '#F08030',
        'Water' => '#6890F0',
        'Grass' => '#78C850',
        'Electric' => '#F8D030',
        'Psychic' => '#F85888',
        'Ice' => '#98D8D8',
        'Dragon' => '#7038F8',
        'Dark' => '#705848',
        'Fairy' => '#EE99AC',
    ];

    return $colors[$type] ?? '#FFFFFF'; }
@endphp
