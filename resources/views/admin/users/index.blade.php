@extends('adminlte::page')

@section('title', 'Gym')


@section('content')
    <br>
    @if (session('info'))
        Id del Usuario Creado {{ session('info') }}
    @endif

    @livewire('admin.users.index-table')

@stop


@section('css')

@stop

@section('js')

    @if (session('info'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El usuario se creó con éxito',
                showConfirmButton: false,
                timer: 1500
            });
        </script>

    @endif
@stop
