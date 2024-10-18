@extends('layouts.app')

@section('content')
<div class="container">
    <main>
        <center>
        <img src="{{ asset('storage/' . Str::after($pokemon->photo, 'public/')) }}"  alt="{{ $pokemon->name }}" style="width: 200px">
        <h1><b>{{$pokemon->name}}</b></h1>
    </center>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td><b>Species</b></td>
                    <td>{{$pokemon->species}}</td>
                </tr>
                <tr></tr>
                    <td><b>Primary Type</b></td>
                    <td>{{$pokemon->primary_type}}</td>
                </tr>
                <tr>
                    <td><b>Attack</b></td>
                    <td>{{$pokemon->attack}}</td>
                </tr>
                <tr>
                    <td><b>HP</b></td>
                    <td>{{$pokemon->hp}}</td>
                </tr>
                <tr>
                    <td><b>Defense</b></td>
                    <td>{{$pokemon->defense}}</td>
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
