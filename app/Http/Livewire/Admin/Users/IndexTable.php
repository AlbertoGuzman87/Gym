<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\StatusUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class IndexTable extends Component
{
    //Ayuda a paginar dentro de la vista
    use WithPagination;
    //Ayuda a ocupara los estilos de bootstrap en la paginación
    protected $paginationTheme = "bootstrap";

    public $search;
    public $searchby='matricula';
    public $SearchStatus='0';

    //Metodo que resetea la paginación para la busqueda efectiva
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //Genera un array donde el primer parametro es lo que se mostrara y el id es la llave
        //$status = StatusUser::pluck('nombre', 'id');
        $status = StatusUser::all();

        if($this->SearchStatus=='0'){
            $users= User::Where($this->searchby, 'like', '%' . $this->search . '%')
            ->Where('id', '!=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(5);
        }else{
            $users= User::Where($this->searchby, 'like', '%' . $this->search . '%')
            ->Where('id', '!=', Auth::user()->id)
            ->Where('status_user_id','=',$this->SearchStatus)
            ->orderBy('id', 'DESC')
            ->paginate(5);

        }

        // if($this->search != ""){
        //     $this->SearchStatus = 0;
        //     $users= User::Where($this->searchby, 'like', '%' . $this->search . '%')
        //     ->Where('id', '!=', Auth::user()->id)
        //     ->orderBy('id', 'ASC')
        //     ->paginate(5);

        // }

        return view('livewire.admin.users.index-table',compact('users','status'));
    }
}
