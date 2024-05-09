@extends('dashboardad')
@section('content')
<form action="{{route('admin.universites.store')}}" method="POST" >
    @csrf
    <h2 class="text-lg font-medium text-gray-700 mb-4">Creation d'une université</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Nom de l'université</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="website" class="form-label">Description</label>
        <input type="text" id="description" name="description" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="website" class="form-label">Lien</label>
        <input type="link" id="lien" name="lien" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Localisation</label>
        <input type="text" id="location" name="location" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Image</label>
        <input type="text" id="image" name="image" class="form-control" required>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>
<br>
<br>
<div class="mt-8">
    <h2 class="text-lg font-medium text-gray-700 mb-4">Liste des universités</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nom</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th class="border border-gray-300 px-4 py-2">Lien</th>
                    <th class="border border-gray-300 px-4 py-2">Localisation</th>
                    <th class="border border-gray-300 px-4 py-2">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($universities as $university)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $university->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $university->description }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $university->lien}}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $university->location }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $university->image }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.universites.edit', $university->id) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                        <form action="{{ route('admin.universites.destroy', $university->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

