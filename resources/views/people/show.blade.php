@extends('layouts.app')

@section('content')
    <div class="detail max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="detail--back">
            <a href="{{ route('people.index') }}">Back</a>
        </div>
      <div class="detail--img">
        <img src="{{$people->img}}" alt="" class="h-80  rounded">
      </div>

      <div class="detail--info">
        <h1>
            {{ $people->name }}
            {{ $people->last_name}}
        </h1>


        <ul class="flex p-1 gap-1">
            <li>
                <span>
                    Country:
                    {{ $people->country }}, 
                    {{ $people->city }},
                    {{ $people->address }},
                </span>
            </li>
            <li>
                <span>
                    Brith Day:
                    {{ $people->birth_day }}
                </span>
            </li>
        </ul>

        <ul>
            <li>
                <span>
                    Email:
                    {{ $people->email }}
                </span>
            </li>
            <li>
                <span>
                    Phone:
                    {{ $people->phone }}
                </span>
            </li>
        </ul>

        <h2>
            History
        </h2>

        <ul>
            <li>
                <span>
                    School:
                    {{ $people->school }}
                </span>
            </li>
            <li>
                <span>
                    High School:
                    {{ $people->high_school }}
                </span>
            </li>
            <li>
                <span>
                    University:
                    {{ $people->university }}
                </span>
            </li>
            <li>
                <span>
                    Job:
                    {{ $people->job }}
                </span>
            </li>
            <li>
                <span>
                    Marry:
                    {{ $people->marry }}
                </span>
            </li>
        </ul>
      </div>

      <div class="detail__gallery">
        <h2 class="py-4 text-xl	">
            Gallery
        </h2>
       
        <div class="gallery__buttom">
    
            
            <a href="{{ route('people.gallery.create', ['people' => $people->id]) }}" class="bg-blue-500 text-white p-2 rounded mt-4">Create Gallery</a>
           
            <ul class="gallery py-4">
                @foreach ($people->galleries as $image)
                    <li>
                        <img src="{{ $image->images }}" alt="" class="h-40 w-40 p-2 rounded-xl	">
                    </li>
                @endforeach
            </ul>
           

        </div>
      </div>

        
            
    </div>
    
   

   
@endsection



