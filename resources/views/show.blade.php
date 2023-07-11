<x-layout>
    <main >
        <div class="" style="margin-left: 3rem;margin-right: 3rem" >

            <div class="card mb-3" style="max-width: 100%; margin-top: 5rem;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <x-pokemon-carousel :pokemon="$pokemon" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon->Nombre }}</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>


                        <table class="table table-bordered table-striped text-center ">
                            <thead class="thead thead-dark">
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </th>
                              </tr>
                            </thead>
                            <tbody style="height: 1rem ; overflow:scroll">
                                @foreach ($movimientos as $movimiento)
                                    <tr>
                                    <th scope="row">{{ $movimiento->MovimientoID }}</th>
                                    <td>{{ $movimiento->Nombre }}</td>
                                    <td>{{ $movimiento->Descripcion }}</td>
                                    <td>{{ $movimiento->tipo->Nombre}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-secundary" data-bs-toggle="modal" data-bs-target="#Modal{{ $movimiento->MovimientoID }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>

                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="Modal{{ $movimiento->MovimientoID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar {{ $movimiento->Nombre }} de {{ $pokemon->Nombre }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/borrar" method="post">
                                                    @csrf

                                                    <input hidden name="pokeID" id="pokeID" value="{{ $pokemon->PokemonID }}">
                                                    <input hidden name="moveID" id="moveID" value="{{ $movimiento->MovimientoID}}">

                                                    <div class="modal-body">

                                                        <h5>Desea eliminar el movimiento {{ $movimiento->Nombre }} de {{ $pokemon->Nombre }}?</h5>

                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Borrar</button>
                                                    </div>
                                                </form>

                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                  </tr>

                                @endforeach

                            </tbody>
                          </table>



                    </div>
                </div>
            </div>
        </div>







    </main>
</x-layout>
