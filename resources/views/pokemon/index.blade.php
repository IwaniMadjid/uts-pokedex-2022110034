@extends('layouts.app')

@section('content')
<div class="container">
    <main>
        <h1>Pokedex</h1>
        <a href="{{route('pokemon.create')}}"><button class="btn btn-primary">Add Pokemon</button></a>
        <table class="table table-striped mb-2 mt-2">
            <thead class="table-dark text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Species</th>
                <th>Primary Type</th>
                <th>Power</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($pokemons as $pokemon)
                <tr>
                    <td>
                        #{{$padded = Str::padLeft($pokemon->id, 4, '0')}}</td>
                    <td>
                        <a href="{{ route('pokemon.show', $pokemon) }}">{{ $pokemon->name }}</a>
                    </td>
                    <td>{{ $pokemon->species }}</td>
                    <td>{{ $pokemon->primary_type }}</td>
                    <td>{{ $pokemon->attack +$pokemon->hp + $pokemon->defense }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('pokemon.edit', $pokemon) }}"><button class="btn btn-primary">Edit</button></a>
                            <form action="{{ route('pokemon.destroy', $pokemon) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <div class="container">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection

