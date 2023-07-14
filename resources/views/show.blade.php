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
                            <!-- Button trigger modal agregar -->
                            <button type="button" class="btn btn-secundary btn-agregar" data-bs-toggle="modal" data-bs-target="#modal-agregar-movimiento" data-pokeID='{{ $pokemon->PokemonID }}'>
                                Agregar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>

                        </div>
                        <div class="px-3 border-black" style="height: 13rem;overflow:auto;">
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
                                <tbody  id='tabla-pokemon-{{ $pokemon->PokemonID }}'>
                                    @foreach ($movimientos as $movimiento)
                                        <tr>
                                        <th scope="row">{{ $movimiento->MovimientoID }}</th>
                                        <td>{{ $movimiento->Nombre }}</td>
                                        <td>{{ $movimiento->Descripcion }}</td>
                                        <td>{{ $movimiento->tipo->Nombre}}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-secundary btn-borrar" data-bs-toggle="modal" data-bs-target="#modal-eliminar-movimiento" data-pokeID='{{ $pokemon->PokemonID }}' data-moveID='{{ $movimiento->MovimientoID}}'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>



        </div>




                                                            <!-- Modal Eliminar -->


        <div class="modal fade" id="modal-eliminar-movimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body" id="asd">
                            <h5>Desea eliminar el movimiento?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary borar-movimiento">Borrar</button>
                        </div>
                </div>
            </div>
        </div>






                                                        <!-- Modal Agregar -->


        <div class="modal fade" id="modal-agregar-movimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="" style="height:20rem; overflow:auto">
                            <div class="modal-body" id="asd">
                                <h5>Elija el movimiento a Agregar</h5>
                            </div>
                            <div class="container px-3 overflow-auto" style="height:12rem">

                                    @foreach ($movimientosNo as $moveNo)
                                    <div class="row">
                                        <div class="col col-1">
                                            <input class="form-check-input check-agregar" type="radio" name="flexRadioDefault" id="flexRadioDefault{{ $moveNo->MovimientoID }}" value="{{ $moveNo->MovimientoID }}">
                                        </div>
                                        <div class="col col-4">
                                            <label class="form-check-label " for="flexRadioDefault{{ $moveNo->MovimientoID }}">{{ $moveNo->Nombre }}</label>
                                        </div>
                                        <div class="col col-4">
                                            <label class="form-check-label" for="flexRadioDefault{{ $moveNo->MovimientoID }}">{{ $moveNo->Tipo->Nombre }}</label>
                                        </div>
                                    </div>
                                    @endforeach

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary agregar-movimiento">Agregar</button>
                        </div>
                </div>
            </div>
        </div>























        <script>
            $(document).ready(function() {

                let pokeID;
                let moveID;

                $('body').on('click', '.btn-borrar',function() {
                    pokeID = $(this).data('pokeid');
                    moveID = $(this).data('moveid');
                });

                $('body').on('click', '.borar-movimiento', function (e){
                    let url1 = `/pokemon/${pokeID}/movimientos`;

                    $.ajax({
                        url: "/borrar-con-ajax",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'pokeID': pokeID,
                            'moveID': moveID,
                        },
                        dataType: "json",
                        method: "POST",
                        success: function(response) {
                            //Acciones si success
                            $.ajax({
                                url: url1,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'pokeID': pokeID,
                                },
                                dataType: "json",
                                method: "GET",
                                success: function(response) {

                                    $(`#modal-eliminar-movimiento`).modal('toggle');

                                    $(`#tabla-pokemon-${pokeID} tr`).remove();

                                    response.forEach(element => {
                                        $(`#tabla-pokemon-${pokeID}`).append(
                                            `<tr>
                                                <td>${element.MovimientoID}</td>
                                                <td>${element.Nombre}</td><td>${element.Descripcion}</td>
                                                <td>${element.tipo.Nombre}</td>
                                                <td>
                                                    <button type="button" class="btn btn-secundary btn-borrar" data-bs-toggle="modal" data-bs-target="#modal-eliminar-movimiento" data-pokeID='${ element.pivot.PokemonID }' data-moveID='${ element.MovimientoID}'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>`);
                                    });
                                },
                                error: function (e) {
                                    //Acciones si error
                                    console.log(e)
                                }
                            });
                        },
                        error: function (e) {
                            //Acciones si error
                            console.log(e)
                        }
                    });


                });

                $('body').on('click', '.btn-agregar',function() {
                    pokeID = $(this).data('pokeid');
                });

                $('body').on('click', '.agregar-movimiento', function (e){
                    let url1 = `/pokemon/${pokeID}/movimientos`;

                    moveID = $(`.check-agregar:checked`).val();

                     $.ajax({
                        url: "/agregar-con-ajax",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'pokeID': pokeID,
                            'moveID': moveID,
                        },
                        dataType: "json",
                        method: "POST",
                        success: function(response) {
                            //Acciones si success
                            $.ajax({
                                url: url1,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'pokeID': pokeID,
                                },
                                dataType: "json",
                                method: "GET",
                                success: function(response) {

                                    $(`#modal-agregar-movimiento`).modal('toggle');

                                    $(`#tabla-pokemon-${pokeID} tr`).remove();

                                    response.forEach(element => {
                                        $(`#tabla-pokemon-${pokeID}`).append(
                                            `<tr>
                                                <td>${element.MovimientoID}</td>
                                                <td>${element.Nombre}</td><td>${element.Descripcion}</td>
                                                <td>${element.tipo.Nombre}</td>
                                                <td>
                                                    <button type="button" class="btn btn-secundary btn-borrar" data-bs-toggle="modal" data-bs-target="#modal-eliminar-movimiento" data-pokeID='${ element.pivot.PokemonID }' data-moveID='${ element.MovimientoID}'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>`);
                                    });
                                },
                                error: function (e) {
                                    //Acciones si error
                                    console.log(e)
                                }
                            });
                        },
                        error: function (e) {
                            //Acciones si error
                            console.log(e)
                        }
                    });


                });

            });

        </script>



    </main>
</x-layout>
