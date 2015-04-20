<?php
class SupplierController extends BaseController {
    //Registrar nuevo proveedor
    public function create(){
        $input = Input::all();
        $supplier = new Supplier;
        $supplier -> name = $input['name'];
        $supplier -> address = $input['address'];
        $supplier -> phone = $input['phone'];
        $supplier -> rfc = $input['rfc'];
        if($supplier->save())
        {
        	Session::flash('message','Proveedor registrado.');
			Session::flash('class', 'success');
        }
        else
        {
        	Session::flash('message', 'No se pudo guardar el proveedor.');
			Session::flash('class', 'danger');
        }
        return Redirect::back();
    }
}
?>