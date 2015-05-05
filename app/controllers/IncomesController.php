<?php

class IncomesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$incomes = Income::all();
   		return View::make('incomes.index')->with('incomes', $incomes);
	}

	public function getIndex() 
	{
		$incomes = Income::all();
   		return View::make('incomes.index')->with('incomes', $incomes);
      //return View::make('incomes.index');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$income = new Income();
   		return View::make('incomes.save')->with('income', $income);
	}
	/**
     * Crea un nuevo egreso
     *
     * @return Redirect::back()
     */
    public function create()
    {
        $input = Input::all();
        $income = new Income;
        $income  -> description = $input['description'];
        $income  -> date = $input['date'];
        $income  -> amount = $input['amount'];

        if($income->save())
        {
        	Session::flash('message','Ingreso registrado.');
			Session::flash('class', 'success');
        }
        else
        {
        	Session::flash('message', 'No se pudo guardar el Ingreso.');
			Session::flash('class', 'danger');
        }
        return Redirect::back();
    }
	/**
     * Muestra la vista con todos los ingresos
     *
     * @return View
     */
    public function showAll()
    {
        $incomes = Income::paginate(5);
        return View::make('/incomes/list', compact("incomes"));
    }
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$income = new Income;
   		$income->description = Input::get('description');
   		$income->date = Input::get('date');
   		$income->amount = Input::get('amount');
   		//$income->save();
   		if ($income->save()) {
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
   		return Redirect::back();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$incomes = Income::find($id);
   		return View::make('incomes.show')->with('income', $income);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$income = Income::find($id);
   		return View::make('incomes.save')->with('income', $income);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$income = Income::find($id);
   		$income->description = Input::get('description');
   		$income->date = Input::get('date');
   		$income->amount = Input::get(Input::get('amount'));
   		$income->created_at = Input::get('created_at');
   		$income->updated_at = Input::get('updated_at');
   		$income->save();
   		return Redirect::to('incomes')->with('notice', 'El ingreso ha sido modificado correctamente.');
	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$income = Income::find($id);
   		$income->delete();
   		return Redirect::to('incomes')->with('notice', 'El ingreso ha sido eliminado correctamente.');
	}

	/*
    *Muestra el formulario para crear un ingreso   
    */
    public function showCreateForm()
    {
        $income = new Income();
   		return View::make('incomes.save')->with('income', $income);
    }

}
