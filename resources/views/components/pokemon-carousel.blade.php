@props(['pokemon'])

<div id="carousel{{ $pokemon->id }}" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active" >
            <img src="{{ $pokemon->sprite_comun }}" class="d-block w-100 border-black" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ $pokemon->sprite_shiny}}" class="d-block w-100" alt="...">
        </div>
    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $pokemon->id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $pokemon->id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" ></span>
            <span class="visually-hidden">Next</span>
        </button>
</div>
