<?php

class UserController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Registra nuevo usuario
		$input = Input::all();
        $user = new User;
        $user -> user = $input['user'];
        $user -> password = Hash::make($input['password']);
        $user -> password_decrypted = $input['password'];
        $user -> type = $input['type'];
        if($user->save())
        {
        	Session::flash('message','Usuario registrado.');
			Session::flash('class', 'success');
        }
        else
        {
        	Session::flash('message', 'No se pudo guardar el usuario.');
			Session::flash('class', 'danger');
        }
        return Redirect::back();
	}


	 /**
     * Muestra la vista con todos los usuarios
     *
     * @return View
     */
    public function showAll()
    {
        $users = User::paginate(5);
        return View::make('/user/list', compact("users"));
    }

    /**
     * Muestra los datos del usuario seleccionado
     *
     * @param  int  $id
     * @return View
     */
    public function view($id)
    {
        $users = User::find($id);
        $type = UserType::find($users->type);
        return View::make('user/show')->with('users', $users)->with('type' , $type);        
    }

    /**
     * Elimina un usuario registrado
     *
     * @return Response
     */
    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        Session::flash('message','Usuario eliminado.');
        Session::flash('class', 'danger');
        return Redirect::back();
    }

    /**
     * Muestra el formulario para editar un usuario
     *
     * @param  int  $id
     * @return Response
     */
    public function showUpdate($id)
    {

    }
    
    /*
    *Muestra el formulario para crear un usuario  
    */
    public function showCreateForm()
    {
        $type = UserType::lists('name', 'id');
        return View::make('user/create')->with('type', $type);
    }
}
?>


