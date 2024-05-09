@extends('dashboard')
@section('content')
<form action="{{ route('utilisateur.comments.store') }}" method="POST">
    @csrf 
    <div class="mb-3">
        <label for="university_id" class="form-label">Choisir une université :</label>
        <select name="university_id" id="university_id" class="form-select" required>
            @foreach ($universities as $university)
                <option value="{{ $university->id }}">{{ $university->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="comment_content" class="form-label">Votre commentaire :</label>
        <textarea name="content" id="comment_content" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>
@endsection