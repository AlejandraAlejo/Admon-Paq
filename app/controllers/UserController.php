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
        //$user -> password_decrypted = $input['password'];
        $user -> user_type_id = $input['type'];
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
     * Muestra un formulario con los datos del usuario a editar
     *
     * @param  int  $id
     * @return View
     */
    public function showUpdate($id)
    {
        $user = User::find($id);
        $user_type = UserType::find($user->type);
        $type = UserType::lists('name', 'id');
        if(!$user){
            App::abort(404);
        }
        return View::make('/user/update')->withUser($user)->withUserType($user_type)->withType($type);
    }

    public function update($id)
    {
        $user = User::find($id);
        $user -> user = Input::get('user');
        $user -> password = Hash::make(Input::get('password'));
        $user -> password_decrypted = Input::get('password');
        $user -> type = Input::get('type');
        if($user->save())
        {
            Session::flash('message','Usuario actualizado.');
            Session::flash('class', 'success');
        }
        else
        {
            Session::flash('message', 'No se pudo actualizar el usuario.');
            Session::flash('class', 'danger');
        }
        return Redirect::to('/user/list');
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


