@props(['pokemon','tipos'])

<div class="card-body">
    <div class="mb-2">
        @foreach ($pokemon->tipos as $tipo)

        <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">
            <img class="rounded-circle me-1" width="24" height="24" src="{{$tipo->Icono }}" alt="">

            {{ $tipo->Nombre}}
        </span>

        @endforeach

    </div>

    <p class="card-text"> {{ $pokemon->Nombre }}</p>


    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="/pokemon/{{ $pokemon->PokemonID }}" role="button">Ver</a>
            <a class="btn btn-sm btn-outline-secondary" href="#" role="button">Eliminar</a>
            <a class="btn btn-sm btn-outline-secondary" href="#" role="button">Editar</a>
        </div>
        <small class="text-body-secondary">ID: {{ $pokemon->PokemonID }}</small>
    </div>
</div>
