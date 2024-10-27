<!-- resources/views/archivos/index.blade.php -->
<form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Selecciona un archivo:</label>
    <input type="file" name="file" required>
    <button type="submit">Subir</button>
</form>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<h2>Archivos Subidos:</h2>
@foreach ($files as $file)
    <p>
        {{ $file->name }}
        <a href="{{ asset('storage/' . $file->route) }}" target="_blank">Descargar</a>

    </p>
@endforeach

<a href="/"> ---> Volver <--- </a>
