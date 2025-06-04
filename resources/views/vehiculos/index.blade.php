@extends('layouts.app')
<!-- link para la función de js de local storage y el css theme -->

<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
<script src="{{ asset('js/theme.js') }}"></script>

<div style="display: flex; justify-content: center; align-items: center; gap: 10px; margin: 20px 0;">
<div class="mode-label">Modo oscuro</div>
  <label class="switch">
    <input type="checkbox" id="theme-toggle" onchange="toggleTheme()" />
    <span class="slider round"></span>
  </label>
</div>

@section('content')
<div class="bg-body-tertiary py-5">
    <div class="container">


        <div class="text-center mb-5">
            <h1 class="fw-bold display-4 text-dark">🚗 Vehículos Registrados</h1>
            <p class="lead text-secondary">Gestión y visualización de todos los vehículos disponibles</p>

        </div>


        @can('create-vehicles')
        <div class="text-end mb-3">
            <a href="{{ route('vehiculos.create') }}" class="btn btn-outline-success shadow-sm"> + Agregar Nuevo Vehículo</a>
        </div>
        @endcan

        @if(session('success'))
        <div class="alertaExito alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show">{{ session('warning') }}</div>
        @endif

        @if(session('danger'))
        <div class="alert alert-danger alert-dismissible fade show">{{ session('danger') }}</div>
        @endif

        @if(session('error'))
        <div class="alertaError alert alert-danger">{{ session('error') }}</div>
        @endif

            <div class="card shadow-lg border-0 rounded-4 bg-white">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0 table-bordered border-secondary-subtle">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->placa }}</td>
                                    <td>{{ $vehiculo->marca }}</td>
                                    <td>{{ $vehiculo->modelo }}</td>
                                    <td>{{ $vehiculo->año }}</td>
                                    <td><span class="badge text-bg-success rounded-pill px-3 py-2 upper text-uppercase {{ trim(strtolower($vehiculo->estado)) == 'activo' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $vehiculo->estado }}
                                        </span></td>
                                    <td>
                                        @can('update-vehicles', $vehiculo)
                                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                                        @endcan

                                        <button
                                            type="button"
                                            class="btn btn-outline-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#eliminarVehiculoModal"
                                            data-vehiculo-id="{{ $vehiculo->id }}"
                                            data-vehiculo-placa="{{ $vehiculo->placa }}"
                                            data-vehiculo-marca="{{ $vehiculo->marca }}"
                                            data-vehiculo-modelo="{{ $vehiculo->modelo }}">
                                            Eliminar
                                        </button>

                                        <div class="modal fade" id="eliminarVehiculoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content rounded-3 shadow">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Vehículo</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            ¿Estás seguro que deseas <strong>eliminar</strong> el vehículo
                                                            <span id="vehiculo-marca"></span> <span id="vehiculo-modelo"></span>
                                                            con placa <strong><span id="vehiculo-placa"></span></strong>?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                                                        <form method="POST" action="" style="display:inline-block" id="formulario-eliminar-modal">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger rounded-pill px-4">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">No hay vehículos registrados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
	const eliminarVehiculoModal = document.getElementById('eliminarVehiculoModal');

	if (eliminarVehiculoModal) {
		eliminarVehiculoModal.addEventListener('show.bs.modal', event => {
		    const button = event.relatedTarget;

			// Extraer la información del vehículo del botón que activó el modal
			const vehiculoId = button.dataset.vehiculoId;
			const vehiculoPlaca = button.dataset.vehiculoPlaca;
			const vehiculoMarca = button.dataset.vehiculoMarca;
			const vehiculoModelo = button.dataset.vehiculoModelo;

			// Actualizar el contenido del modal
			const modalTitle = eliminarVehiculoModal.querySelector('.modal-title');
			const modalBodyParagraph = eliminarVehiculoModal.querySelector('.modal-body p');
			const modalEliminarButton = eliminarVehiculoModal.querySelector('.modal-footer button.btn-danger');

			modalBodyParagraph.innerHTML = `
                ¿Estás seguro que deseas <strong>eliminar</strong> el vehículo
                ${vehiculoMarca} ${vehiculoModelo}
                con placa <strong>${vehiculoPlaca}</strong>?
            `;

			const formularioEliminar = eliminarVehiculoModal.querySelector('form');
			formularioEliminar.action = `/vehiculos/${vehiculoId}`;
		});
    }

	// Eliminar el mensaje de éxito o error después de 3 segundos
	const alertaDeExito = document.querySelector('.alertaExito');
	if (alertaDeExito) {
		setTimeout(() => {
			alertaDeExito.remove();
		}, 2000);
    }

	const alertaDeError = document.querySelector('.alertaError');
	if (alertaDeError) {
		setTimeout(() => {
			alertaDeError.remove();
		}, 2000);
    }

	const alertaWarning = document.querySelector('.alert-warning');
	if (alertaWarning) {
		setTimeout(() => {
			alertaWarning.remove();
		}, 2000);
    }

	const alertaDanger = document.querySelector('.alert-danger');
	if (alertaDanger) {
		setTimeout(() => {
			alertaDanger.remove();
		}, 2000);
    }
</script>
@endsection