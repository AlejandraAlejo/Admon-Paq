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
     * Crea un nuevo ingreso
     *
     * @return Redirect::back()
     */
    public function create()
    {
        $input = Input::all();
        $rules = array(
            'description' => 'required|min:4|max:40',
            'date'  => 'required',
            'amount' => 'required|numeric'
        );
        $messages = array
            (
                'description.required' => 'El campo es requerido',
                'description.min' => 'Mínimo 4 caracteres',
                'description.max' => 'Maximo 40 caracteres',
                'date.required' => 'El campo es requerido',
                'amount.required' => 'El campo es requerido',
                'amount.numeric' => 'Inserte solo números'
            );
        $validator = Validator::make($input, $rules,$messages);
        if($validator->passes())
        {
            $income = new Income;
            $income  -> description = $input['description'];
            $income  -> date = $input['date'];
            $income  -> amount = $input['amount'];

            if($income->save())
            {
                Session::flash('message','Ingreso registradoooo.');
                Session::flash('class', 'success');
            }
            else
            {
                Session::flash('message', 'No se pudo guardar el Ingreso.');
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
		$input = Input::all();
        $rules = array(
            'description' => 'required|min:4|max:40',
            'date'  => 'required',
            'amount' => 'required|numeric'
        );
        $messages = array
            (
                'description.required' => 'El campo es requerido',
                'description.min' => 'Mínimo 4 caracteres',
                'description.max' => 'Maximo 40 caracteres',
                'date.required' => 'El campo es requerido',
                'amount.required' => 'El campo es requerido',
                'amount.numeric' => 'Inserte solo números'
            );
        $validator = Validator::make($input, $rules,$messages);
        if($validator->passes())
        {
            //Segun la accion
            $income = Income::findorFail($id);
            $income -> description = Input::get('description');
            $income -> date = Input::get('date');
            $income -> amount = Input::get(Input::get('amount'));
            if($income->save())
            {
                Session::flash('message','Ingreso actualizado.');
                Session::flash('class', 'success');
            }
            else
            {
                Session::flash('message', 'No se pudo actualizar el ingreso.');
                Session::flash('class', 'danger');
            }
            return Redirect::to('/incomes/list');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
	}

    /**
     * Muestra un formulario con los datos del proveedor a editar
     *
     * @param  int  $id
     * @return View
     */
    public function showUpdate($id)
    {
        $income = Income::findorFail($id);
        if(!$income){
            App::abort(404);
        }
        return View::make('/incomes/update')->withIncome($income);
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

    /**
     * Mustra una vista con los datos de un ingreso
     *
     * @param  int  $id
     * @return View
     */
    public function view($id)
    {
        $income = Income::findOrFail($id);
        return View::make('incomes/view')->with('income', $income);
    }
}
