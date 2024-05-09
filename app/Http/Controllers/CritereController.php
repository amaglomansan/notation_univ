<?php

namespace App\Http\Controllers;
use App\Http\Controllers\University;
use App\Models\Critere;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CritereController extends Controller
{
    public function index()
    {
        $criteres = Critere::all(); // Récupérer toutes les universités

        return view('admin.criteres.index', compact('criteres'));
        // Vous pouvez charger les universités depuis la base de données ici
        return view('admin.criteres.index');
    }
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        // Créer une nouvelle instance d'université avec les données validées
        $critere = new Critere();
        $critere->name = $validatedData['name'];
        $critere->description = $validatedData['description'];
        // Assigner d'autres champs si nécessaire
        $critere->save();

        // Rediriger avec un message de succès
        return redirect()->route('admin.criteres.index')->with('success', 'critere ajoutée avec succès!');
    }

    public function edit(Critere $critere)
    {
        return view('admin.criteres.edit', compact('critere'));
    }

    public function update(Request $request, Critere $critere)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $critere->update($validatedData);

        return redirect()->route('admin.criteres.index')->with('success', 'critere mise à jour avec succès!');
    }

    public function destroy(Critere $critere)
    {
        $university->delete();

        return redirect()->route('admin.criteres.index')->with('success', 'critere supprimée avec succès!');
    }

    public function storeno(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'university_id' => 'required|exists:universities,id',
            'critere_id' => 'required|exists:criteres,id',
            'score' => 'required|numeric|min:0|max:10',
        ]);
        $userId = Auth::id();

        // Création d'une nouvelle note
        $note = new Note();
        $note->university_id = $validatedData['university_id'];
        $note->critere_id = $validatedData['critere_id'];
        $note->user_id = $userId;
        $note->score = $validatedData['score'];
        $note->save();

        // Redirection ou autre action après l'enregistrement de la note
        return redirect()->back()->with('success', 'Note enregistrée avec succès!');
    }
}
