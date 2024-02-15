@extends('layouts.admin')

@section('content')
    <h2 class="my-3">{{ $technology->name }}</h2>
    <p>slug: {{ $technology->slug }}</p>
    <a href="{{ route('admin.technologies.index') }}" class="btn btn-info text-light">Torna alla lista delle tecnologie</a>
@endsection