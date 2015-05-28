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
    public function delete()
    {

    }

    /**
     * Muestra el formulario para editar un egreso
     *
     * @param  int  $id
     * @return Response
     */
    public function showUpdate($id)
    {

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