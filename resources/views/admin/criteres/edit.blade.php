@extends('dashboardad')
@section('content')
    <form action="{{ route('admin.criteres.update', $critere->id) }}" method="POST" class="w-full max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="form-label">Nom du critere</label>
            <input type="text" id="name" name="name" value="{{ old('name', $critere->name) }}" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description', $critere->description) }}" class="form-control">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
    </form>
@endsection