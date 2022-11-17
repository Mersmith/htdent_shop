<div>
    @section('tituloPagina', 'Mis Direcciones')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">MIS DIRECCIONES</h2>

    @php
        $departamentosJson = file_get_contents('ubigeo/departamentos.json');
        $departamentos = collect(json_decode($departamentosJson, true));
        
        if ($region_id) {
            $buscarNombreDepartamento = $departamentos->where('id_ubigeo', $region_id)->first();
            $nombreDepartamento = $buscarNombreDepartamento['nombre_ubigeo'];
            $provinciasJson = file_get_contents('ubigeo/provincias.json');
            $provincias = collect(json_decode($provinciasJson, true));
            $provinciasSeleccionadas = $provincias->where('id_ubigeo', $region_id)->all();
            dd($provincias);
            //$provinciasSeleccionadas = $provincias[$region_id];
        }
        
        if ($provincia_id) {
            dd($provinciasSeleccionadas[0]);
            //$buscarNombreProvincia = $provinciasSeleccionadas->where('id_ubigeo', $provincia_id)->first();
            //$nombreProvincia = $buscarNombreProvincia['nombre_ubigeo'];
            //$distritosJson = file_get_contents('ubigeo/distritos.json');
            //$distritos = collect(json_decode($distritosJson, true));
            //$distritosSeleccionados = $distritos[$provincia_id];
        }
    @endphp
    <form wire:submit.prevent="creaDireccion" class="formulario">
        <!--Dos input-->
        <div class="contenedor_2_elementos">
            <!--Nombre-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Nombre: </p>
                <input type="text" wire:model="nombre">
                @error('nombre')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <!--Celular-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Celular: </p>
                <input type="text" wire:model="celular">
                @error('celular')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        <!--Dos input-->
        <div class="contenedor_2_elementos">
            <!--Direccion-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Dirección: </p>
                <input type="text" wire:model="direccion">
                @error('direccion')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <!--Referencia-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Referencia: </p>
                <input type="text" wire:model="referencia">
                @error('referencia')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        <!--Dos input-->
        <div class="contenedor_2_elementos">
            <!--Codigo-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Código Postal: </p>
                <input type="text" wire:model="codigo_postal">
                @error('codigo_postal')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <!--Región-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Región: </p>
                <select wire:model="region_id">
                    <option value="" selected disabled>Seleccione su región</option>
                    @foreach ($departamentos as $keyDeparmento => $departamento)
                        <option value="{{ $departamento['id_ubigeo'] }}">{{ $departamento['nombre_ubigeo'] }}</option>
                    @endforeach
                </select>
                @error('region_id')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        @if ($region_id)
            <p>Región-> {{ $nombreDepartamento }}</p>
        @endif
        @if ($provincia_id)
            <p>Provincia-> {{-- $nombreProvincia --}}</p>
        @endif
        <!--Dos input-->
        <div class="contenedor_2_elementos">
            <!--Provincia-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Provincia: </p>
                <select wire:model="provincia_id">
                    <option value="" selected disabled>Seleccione su provincia:</option>
                    @if ($region_id)
                        @foreach ($provinciasSeleccionadas as $keyProvincia => $provincia)
                            <option value="{{ $provincia['id_ubigeo'] }}">{{ $provincia['nombre_ubigeo'] }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('provincia_id')
                    <span>{{ $message }}</span>
                @enderror
            </label>
            <!--Distrito-->
            <label class="label_principal">
                <p class="estilo_nombre_input">Distrito: </p>
                <select wire:model="distrito_id">
                    <option value="" selected disabled>Seleccione su distrito:</option>
                    @if ($provincia_id)
                        @foreach ($distritosSeleccionados as $keyDistrito => $distrito)
                            <option value="{{ $distrito['id_ubigeo'] }}">{{ $distrito['nombre_ubigeo'] }}</option>
                        @endforeach
                    @endif
                </select>
                @error('distrito_id')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        <!--Enviar-->
        <div class="contenedor_1_elementos">
            <input type="submit" value="Agregar Dirección">
        </div>
    </form>

</div>
