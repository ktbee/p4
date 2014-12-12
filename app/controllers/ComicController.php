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
		$comics = Comic::all();

		return View::make('user_home')->with("comics",$comics);
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
		$comic->user_id = Auth::id(); // need to grab the user's ID for the post

		// give image a URL in the public folder
		$image = Input::file('image');
        $filename = date('Y-m-d')."-".$image->getClientOriginalName();
        $path = public_path('images/'.$filename);
        Image::make($image->getRealPath())->resize(300, 300)->save($path);
        $imageURL = 'images/'.$filename;
        $comic->imageURL = $imageURL;

        $comic->save();

        echo $comic->title."<br>";
		echo $comic->caption."<br>";
		echo '<img src="'.$imageURL.'" />';
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
