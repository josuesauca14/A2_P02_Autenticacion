@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Detalle de tarea</h1>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Volver</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5>{{ $task->title }}</h5>
            <p class="mb-2 text-muted">Estado: {{ ucfirst(str_replace('_', ' ', $task->status)) }}</p>
            <p class="mb-2 text-muted">Fecha limite: {{ optional($task->due_date)->format('Y-m-d') ?? 'Sin fecha' }}</p>
            <hr>
            <p class="mb-0">{{ $task->description ?: 'Sin descripcion' }}</p>
        </div>
    </div>

    @can('tasks.manage')
        <div class="mt-3 d-flex gap-2">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseas eliminar esta tarea?')">Borrar</button>
            </form>
        </div>
    @endcan
</div>
@endsection
