<?php

namespace App\Http\Controllers;
use App\Models\Critere;
use App\Models\University;
use App\Models\Classement;
use App\Models\Note;
use Illuminate\Http\Request;

class ClassementController extends Controller
{
    public function index()
    {
        $criteres = Critere::all(); // Récupère tous les critères
        return view('utilisateur.classement.index', compact('criteres'));
    }

    public function show(Request $request)
    {
        $critere_id = $request->input('critere_id');
        $classement = Classement::where('critere_id', $critere_id)->with('university')->get();
        $criteres = Critere::all();
        return view('utilisateur.classement.index', compact('classement', 'criteres'));
    }
}