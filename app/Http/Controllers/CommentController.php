<?php

namespace App\Http\Controllers;
use App\Models\University;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'university_id' => 'required|string',
            'user_id' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $comments = Comment::all();
        $comment = new Comment();
        $comment->university_id = $validatedData['university_id'];
        $comment->user_id = Auth::id();
        $comment->content = $validatedData['content'];
        $comment->save();
        return redirect()->route('utilisateur.comments.indexu')->with('success', 'commentaire ajoutée avec succès!');
    }

    public function edit(Comment $comment)
    {
        return view('utilisateur.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'university_id' => 'required|string',
            'user_id' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $comment->update($validatedData);

        return redirect()->route('admin.comments.index')->with('success', 'commentaire mise à jour avec succès!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'commentaire supprimée avec succès!');
    }

    public function indexu()
    {
        $universities = University::all();
        $comments = Comment::all();
        return view('utilisateur.comments.indexu', compact('comments','universities'));
    }
   
}
