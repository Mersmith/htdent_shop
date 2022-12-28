<?php

namespace App\Policies;

use App\Models\Orden;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrdenPolicy
{
    use HandlesAuthorization;

    //Autor de la orden que si el genero
    public function autor(User $user, Orden $orden)
    {
        if ($orden->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
    }

    public function pagador(User $user, Orden $orden)
    {
        if ($orden->estado == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function __construct()
    {
        //
    }
}
