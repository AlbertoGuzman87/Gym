@extends('adminlte::page')

@section('title', 'Gym')


@section('content')
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card mt-2">
                <div class="card-header bg-navy">
                    <h5 class="text-center mt-1"><i class="fas fa-user-plus"></i> Registro de Usuario</h5>
                </div>


                {!! Form::open(['route' => 'admin.users.store']) !!}
                <div class="card-body">
                    <h5 class="font-weight-bold">
                        <u>Datos del Generales del Usuario</u>
                    </h5 class="font-weight-bold">

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre', ['class' => '']) !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre completo']) !!}
                                </div>
                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                {!! Form::label('email', 'Correo', ['class' => '']) !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo']) !!}
                                </div>
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                {!! Form::label('edad', 'Edad', ['class' => '']) !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    {!! Form::number('edad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la edad']) !!}
                                </div>
                                @error('edad')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <p class="font-weight-bold">Genero</p>
                                <label>
                                    {!! Form::radio('genero', 'H', true) !!}
                                    Hombre
                                </label>
                                <label>
                                    {!! Form::radio('genero', 'M', null, ['class' => 'ml-3']) !!}
                                    Mujer
                                </label>
                            </div>
                            @error('genero')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="form-group">

                                {!! Form::label('status_user_id', 'Estatus:') !!}
                                {!! Form::select('status_user_id', $status, null, ['class' => 'form-control']) !!}

                            </div>
                            @error('status_user_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="linea"></div>

                        <h5 class="font-weight-bold">
                            <u>Datos de Pago</u>
                        </h5 class="font-weight-bold">

                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="form-group">

                                <p class="font-weight-bold">Va a pagar de una ves</p>
                                <label>
                                    {!! Form::radio('pago', '1', true) !!}
                                    Si
                                </label>
                                <label>
                                    {!! Form::radio('pago', '2', null, ['class' => 'ml-3']) !!}
                                    No
                                </label>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Crear Usuario', ['class' => 'btn  btn-crear float-right']) !!}

                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary float-right mr-2">
                        <i class="fas fa-ban"></i> Cancelar
                    </a>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
        <div class="col-md-1"></div>
    </div>


@stop


@section('css')
    <style>
        .btn-crear {
            background: transparent;
            border-color: #d81b60;
            color: #d81b60;
        }

        .btn-crear:hover {
            background: #d81b60;
            color: white;
        }

        .linea {
            width: 100%;
            height: 1px;
            background-color: rgba(26, 17, 95, 0.315);
            margin-bottom: 15px;
        }

    </style>
@stop

@section('js')
    {{-- <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        });
    </script> --}}
@stop
