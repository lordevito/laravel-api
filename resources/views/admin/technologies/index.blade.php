@extends('layouts.admin')

@section('content')
    <h2 class="my-3">Lista delle tecnologie</h2>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary btn-sm">Aggiungi una nuova tecnologia</a>
    @if (session('messages'))
        <div class="toast show position-fixed bottom-0 end-0 p-1 align-items-center text-bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('messages') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->name }}</td>
                    <td class="col-8">{{ $technology->slug }}</td>
                    <td><a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-primary btn-sm">modifica</a>
                    </td>
                    <td><a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-secondary btn-sm">mostra</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="button" value="cancella" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $loop->iteration }}">
                            <div class="modal fade" id="modal{{ $loop->iteration }}" tabindex="-1"
                                aria-labelledby="modalLabel{{ $loop->iteration }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalLabel{{ $loop->iteration }}">Sei sicuro
                                                di voler cancellare
                                                la tecnologia '{{ $technology->name }}'?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <input type="submit" value="Si" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection