<div class="mb-3">
    <label for="title" class="form-label">Titulo</label>
    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $task?->title) }}"
        class="form-control @error('title') is-invalid @enderror"
        required
    >
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descripcion</label>
    <textarea
        id="description"
        name="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('description', $task?->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Estado</label>
    <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
        @php
            $currentStatus = old('status', $task?->status ?? 'pending');
        @endphp
        <option value="pending" @selected($currentStatus === 'pending')>Pendiente</option>
        <option value="in_progress" @selected($currentStatus === 'in_progress')>En progreso</option>
        <option value="completed" @selected($currentStatus === 'completed')>Completada</option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="due_date" class="form-label">Fecha limite</label>
    <input
        type="date"
        id="due_date"
        name="due_date"
        value="{{ old('due_date', $task?->due_date?->format('Y-m-d')) }}"
        class="form-control @error('due_date') is-invalid @enderror"
    >
    @error('due_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
