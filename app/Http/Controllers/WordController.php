<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;

class WordController extends Controller
{
    public function index(Word $words)
    {

       $words = $words->all();
    	return view('words.index', compact("words"));
    }
    public function store()
    {
       	$this->validate(request(),[
    		'body'=>'required'
    	]);

       	$word = Word::create([
            'body' => request()->body
		]);

    	return back();
    }

     public function destroy()
    {
    	$id = request()->word_id;
    	$word = Word::find($id);
       	$word->delete();
    	return back();
    }
}
