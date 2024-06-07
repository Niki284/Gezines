@extends('layouts.app')

@section('content')
<div class="creare  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6 py-10" >Create Gallery</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{route('people.gallery.store', ['people' => $people_id]) }}" multiple enctype="multipart/form-data" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="images"class="block text-gray-700 font-medium">foto</label>
            <input type="hidden" name="people_id" value="{{$people_id}}">
            <input type="file"class="w-full p-2 border border-gray-300 rounded mt-1" id="images" name="images[]"  multiple require>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Create</button>
    </form>
</div>
@endsection
