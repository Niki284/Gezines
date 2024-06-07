<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Relations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        
       // $people = People::where('beheerder_id', $userId)->get();

        // $people = People::with(['children', 'parents'])
        //     ->where('beheerder_id', $userId)
        //     ->get();
            $people = People::leftJoin('relations as child_relation', 'child_relation.child_id', '=', 'people.id')
                ->whereNull('child_relation.id')
                ->where('people.beheerder_id', $userId)
                ->select('people.*')
                ->get();

                
        $relations = Relations::all();

        return view('people.index', compact('people', 'relations'));
    }

    public function search(Request $request)
{
    $lastName = $request->input('last_name');
    $people = People::where('last_name', 'like', '%' . $lastName . '%')->get();

    // Обработка и отображение результатов поиска аналогично index методу
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request , People $people)
    {
        //
        $people->beheerder = Auth::id();

        return view('people.create', ['parent_id' => $request->get('parent_id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'img' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'death_date' => 'nullable|date',
            'death_place' => 'nullable|string|max:255',
            'gender' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:people,id',
            'neighborhood' => 'nullable|string|max:255',
            // usrer_id is the beheerder_id
            'beheerder_id' => 'nullable|exists:users,id',
        ]);

        $people = People::create($request->all());
        $parent_id = $request->parent_id;
       // $people->beheerder = Auth::id();
         $people->beheerder_id = Auth::id();
        if ($parent_id !== null) {
            $relation = new Relations();
            $relation->parent_id = $parent_id;
            $relation->child_id = $people->id;
            $relation->save();
        }
        

        return redirect()->route('people.index');
    }

    public function createRelation($id)
    {
        $people = People::findOrFail($id);
        $users = People::where('id', '!=', $id)->get();

        return view('people.create', compact('people', 'users'));
    }

    public function storeRelation(Request $request, $id)
    {
        $request->validate([
            'parent_id' => 'required|exists:users,id',
        ]);

        $relation = new Relations();
        $relation->parent_id = $request->parent_id;
        $relation->child_id = $id;
        $relation->save();

        return redirect()->route('people.show', $id)->with('success', 'Relation added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
         $people = People::find($people->id);
        //$people = People::with(['parents', 'children'])->findOrFail($id);
        
        return view('people.show', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
        $people = People::find($people->id);
        return view('people.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        //
        $people = People::find($people->id);
        $people->update($request->all());
        

        return redirect()->route('people.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        //
        $people = People::find($people->id);
        $people->delete();

        return redirect()->route('people.index');
    }
}
