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
        $rules = array(
            'phone' => 'numeric',
            'rfc' => 'alpha_num'
        );
        $messages = array(
            'phone.numeric' => 'El campo Telefono debe ser un número.',
            'rfc.alpha_num' => 'El campo RFC sólo puede contener letras y números.'
        );

        $validator = Validator::make($input, $rules, $messages);
        if($validator->passes())
        {
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
        else
        {
            return Redirect::back()->withErrors($validator);
        }
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
        $supplier = Supplier::findOrFail($id);
        return View::make('supplier/view')->with('supplier', $supplier);
    }

    /**
     * Elimina un proveedor registrado
     *
     * @return View
     */
    public function delete()
    {
        $supplier=Supplier::findorFail(Input::get('supplierid'));
        if($supplier->delete())
        {
            Session::flash('message','Proveedor eliminado.');
            Session::flash('class', 'success');
        }
        else
        {
            Session::flash('message', 'No se pudo eliminar el proveedor.');
            Session::flash('class', 'danger');
        }
        return Redirect::back();
    }

    /**
     * Muestra un formulario con los datos del proveedor a editar
     *
     * @param  int  $id
     * @return View
     */
    public function showUpdate($id)
    {
        $supplier = Supplier::findorFail($id);
        if(!$supplier){
            App::abort(404);
        }
        return View::make('/supplier/update')->withSupplier($supplier);
    }
    
    public function update($id)
    {
        $input = Input::all();
        $rules = array(
            'phone' => 'numeric',
        );

        $validator = Validator::make($input, $rules);
        if($validator->passes())
        {
            $supplier = Supplier::findorFail($id);
            $supplier -> name = Input::get('name');
            $supplier -> address = Input::get('address');
            $supplier -> phone = Input::get('phone');
            $supplier -> rfc = Input::get('rfc');
            if($supplier->save())
            {
                Session::flash('message','Proveedor actualizado.');
                Session::flash('class', 'success');
            }
            else
            {
                Session::flash('message', 'No se pudo actualizar el proveedor.');
                Session::flash('class', 'danger');
            }
            return Redirect::to('/supplier/list');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }
}
?>