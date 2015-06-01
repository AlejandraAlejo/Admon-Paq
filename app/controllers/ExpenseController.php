<?php
class ExpenseController extends BaseController {
    /**
     * Crea un nuevo egreso
     *
     * @return Redirect::back()
     */
    public function create()
    {
        $input = Input::all();
        $rules = array(
            'description' => 'required|min:4|max:40',
            'date'  => 'required',
            'amount' => 'required|numeric',
            'supplier_id' => 'required'
        );
        $messages = array
            (
                'description.required' => 'El campo es requerido',
                'date.required' => 'El campo es requerido',
                'amount.required' => 'El campo es requerido',
                'supplier_id.required' => 'El campo es requerido',
                'description.min' => 'Mínimo 4 caracteres',
                'description.max' => 'Maximo 40 caracteres',
                'amount.numeric' => 'Inserte solo números'
            );
        $validator = Validator::make($input, $rules,$messages);
        if($validator->passes())
        {
            $expense = new Expense;
            $expense -> description = $input['description'];
            $expense -> date = $input['date'];
            $expense -> amount = $input['amount'];
            $expense -> supplier_id = $input['supplier_id'];
            if($expense->save())
            {
                Session::flash('message','Egreso registrado.');
                Session::flash('class', 'success');
            }
            else
            {
                Session::flash('message', 'No se pudo guardar el Egreso.');
                Session::flash('class', 'danger');
            }
            return Redirect::back();
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }

    /**
     * Muestra la vista con todos los egresos
     *
     * @return View
     */
    public function showAll()
    {
        $expenses = Expense::paginate(5);
        return View::make('/expense/list', compact("expenses"));
    }

    /**
     * Muestra los datos del egreso seleccionado
     *
     * @param  int  $id
     * @return View
     */
    public function view($id)
    {
        $expenses = Expense::find($id);
        $description = $expenses->description;
        $date = $expenses->date;
        $amount = $expenses->amount;
        $supplier_id = Supplier::find($expenses->supplier_id);
        return View::make('expense/show')->with('expenses', $expenses)->with('description' , $description)->with('date', $date)->with('amount', $amount)->with('supplier_id', $supplier_id);  
    }

    /**
     * Elimina un egreso registrado
     *
     * @return Response
     */
    public function delete($id)
    {
        $expenses = Expense::find($id);
        $expenses->delete();
        Session::flash('message','Egreso eliminado.');
        Session::flash('class', 'danger');
        return Redirect::back();

    }

    /**
     * Muestra el formulario para editar un egreso
     *
     * @param  int  $id
     * @return Response
     */
    public function showUpdate($id)
    {
        $expense = Expense::find($id);
        $description = $expense->description;
        $date = $expense->date;
        $amount = $expense->amount;
        $supplier_selected = Supplier::find($expense->supplier_id);
        $supplier_selected_id = $supplier_selected->id;
        $supplier_selected_name = $supplier_selected->name;
        $supplier_name = Supplier::lists('name', 'id');
        if(!$expense){
            App::abort(404);
        }
        return View::make('/expense/update')->withExpense($expense)->withDescription($description)->withDate($date)->withAmount($amount)->withSupplierName($supplier_name)->withSupplierSelectedName($supplier_selected_name)->withSupplierSelectedId($supplier_selected_id);
        
        
    }
    
     public function update($id)
    {
        $input = Input::all();
        $rules = array(
            'description' => 'required|min:4|max:40',
            'date'  => 'required',
            'amount' => 'required|numeric',
            'supplier_id' => 'required'
        );
        $messages = array
            (
                'description.required' => 'El campo es requerido',
                'date.required' => 'El campo es requerido',
                'amount.required' => 'El campo es requerido',
                'supplier_id.required' => 'El campo es requerido',
                'description.min' => 'Mínimo 4 caracteres',
                'description.max' => 'Maximo 40 caracteres',
                'amount.numeric' => 'Inserte solo números'
            );
        $validator = Validator::make($input, $rules,$messages);
        if($validator->passes())
        {
            $expense = Expense::find($id);
            $expense -> description = Input::get('description');
            $expense -> date = Input::get('date');
            $expense -> amount = Input::get('amount');
            $expense -> supplier_id = Input::get('supplier_name');
            if($expense->save())
            {
                Session::flash('message','Egreso actualizado.');
                Session::flash('class', 'success');
            }
            else
            {
                Session::flash('message', 'No se pudo actualizar el egreso.');
                Session::flash('class', 'danger');
            }
            return Redirect::to('/expense/list');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }
    
    /*
    *Muestra el formulario para crear un egreso    
    */
    public function showCreateForm()
    {
        $supplier_id = Supplier::lists('name', 'id');
        return View::make('expense/create')->with('supplier_id', $supplier_id);
    }
}
?>