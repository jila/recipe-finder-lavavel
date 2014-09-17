<?php

class RecipeFinderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    return View::make('recipes.index');
    }

    public function find()
    {
        $rules = array(
            'fridge-items' => array('required'),
            'recipes'      => array('required')
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::route('index')->withErrors($validator);
        }

        $fridgeFile = Input::file('fridge-items');
        $recipeFile = Input::file('recipes');

        $fridgeItems = new RecipeFinder\CsvFileIterator($fridgeFile->getRealPath());
        $recipes     = json_decode(file_get_contents($recipeFile->getRealPath()), true);

        $recipeFinder = new RecipeFinder\Finder($recipes, $fridgeItems);

        $dinner = $recipeFinder->findRecipe();

        $dinner = explode(', ', $dinner);

        return View::make('recipes.dinner')->withDinner($dinner);
    }
}
