@extends('layouts.app')

@section('content')
    <h1>Add Relation for {{ $people->name }}</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('people.add-parent.store', $people->id) }}" method="POST">
        @csrf
        <div>
            <label for="parent_id">Select Parent</label>
            <select id="parent_id" name="parent_id">
                @foreach($users as $potentialParent)
                    <option value="{{ $potentialParent->id }}">{{ $potentialParent->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Add Relation</button>
    </form>
@endsection
