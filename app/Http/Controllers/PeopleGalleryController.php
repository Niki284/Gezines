<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\PeopleGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeopleGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('people_gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($people_id)
    {

        //
        // dd($people_id) ;
        return view('people_gallery.create', ['people_id' => $people_id]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id = null)
    {

        // Valideer de inkomende verzoeken
        /*
    $request->validate([
        'people_id' => 'required|integer',
        'images.*' => 'required|images|mimes:jpeg,png,jpg,gif,svg|max:2048', // Pas de validatieregels naar wens aan
    ]);*/
    $peopleGallery = new PeopleGallery();
    $peopleGallery->people_id = $request->input('people_id');
    $peopleGallery->images = $request->input('images');

    // Verwerk elk geüpload bestand
    if($request->hasFile('images')){
        foreach ($request->file('images') as $file) {
            $peopleGallery = new PeopleGallery();
            $peopleGallery->people_id = $request->input('people_id');
            
            $imagePath = $file->store('images/gallery', 'public');
            $peopleGallery->images = Storage::url($imagePath);
            
            $peopleGallery->save();
        }
        
    }

    return redirect()->route('people.show', ['people' => $request->get('people_id')]);
        /*
        $peopleGallery = new PeopleGallery();
        $peopleGallery->people_id = $request->input('people_id');
        $peopleGallery->images = $request->input('images');

        if($request->hasFile('images')){
            $imagePath = $request->file('images')->store('images/gallery', 'public');
            $peopleGallery->image = Storage::url($imagePath);
        }

        $peopleGallery->save();

        
        return redirect()->route('people.show', ['people' => $request->get('people_id')]);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $peopleGallery = PeopleGallery::find($id);
        $peopleGallery->delete();

        return redirect()->back();
    }
}
