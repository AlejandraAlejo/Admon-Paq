<?php
class SupplierController extends BaseController {
    /**
     * Crea un nuevo proveedor
     *
     * @return Redirect::back()
     */
    public function create()
    {
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

    /**
     * Mustra la vista con todos los proveedores
     *
     * @return View
     */
    public function showAll()
    {
        $suppliers = Supplier::paginate(5);
        return View::make('/supplier/list', compact("suppliers"));
    }

    /**
     * Mustra una vista con los datos de un proveedor
     *
     * @param  int  $id
     * @return View
     */
    public function view($id)
    {

    }

    /**
     * Elimina un proveedor registrado
     *
     * @return Response
     */
    public function delete()
    {

    }

    /**
     * Muestra un formulario con los datos del proveedor a editar
     *
     * @param  int  $id
     * @return Response
     */
    public function showUpdate($id)
    {

    }
}
?>