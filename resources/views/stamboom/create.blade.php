@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Nieuwe Persoon Toevoegen</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('stamboom.store') }}">
            @csrf
            <div class="mb-4">
                <label for="naam" class="block text-gray-700">Naam</label>
                <input type="text" name="naam" id="naam" class="mt-1 block w-full" value="{{ old('naam') }}" required>
            </div>
            <div class="mb-4">
                <label for="achternaam" class="block text
                -gray-700">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" class="mt-1 block w-full" value="{{ old('achternaam') }}" required>
            </div>
            <div class="mb-4">
                <label for="achternaam" class="block text
                -gray-700">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" class="mt-1 block w-full" value="{{ old('achternaam') }}" required>
            </div>
            <div class="mb-4">
                <label for="achternaam" class="block text
                -gray-700">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" class="mt-1 block w-full" value="{{ old('achternaam') }}" required>
            </div>
           
            <div class="mb-4">
                <label for="geboortedatum" class="block text-gray-700">Geboortedatum</label>
                <input type="date" name="geboortedatum" id="geboortedatum" class="mt-1 block w-full" value="{{ old('geboortedatum') }}" required>
            </div>
            <div class="mb-4">
                <label for="geslacht" class="block text-gray-700">Geslacht</label>
                <select name="geslacht" id="geslacht" class="mt-1 block w-full" required>
                    <option value="Man" {{ old('geslacht') == 'Man' ? 'selected' : '' }}>Man</option>
                    <option value="Vrouw" {{ old('geslacht') == 'Vrouw' ? 'selected' : '' }}>Vrouw</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="vader_id" class="block text-gray-700">Vader</label>
                <select name="vader_id" id="vader_id" class="mt-1 block w-full">
                    <option value="">Geen</option>
                    
                </select>
            </div>
            <div class="mb-4">
                <label for="moeder_id" class="block text-gray-700">Moeder</label>
                <select name="moeder_id" id="moeder_id" class="mt-1 block w-full">
                    <option value="">Geen</option>
                    
                   
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Opslaan
            </button>
    </div>

@endsection