@extends('adminlte::page')

@section('title', 'Gym')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="card bg-dark">
        <div class="card-header">
            <h3 class="card-title">Usuarios</h3>

            <div class="card-tools">
                <span class="badge badge-danger">Ultimos 8 Registrados</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <ul class="users-list clearfix">
                @foreach ($users as $user)
                    <li>
                        @if (is_null($user->profile_photo_path))
                            <img width="50" height="30" src="{{ asset('assets/img/testimonial/ns.png') }}"
                                alt="{{ $user->name }}">
                        @else
                            <img width="50" height="30" src="{{ '/storage/' . $user->profile_photo_path }}"
                                alt="{{ $user->name }}">
                        @endif
                        <a class="users-list-name text-white" href="#">{{ $user->name }}</a>
                        <span class="users-list-date">
                            <div wire:poll.visible>
                                {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                            </div>
                        </span>
                    </li>
                @endforeach
            </ul>
            <!-- /.users-list -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center bg-secondary">
            <a href="{{ route('admin.users.index') }}">
                <i class="fas fa-arrow-circle-right"></i>
                <b>Ver Todos Los Usuario</b>
            </a>
        </div>
        <!-- /.card-footer -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                {{-- Minimal with title, text and icon --}}
                <x-adminlte-info-box title="Title" text="some text" icon="far fa-lg fa-star" />
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                {{-- Themes --}}
                <x-adminlte-info-box title="Views" text="424" icon="fas fa-lg fa-eye text-dark" theme="gradient-teal" />

            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <x-adminlte-info-box title="Downloads" text="1205" icon="fas fa-lg fa-download" icon-theme="purple" />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <x-adminlte-info-box title="528" text="User Registrations" icon="fas fa-lg fa-user-plus text-primary"
                    theme="gradient-primary" icon-theme="white" />
            </div>
            <div class="col-12 col-sm-6 col-md-8">
                <x-adminlte-info-box title="Tasks" text="75/100" icon="fas fa-lg fa-tasks text-orange" theme="warning"
                    icon-theme="dark" progress=75 progress-theme="dark"
                    description="75% of the tasks have been completed" />
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                {{-- Loading --}}
                <x-adminlte-small-box title="Loading" text="Loading data..." icon="fas fa-chart-bar" theme="info" url="#"
                    url-text="More info" loading />
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                {{-- Themes --}}
                <x-adminlte-small-box title="424" text="Views" icon="fas fa-eye text-dark" theme="teal" url="#"
                    url-text="View details" />

            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <x-adminlte-small-box title="528" text="User Registrations" icon="fas fa-user-plus text-teal"
                    theme="primary" url="#" url-text="View all users" />
            </div>
        </div>
    </div>













    <x-adminlte-small-box title="Downloads" text="1205" icon="fas fa-download text-white" theme="purple" />






    <x-adminlte-card title="Info Card" theme="info" icon="fas fa-lg fa-bell" collapsible maximizable>
        An info theme card with all the tool buttons...
    </x-adminlte-card>

@section('plugins.Summernote', true)




    {{-- With placeholder, sm size, label and some configuration --}}
    @php
    $config = [
        'height' => '100',
        'toolbar' => [
            // [groupName, [list of button]]
            ['style', ['fontname', 'bold', 'italic', 'underline', 'clear']],

            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            ['insert', ['link', 'hr', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
    ];
    @endphp
    <x-adminlte-text-editor name="teConfig" label="WYSIWYG Editor" label-class="text-danger" igroup-size="bg"
        placeholder="Write some text..." :config="$config" id="summernote" />

    <x-adminlte-card title="Success Card" theme="success" theme-mode="full" icon="fas fa-lg fa-thumbs-up"
        collapsible="collapsed" maximizable>
        A collapsible card with full success theme and collapsed...
    </x-adminlte-card>
    {{-- Icons Only --}}
    <x-adminlte-button theme="primary" icon="fab fa-fw fa-lg fa-facebook-f" />
    <x-adminlte-button theme="info" icon="fab fa-fw fa-lg fa-twitter" />

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
