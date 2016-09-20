<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Autolotes\Colores;
use Validator;

class ColoresController extends Controller
{

	protected $modelo;

	private $rules=[
		'color'=>['required','alpha_num','unique:colores']
    ];

	public function __construct(Colores $modelo)
	{
		$this->modelo=$modelo;
	}

    public function index()
    {
     	$rs=$this->modelo->all();
    	dd($rs);
    }

    public function create()
    {
    	$rules=$this->rules;

    	$data=[
    		'color'=>'Gris'
    	];

    	$validator = Validator::make($data,$rules);

        if ($validator->fails()) {
           	dd($validator);
        }else {
        	$this->modelo->create($data);

	    	return redirect()
	    		->route('colores.index');
        }
    }

    public function update($id)
    {
    	$rules=$this->rules;

    	$data=[
    		'color'=>'Naranja'
    	];

		$validator = Validator::make($data,$rules);

        if ($validator->fails()) {
           	dd($validator);
        }else {
	        //Buscando el id del registro
	    	$rs=$this->modelo->find($id);


	    	//Afiliando los campos
	    	$rs->fill($data);
	    	//Guardamos los cambios
	    	$rs->save();

	    	return redirect()
	    		->route('colores.index');
        }
    }

    public function delete($id)
    {
    	$rs=$this->modelo->find($id);
    	$rs->delete();

    	return redirect()
	    		->route('colores.index');

    }
}
