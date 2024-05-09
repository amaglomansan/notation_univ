<?php

namespace App\Http\Controllers;
use App\Models\University;
use App\Models\Critere;
use App\Models\User;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class NoteController extends Controller
{
    public function index(Note $note)
{
    $criteres = Critere::all();
    $universities = University::all();
    return view('utilisateur.criteres.indexu', compact('note'));
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'university_id' => 'required|exists:universities,id',
        'user_id' => 'required|exists:users,id',
        'critere_id.*' => 'required|exists:criteres,id',
        'score.*' => 'required|numeric|min:0|max:10',
    ]);

    $universityId = $validatedData['university_id'];
    $userId = Auth::id();
    $critereIds = $validatedData['critere_id'];
    $scores = $validatedData['score'];

    foreach ($critereIds as $index => $critereId) {
        $note = new Note();
        $note->university_id = $universityId;
        $note->critere_id = $critereId;
        $note->user_id = $userId;
        $note->score = $scores;
        $note->save();
    }

    return redirect()->route('utilisateur.criteres.indexu')->with('success', 'Notes enregistrées avec succès.');
}

public function indexu()
    {
        $universities = University::all();
        $criteres = Critere::all();
        return view('utilisateur.criteres.indexu', compact('universities', 'criteres'));
    }

}