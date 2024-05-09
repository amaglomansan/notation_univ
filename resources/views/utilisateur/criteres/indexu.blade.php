@extends('dashboard')
@section('content')
<form method="POST" action="{{ route('utilisateur.criteres.storeno') }}" class="text-center">
    @csrf
    <br>

    <select class="form-select" class="form-label col-sm-2" name="university_id" id="university_id">
    @foreach ($universities as $university)
        <option class="form-label col-sm-2" value="{{ $university->id }}">{{ $university->name }}</option>
    @endforeach
    </select>
    <br>

    <select class="form-select" class="form-label col-sm-2" name="critere_id" id="critere_id">
    @foreach ($criteres as $critere)
        <option class="form-label col-sm-2" value="{{ $critere->id }}">{{ $critere->name }}</option>
    @endforeach
    </select>
    <br>

    <div class="mb-1 row">
    <label for="Note" class="form-label col-sm-2">Note ou Score</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" id="score" name="score" required max="10" min="0">
    </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>
@endsection
