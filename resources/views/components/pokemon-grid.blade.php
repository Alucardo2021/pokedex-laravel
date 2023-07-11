@props(['pokemons','tipos'])

<div class="album py-5 bg-body-tertiar mt-5">
    <div class="container">
      <div class="row row-cols-3 justify-content-center">

        @foreach ($pokemons as $pokemon)

                        <div class="col">
                            <div class="card border-dark shadow-sm text-center" style="width: 80%;">

                                <x-pokemon-carousel :pokemon="$pokemon" />


                                <x-pokemon-card-body :pokemon="$pokemon" :tipos="$tipos" />


                            </div>
                          </div>


        @endforeach

      </div>

        <div class="w-100 text-center">
            {{ $pokemons->links() }}
        </div>
    </div>
</div>
