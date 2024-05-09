@extends('dashboardad')
@section('content')
<div>
<form action="{{route('admin.criteres.store')}}" method="POST" class="w-full max-w-lg mx-auto">
    @csrf
    <h2 class="text-lg font-medium text-gray-700 mb-4">Creation de critere</h2>
    <div class="mb-4">
        <label for="name" class="form-label">Nom</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="mb-4">
        <label for="website" class="form-label">Description</label>
        <input type="text" id="description" name="description" class="form-control" required>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>
<br>
<br>
<div class="mt-8">
    <h2 class="text-lg font-medium text-gray-700 mb-4">Liste des criteres</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nom</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($criteres as $critere)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $critere->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $critere->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.criteres.edit', $critere->id) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                        <form action="{{ route('admin.criteres.destroy', $critere->id) }}" method="POST" class="inline">
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

</div>
@endsection

