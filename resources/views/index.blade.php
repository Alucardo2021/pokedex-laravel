<x-layout>
    <main class="" >

        @if ($pokemons->count())

            <x-pokemon-grid  :pokemons="$pokemons" :tipos="$tipos"/>



        @else

            <div class="text-center" style="margin-top:12rem">
                <p>No hay pokemons disponibles...</p>
            </div>

        @endif

    </main>
</x-layout>
