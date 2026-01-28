<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    private function validation(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'duree' => 'required|integer|min:1',
        ]);
    }
    public function index()
    {

        $formations = formation::all();

        if ($formations) {
            return view("formations.index", compact("formations"));
        }
    }

    public function show($id)
    {

        $formation = formation::findOrFail($id);
        return view("formations.show", compact("formation"));
    }

    public function create()
    {
        return view("formations.create");
    }

    public function store(Request $request)
    {

        formation::create(($this->validation($request)));
        return redirect()->route("formations.index");
    }

    public function edit($id)
    {

        $formations = formation::findOrFail($id);
        return view("formations.edit", compact("formations"));
    }

    public function update(Request $request, $id)
    {

        $formationById = formation::findOrFail($id);
        $formationById->update($this->validation($request));
        return redirect()->route("formations.index");
    }

    public function delete($id)
    {
        $formation = formation::findOrFail($id);

        $formation->delete();
        return redirect()->route('formations.index');
    }
}
