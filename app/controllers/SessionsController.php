<?php

class SessionsController extends BaseController {
    
    //Mostrar el formulario de inicio de sesión
    public function showLogin(){
        
        //Verificamos si hay sesión activa
        if(Auth::check()){
            
            //Si tenemos una sesión activa mostraremos el menú principal
            return View::make('welcome');
        }
        
        //Si no, mostraremos el formulario
        return View::make('sessions.login');
    }
    
    public function welcome(){
        if (Auth::attempt(Input::only('user', 'password'))){
            //return 'Bienvenido!';
            return View::make('welcome');
        }
        
        //Enviamos mensajes de error si los datos son incorrectos
        return Redirect::back();
    }
    
    public function logOut(){
        //Cerramos sesión
        Auth::logout();
        
        //Volvemos al formulario de inicio
        return Redirect::to('/');
    }

}
