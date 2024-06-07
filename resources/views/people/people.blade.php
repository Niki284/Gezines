<?php

/**
 * @var array $people
 */

?>
 @if(Auth::check())
<ul>
   
    @foreach ($people as $member)
        <li class="">
            <a href="{{ route('people.show', $member->id) }}" class="relative  {{ $member->gender == 'M' ? 'M' : 'F' }}">
                <img src="{{$member->img}}" alt="" class="h-40 w-40 p-2 rounded-xl">
                <h1 class="font-sans text-lg">
                    {{ $member->name }} is {{ $member->last_name }}
                </h1>
                <data>
                    Birth Date
                    {{ $member->birth_date }}
                </data>
               
                
            </a>
            @if ($member->children->count())
                {{ View::make('people.people', ['people' => $member->children]) }}
            @endif
            <div class="flex items-center gap-0	forme absolute">
                    <a href="{{ route('people.create', ['parent_id' => $member->id]) }}">+</a>
                    <a href="{{ route('people.edit', $member->id) }}">Edit</a>
                <form method="post" action="{{ route('people.destroy', $member->id) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="X" class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold p-1 m-0 rounded">
                </form>
                </div>
        </li>
    @endforeach
  
</ul>  @endif