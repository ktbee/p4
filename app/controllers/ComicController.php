<?php


class ComicController extends BaseController {

	public function __construct() {

		
		parent::__construct();
		
		//need to login to see and create comics
        $this->beforeFilter('auth', array('except' => ['getIndex']));
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('new_post');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{	
		//get input from form
		$comic = new Comic();
		$comic->title = Input::get('title');
		$comic->caption = Input::get('caption');
		$comic->image = Input::file('image');
		$comic->save();

		$fileName= Input::file('image')->getClientOriginalName();
		
		//encode image to store in table
		$img_data = file_get_contents($comic->image);
		$type = pathinfo($comic->image, PATHINFO_EXTENSION);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($img_data);

		echo $comic->title."<br>";
		echo $comic->caption."<br>";
		echo $fileName."<br>";
		echo '<img src="data:image/jpeg;base64,' . base64_encode($img_data) . '" />';

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
