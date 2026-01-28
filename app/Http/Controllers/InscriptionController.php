<?php

namespace App\Http\Controllers;

use App\Models\formation;
use App\Models\inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    private function validation(Request $request)
    {

        return $request->validate([
            'formation_id' => 'required|exists:formation,id',
            'nom_apprenant' => 'required|string|max:150',
            'email' => 'required|email|max:150|unique:inscription,email,' . $request->id,
            'date_inscription' => 'required|date',
        ]);
    }
    public function index()
    {

        $inscriptions = inscription::all();

        if ($inscriptions) {
            return view("inscriptions.index", compact("inscriptions"));
        }
    }

    public function show($id)
    {

        $inscription = inscription::findOrFail($id);
        return view("inscriptions.show", compact("inscription"));
    }

    public function create()
    {
        $formations = formation::all();
        return view("inscriptions.create", compact('formations'));
    }

    public function store(Request $request)
    {

        inscription::create(($this->validation($request)));
        return redirect()->route("inscriptions.index");
    }

    public function edit($id)
    {

        $inscriptions = inscription::findOrFail($id);
        $formations = Formation::all();
        
        return view('inscriptions.edit', compact('inscriptions', 'formations'));
    }

    public function update(Request $request, $id)
    {

        $inscriptionById = inscription::findOrFail($id);
        $inscriptionById->update($this->validation($request));
        return redirect()->route("inscriptions.index");
    }

    public function delete($id)
    {
        $inscription = inscription::findOrFail($id);

        $inscription->delete();
        return redirect()->route('inscriptions.index');
    }
}
