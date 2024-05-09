@extends('dashboardad')
@section('content')
    <form action="{{ route('admin.universites.update', $university->id) }}" method="POST" class="w-full max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="form-label">Nom de l'université</label>
            <input type="text" id="name" name="name" value="{{ old('name', $university->name) }}" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description', $university->description) }}" class="form-control">
        </div>
        <div class="mb-4">
            <label for="Website" class="form-label">Lien</label>
            <input type="text" id="lien" name="lien" value="{{ old('lien', $university->lien) }}" class="form-control">
        </div>
        <div class="mb-4">
            <label for="location" class="form-label">Localisation</label>
            <input type="text" id="location" name="location" value="{{ old('location', $university->location) }}" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="image" class="form-label">Image</label>
            <input type="text" id="image" name="image" value="{{ old('image', $university->image) }}" class="form-control" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
    </form>
@endsection