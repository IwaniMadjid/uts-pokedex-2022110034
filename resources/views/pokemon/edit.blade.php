@extends('layouts.app')

@section('content')

<div class="container">
    <main>
        <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $pokemon->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label" for="species">Species</label>
                    <input class="form-control @error('species') is-invalid @enderror" type="text" name="species" id="species" value="{{ old('species', $pokemon->species) }}">
                    @error('species')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mt-2 mb-2">
                    <label class="form-label" for="primary_type">Primary Type</label>
                    <select class="form-select" aria-label="Default select example" name="primary_type" id="primary_type" value="{{ old('primary_type', $pokemon->primary_type)}}">
                        <option selected>Open this select menu</option>
                        <option value="Grass" {{old('primary_type', $pokemon->primary_type) == 'Grass' ? ' selected' : ''}}>Grass</option>
                        <option value="Fire" {{old('primary_type', $pokemon->primary_type) == 'Fire' ? ' selected' : ''}}>Fire</option>
                        <option value="Water" {{old('primary_type', $pokemon->primary_type) == 'Water' ? ' selected' : ''}}>Water</option>
                        <option value="Bug" {{old('primary_type', $pokemon->primary_type) == 'Bug' ? ' selected' : ''}}>Bug</option>
                        <option value="Normal" {{old('primary_type', $pokemon->primary_type) == 'Normal' ? ' selected' : ''}}>Normal</option>
                        <option value="Poison"  {{old('primary_type', $pokemon->primary_type) == 'Poison' ? ' selected' : ''}}>Poison</option>
                        <option value="Electric" {{old('primary_type', $pokemon->primary_type) == 'Electric' ? ' selected' : ''}}>Electric</option>
                        <option value="Ground" {{old('primary_type', $pokemon->primary_type) == 'Ground' ? ' selected' : ''}}>Ground</option>
                        <option value="Fairy" {{old('primary_type', $pokemon->primary_type) == 'Fairy' ? ' selected' : ''}}>Fairy</option>
                        <option value="Fighting" {{old('primary_type', $pokemon->primary_type) == 'Fighting' ? ' selected' : ''}}>Fighting</option>
                        <option value="Psychic" {{old('primary_type', $pokemon->primary_type) == 'Psychic' ? ' selected' : ''}}>Psychic</option>
                        <option value="Rock" {{old('primary_type', $pokemon->primary_type) == 'Rock' ? ' selected' : ''}}>Rock</option>
                        <option value="Ghost" {{old('primary_type', $pokemon->primary_type) == 'Ghost' ? ' selected' : ''}}>Ghost</option>
                        <option value="Ice" {{old('primary_type', $pokemon->primary_type) == 'Ice' ? ' selected' : ''}}>Ice</option>
                        <option value="Dragon" {{old('primary_type', $pokemon->primary_type) == 'Dragon' ? ' selected' : ''}}>Dragon</option>
                        <option value="Dark" {{old('primary_type', $pokemon->primary_type) == 'Dark' ? ' selected' : ''}}>Dark</option>
                        <option value="Steel" {{old('primary_type', $pokemon->primary_type) == 'Steel' ? ' selected' : ''}}>Steel</option>
                        <option value="Flying" {{old('primary_type', $pokemon->primary_type) == 'Flying' ? ' selected' : ''}}>Flying</option>

                      </select>
                      @error('primary_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mt-2 mb-2">
                    <label class="form-label" for="weight">Weight</label>
                    <input class="form-control @error('weight') is-invalid @enderror" type="number" name="weight" id="weight" value="{{ old('weight', $pokemon->weight) }}">
                    @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mt-2 mb-2">
                    <label class="form-label" for="height">Height</label>
                    <input class="form-control @error('height') is-invalid @enderror" type="number" name="height" id="height" value="{{ old('height', $pokemon->height) }}">
                    @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mt-2 mb-2">
                    <label class="form-label" for="hp">HP</label>
                    <input class="form-control @error('hp') is-invalid @enderror" type="number" name="hp" id="hp" value="{{ old('hp', $pokemon->hp) }}">
                    @error('hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mt-2 mb-2">
                    <label class="form-label" for="attack">Attack</label>
                    <input class="form-control @error('attack') is-invalid @enderror" type="number" name="attack" id="attack" value="{{ old('attack', $pokemon->attack) }}">
                    @error('attack')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6 mt-2 mb-2">
                    <label class="form-label" for="defense">Defense</label>
                    <input class="form-control @error('defense') is-invalid @enderror" type="number" name="defense" id="defense" value="{{ old('defense', $pokemon->defense) }}">
                    @error('defense')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input @if($pokemon->is_legendary == 1) checked @endif name="is_legendary" class="form-check-input" type="checkbox" value="1" id="is_legendary">
                    <label class="form-check-label" for="is_legendary">Is Legendary?</label></div>
                </div>
                <div class="col-6 mt-2 mb-2">
                    <label class="form-label" for="photo">Photo</label>
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo" accept="image/*">
                    <img src="{{ Storage::url($pokemon->photo) }}" alt="" width="100">
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </main>
</div>

@endsection

