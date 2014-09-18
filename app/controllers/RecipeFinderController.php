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

        /**
         * mime type check has some issues in laravel4 
         * I would do it manually
         */
        if ($fridgeFile->getClientOriginalExtension() !== 'csv') {
            $validator->getMessageBag()->add('fridge-items', 'Invalide file extension, it should be csv');
            return Redirect::route('index')->withErrors($validator)->withInput();
        }

        if ($recipeFile->getClientOriginalExtension() !== 'json') {
            $validator->getMessageBag()->add('fridge-items', 'Invalide file extension, it should be json');
            return Redirect::route('index')->withErrors($validator)->withInput();
        }

        $fridgeItems = new RecipeFinder\CsvFileIterator($fridgeFile->getRealPath());
        $recipes     = json_decode(file_get_contents($recipeFile->getRealPath()), true);

        $recipeFinder = new RecipeFinder\Finder($recipes, $fridgeItems);

        $dinner = $recipeFinder->findRecipe();

        $dinner = explode(', ', $dinner);

        return View::make('recipes.dinner')->withDinner($dinner);
    }
}
