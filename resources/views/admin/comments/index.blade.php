@extends('dashboardad')
@section('content')
<div class="mt-8">
    <h2 class="text-lg font-medium text-gray-700 mb-4">Liste des commentaires</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Universite</th>
                    <th class="border border-gray-300 px-4 py-2">User</th>
                    <th class="border border-gray-300 px-4 py-2">Commentaire</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $comment->university->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $comment->user->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $comment->content }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.criteres.edit', $comment->id) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" class="inline">
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

