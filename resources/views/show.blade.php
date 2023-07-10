<x-layout>
    <main >
        <div class="" style="margin-left: 3rem;margin-right: 3rem" >
            <div class="card mb-3" style="max-width: 100%; margin-top: 5rem;">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="true" href="#">Prueba</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="true" href="#">Prueba</a>
                        </li>
                    </ul>
                </div>

                <div class="row g-0">
                    <div class="col-md-4">
                        <x-pokemon-carousel :pokemon="$pokemon" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon->nombre }}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
