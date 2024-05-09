@extends('dashboard')
@section('content')

<form action="{{ route('utilisateur.classement.show') }}" method="GET" class="mb-3">
    @csrf
    <div class="input-group">
        <label for="critere_id" class="input-group-text">Choisir un critère :</label>
        <select name="critere_id" id="critere_id" class="form-select">
            @foreach ($criteres as $critere)
                <option value="{{ $critere->id }}">{{ $critere->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Voir le classement</button>
    </div>
</form>

<div class="container mt-4">
<h1>Classement</h1>

<table class="table">
        <thead>
            <tr>
                <th>Université</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classement as $note)
            <tr>
                <td>{{ $note->university->name }}</td>
                <td>{{ $note->score }}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection