<?php

class SessionsController extends BaseController {
    
    //Mostrar el formulario de inicio de sesión
    public function showLogin(){
        
        //Verificamos si hay sesión activa
        if(Auth::check()){
            
            //Si tenemos una sesión activa mostraremos el menú principal
            return View::make('mainMenu');
        }
        
        //Si no, mostraremos el formulario
        return View::make('sessions.login');
    }
    
    public function mainMenu(){
        if (Auth::attempt(Input::only('user', 'password'))){
            //return 'Bienvenido!';
            return View::make('mainMenu');
        }
        
        /*Enviamos mensajes de error si los datos son incorrectos
        return Redirect::back()->with('error_messsage', 'Invalid data')->withInput();*/
    }
    
    public function logOut(){
        //Cerramos sesión
        Auth::logout();
        
        //Volvemos al formulario de inicio
        return View::make('sessions.login')->with('error_message', 'Logged out correctly');
    }

}
