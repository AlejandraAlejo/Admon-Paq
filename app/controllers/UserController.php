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
        $user -> pass_encrypt = Crypt::encrypt($input['password']);
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
        $id = Auth::user()->id;
        $currentUser = User::find($id);
        $user_type = $currentUser->user_type_id;
        if($user_type == '1'){
            $users = User::paginate(5);
            return View::make('/user/list', compact("users"));
        }
        else{
            $users = User::where('user_type_id', '2')->paginate(5);
            return View::make('/user/listForSecretary', compact("users"));
        }
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
        $pass_encrypt = $users->pass_encrypt;
        $pass_decrypt = Crypt::decrypt($pass_encrypt);
        $user_type_id = UserType::find($users->user_type_id);
        return View::make('user/show')->with('users', $users)->with('user_type_id' , $user_type_id)->with('pass_decrypt', $pass_decrypt);        
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
        $user_type_id = UserType::find($user->user_type_id);
        $type = UserType::lists('name', 'id');
        $pass_encrypt = $user->pass_encrypt;
        $pass_decrypt = Crypt::decrypt($pass_encrypt);
        if(!$user){
            App::abort(404);
        }
        
        $id = Auth::user()->id;
        $currentUser = User::find($id);
        $user_type = $currentUser->user_type_id;
        if($user_type == '1'){
            return View::make('/user/update')->withUser($user)->withUserTypeId($user_type_id)->withType($type)->withPassDecrypt($pass_decrypt);
        }
        else{
            return View::make('/user/updateForSecretary')->withUser($user)->withUserTypeId($user_type_id)->withType($type)->withPassDecrypt($pass_decrypt);
        }
    }

    public function update($id)
    {
        $user = User::find($id);
        $user -> user = Input::get('user');
        $user -> password = Hash::make(Input::get('password'));
        $user -> pass_encrypt = Crypt::encrypt(Input::get('password'));
        $user -> user_type_id = Input::get('type');
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
    
    /*
    *Funcionalidad buscar
    */
    public function search()
    {
        $input = Input::get('searchbox');
        $searchTerms = explode(' ', $input);
        $users = DB::table('users')->select('id','user');
        $incomes = DB::table('incomes')->select('id','description');
        $expenses = DB::table('expenses')->select('id','description');
        $suppliers = DB::table('suppliers')->select('id','name');
            

        foreach($searchTerms as $term)
        {
            $users->where('user', 'LIKE', '%'. $term .'%');
            $incomes->where('description', 'LIKE', '%'. $term .'%');
            $expenses->where('description', 'LIKE', '%'. $term .'%');
            $suppliers->where('name', 'LIKE', '%'. $term .'%');
        }
        
        $user_results = $users->get();
        $incomes_results = $incomes->get();
        $expenses_results = $expenses->get();
        $suppliers_results = $suppliers->get();
        return View::make('/user/search')->withUserResults($user_results)->withIncomesResults($incomes_results)->withExpensesResults($expenses_results)->withSuppliersResults($suppliers_results);
    }
    
    /*
    *Muestra el perfil del usuario actual  
    */
    public function viewProfile()
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentUser = User::find($id);
            $pass_encrypt = $currentUser->pass_encrypt;
            $pass_decrypt = Crypt::decrypt($pass_encrypt);
            $user_type_id = UserType::find($currentUser->user_type_id);
            //Si tenemos una sesión activa mostraremos el menú principal
            return View::make('user/profile')->with('currentUser', $currentUser)->with('user_type_id' , $user_type_id)->with('pass_decrypt', $pass_decrypt);        
        }
    }
    
    /*
    *Muestra el nombre del usuario actual 
    */
    
    public function viewUserName()
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            $currentUser = User::find($id);
            $userName = $currentUser->user;
            //Regresa el nombre de usuario
            return $userName;
        }
    }
}
?>


