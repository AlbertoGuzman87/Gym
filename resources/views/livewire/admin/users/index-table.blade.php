<div>
    <x-adminlte-card title="Lista de Usuarios" theme="navy" icon="fas fa-lg fa-bell" collapsible maximizable>


        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6 col-sm-2 col-md-2">
                        <div class="items-center">
                            <span>Buscar por:</span>
                            <select wire:model="searchby" class="mx-2 form-control">
                                <option value="name">Nombre <i class="fas fa-child"></i></option>
                                <option value="email">Correo</option>
                                <option value="matricula" selected>Matricula</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-6 col-sm-2 col-md-2">
                        <span>Estatus</span>
                        <select wire:model='SearchStatus' class="form-control">
                            <option value="0">Todos estatus</option>
                            @foreach ($status as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-9 col-sm-6 col-md-7">
                        <span></span><br>

                        <x-adminlte-input name="iUser" placeholder="Buscar..." wire:model='search'>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-search text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>

                    <div class="col-3 col-sm-2 col-md-1">
                        <span> </span><br>
                        <a href="{{route('admin.users.create')}}" class="btn btn-successbtn btn-outline-success float-right btn-md">
                            <i class="fas fa-user-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

            @if ($users->count())
                <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-head-fixed text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Matricula</th>
                                <th class="text-center">Estatus</th>
                                <th style="width: 40px" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->matricula }}</td>
                                    <td class="text-center">

                                        <p class="{{ $user->status_user->color }} rounded font-weight-bold">
                                            {{ $user->status_user->nombre }}
                                        </p>

                                    </td>
                                    <td>
                                        <x-adminlte-button class="btn-sm" type="edit" label="Editar"
                                            theme="outline-info" icon="fas fa-lg fa-edit" />
                                        <x-adminlte-button class="btn-sm" type="reset" label="Eliminar"
                                            theme="outline-danger" icon="fas fa-lg fa-trash" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        {{ $users->links() }}
                    </div>

                </div>
                <!-- /.card-footer -->
            @else
                <div class="text-red m-3">
                    No hay registros coincidentes
                </div>
            @endif
        </div>
        <!-- /.card -->


    </x-adminlte-card>
</div>




{{-- <x-adminlte-card title="Lista de Usuarios" theme="success" icon="fas fa-lg fa-bell" collapsible maximizable>
    <div class="card">

        <div class="card-header">

            <div class="row">
                <div class="col-6 col-sm-3 col-md-3">
                    <div class="items-center">
                        <span>Buscar por:</span>
                        <select wire:model="searchby" class="mx-2 form-control">
                            <option value="name">Nombre <i class="fas fa-child"></i></option>
                            <option value="email">Correo</option>
                            <option value="matricula" selected>Matricula</option>
                        </select>

                    </div>
                </div>
                <div class="col-6 col-sm-3 col-md-3">
                    <span>Estatus</span>
                    <select wire:model='SearchStatus' class="form-control">
                        <option value="0">Todos estatus</option>
                        @foreach ($status as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-sm-6 col-md-6">
                    <span>Busqueda</span>
                    <input type="text" class="form-control" placeholder="Buscar..." wire:model='search'>
                </div>
            </div>
        </div>

        @if ($users->count())
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Matricula</th>
                            <th class="text-center">

                                Estatus
                            </th>
                            <th style="width: 40px">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->matricula }}</td>
                                <td class="text-center">
                                    <button class="btn btn-md {{ $user->status_user->color }}">
                                        {{ $user->status_user->nombre }}
                                    </button>
                                </td>
                                <td>

                                    <x-adminlte-button class="btn-sm" type="reset" label="Eliminar"
                                        theme="outline-danger" icon="fas fa-lg fa-trash" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="text-red m-3">
                No hay registros coincidentes
            </div>
        @endif
    </div>


</x-adminlte-card> --}}
