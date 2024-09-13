<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

class OptionsController extends Controller
{
    public function index($option_id, $slug)
    {

        $option = Option::find($option_id);

        return view('website.option', compact('option'));
    }
}
