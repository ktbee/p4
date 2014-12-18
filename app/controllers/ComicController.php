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
     	$id = Auth::id();
     	$user_id = Comic::with('user_id');
     	$username = Auth::user()->username;
  
		return View::make('comic_index', array('comics'=> $comics,
											  'id' => $id,
											  'user_id' => $user_id,
											  'username' => $username));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('comic_add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{	
		// input validation
		 $rules = array(
			'title' => 'required|max:72',
			'caption' => 'required|max:144',
			'image' => 'required|mimes:jpeg,bmp,png',
			'tag1' => 'max:30',
			'tag2' => 'max:30',
			'tag3' => 'max:30'
		);

		$validator = Validator::make(Input::all(), $rules);
		
		if($validator->fails()) {
			return Redirect::to('/comic/create')
				->with('flash_message', '<span class="error"> Comic creation failed; please fix the errors listed below.</span>')
				->withInput()
				->withErrors($validator);
		} 

		// get input from form
		$comic = new Comic();
		$comic->title = Input::get('title');
		$comic->caption = Input::get('caption');
		$comic->user_id = Auth::id(); // need to grab the user's ID for the post 


		// give image a URL in the public folder
		$image = Input::file('image');
        $filename = date('Y-m-d')."-".$image->getClientOriginalName();
        $path = 'http://p4.katiebroida.info/images/'.$filename);
        Image::make($image->getRealPath())->resize(300, 300)->save($path);
        $imageURL = .$filename;
        $comic->imageURL = $imageURL;
        $comic->save(); 


        // add up to three tags to the comic
        if(Input::has('tag1')){
			$tag = new Tag;
			$tag->name = Input::get('tag1');
			$tag->save();

			$comic->tag()->attach($tag);
		};
        

		if(Input::has('tag2')){
			$tag = new Tag;
			$tag->name = Input::get('tag2');
			$tag->save();
			$comic->tag()->attach($tag);
		};

		if(Input::has('tag3')){
			$tag = new Tag;
			$tag->name = Input::get('tag3');
			$tag->save();
			$comic->tag()->attach($tag);
		};

        return Redirect::to('/comic')->with('flash_message', 'Comic successfully added!');
	}
 	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
			$comic = Comic::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/comic')->with('flash_message', '<span class="error">Comic not found</span>');
		}
		return View::make('comic_show')->with('comic', $comic);
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try {
			$comic = Comic::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/comic')->with('flash_message', 'Comic not found');
		}
		return View::make('comic_edit')->with('comic', $comic);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try {
			$comic = Comic::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/comic')->with('flash_message', '<span class="error">Comic not found</span>');
		}

		$rules = array(
			'title' => 'max:72',
			'caption' => 'max:144',
			'image' => 'mimes:jpeg,bmp,png',
			'tag1' => 'max:36',
			'tag2' => 'max:36',
			'tag3' => 'max:36'
		);

		$validator = Validator::make(Input::all(), $rules);
		
		// input validation
		if($validator->fails()) {
			return Redirect::to('/comic/'.$comic->id.'/edit')
				->with('flash_message', '<span class="error"> Update up failed; please fix the errors listed below.</span>')
				->withInput()
				->withErrors($validator);
		}

		//check if form field has input, and if so get it
		if(Input::has('title')){
			$comic->title = Input::get('title');
		};
		if(Input::has('caption')){
				$comic->caption = Input::get('caption');
		}

		$comic->user_id = Auth::id();

		// give image a URL in the public folder if input present
		if(Input::has('image')){ 
			$image = Input::file('image');
	        $filename = date('Y-m-d')."-".$image->getClientOriginalName();
	        $path = public_path('images/'.$filename);
	        Image::make($image->getRealPath())->resize(300, 300)->save($path);
	        $imageURL = 'images/'.$filename;
	        $comic->imageURL = $imageURL; 
        };

        // add another tag if set
        if(Input::has('tag1')){
			$tag = new Tag;
			$tag->name = Input::get('tag1');
			$tag->save();

			$comic->tag()->attach($tag);
		};

		$comic->save();

		return Redirect::to('/comic/'.$comic->id)->with('flash_message','Your comic has been updated.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyIndex($id)
	{
		try {
			$comic = Comic::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/comic')->with('flash_message', 'Comic not found');
		}
		return View::make('comic_delete')->with('comic', $comic);
	}



	public function destroy($id)
	{
		try {
			$comic = Comic::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/comic')->with('flash_message', 'Comic not found');
		}
		
		Comic::destroy($id);
		return Redirect::action('ComicController@getIndex')->with('flash_message','Your comic has been deleted.');
	}


}
