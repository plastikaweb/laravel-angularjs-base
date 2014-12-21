<?php

class TodoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//GET
		return Todo::all();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//POST
		return Todo::create(Input::all());
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//GET
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//PUT
		$todo = Todo::findOrFail($id);
		$todo->completed = Input::get('completed');
		$todo->save();
		return ($todo);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//DELETE
		$todo = Todo::findOrFail($id);
		$todo->delete();

		return Response::json(array('status' => 'ok'));
	}


}
