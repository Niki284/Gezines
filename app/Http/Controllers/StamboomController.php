<?php

namespace App\Http\Controllers;

use App\Models\Families;
use App\Models\Personen;
use Illuminate\Http\Request;

class StamboomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*
        $person = Personen::all();
        return view('stamboom.index', compact('person'));*/
        $personen = Personen::with('families', 'huwelijken')->get();
        // dd($personen);
        return view('stamboom.index', [
            'personen' => $personen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('stamboom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'naam' => 'required|string|max:255',
            'tussenvoegsel' => 'nullable|string|max:255',
            'achternaam' => 'required|string|max:255',
            'geboortedatum' => 'required|date',
            'geboorteplaats' => 'required|string|max:255',
            'geslacht' => 'required|in:Man,Vrouw',
            'telefoonnummer' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'adres' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:255',
            'woonplaats' => 'nullable|string|max:255',
            'land' => 'nullable|string|max:255',
            'nationaliteit' => 'nullable|string|max:255',
            'vader_id' => 'nullable|exists:personen,id',
            'moeder_id' => 'nullable|exists:personen,id',
        ]);

        $persoon = Personen::create([
            'voornaam' => $request->naam,
            'tussenvoegsel' => $request->tussenvoegsel,
            'achternaam' => $request->achternaam,
            'geboortedatum' => $request->geboortedatum,
            'geboorteplaats' => $request->geboorteplaats,
            'geslacht' => $request->geslacht,
            'telefoonnummer' => $request->telefoonnummer,
            'email' => $request->email,
            'adres' => $request->adres,
            'postcode' => $request->postcode,
            'woonplaats' => $request->woonplaats,
            'land' => $request->land,
            'nationaliteit' => $request->nationaliteit,
        ]);

        if ($request->vader_id || $request->moeder_id) {
            $familie = Families::create([
                'ouder1_id' => $request->vader_id,
                'ouder2_id' => $request->moeder_id,
            ]);

            $familie->kinderen()->attach($persoon->id);
        }

        return redirect()->route('stamboom.index')->with('success', 'Persoon succesvol toegevoegd!');
        /*
        $person = new Personen();
        $person->voornaam = $request->voornaam;
        $person->tussenvoegsel = $request->tussenvoegsel;
        $person->achternaam = $request->achternaam;
        $person->geboortedatum = $request->geboortedatum;
        $person->geboorteplaats = $request->geboorteplaats;
        $person->geslacht = $request->geslacht;
        $person->telefoonnummer = $request->telefoonnummer;
        $person->email = $request->email;
        $person->adres = $request->adres;
        $person->postcode = $request->postcode;
        $person->woonplaats = $request->woonplaats;
        $person->land = $request->land;
        $person->nationaliteit = $request->nationaliteit;
        $person->save();
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
    }
}
