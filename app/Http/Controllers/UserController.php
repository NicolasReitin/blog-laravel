<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    public function index(){

        $users = User::orderBy('id', 'ASC')->paginate(50);

        return view('user.index', compact('users'));

    }

    public function create()
    {
        //
    }
    
    public function store()
    {
        //
    }

    public function show(user $user)
    {
        //
    }

    public function edit(user $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, user $user)
    {
        DB::beginTransaction();
        try{
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->role = $request->get('role');
            $user->updated_at = now();
            // dd($user);
            $user->save();
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect('user.edit'); // et redirige ver la page users
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('users');  //renvoi vers la page index
    }

    public function destroy(user $user)
    {
        DB::beginTransaction();
        try{
            $user->delete();
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect('users'); // et redirige ver la page users
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('users');  //renvoi vers la page index
    }
}
