<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentPage;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function cms($content_page_id, $slug)
    {

        $cms = ContentPage::find($content_page_id);

        return view('website.cms', compact('cms'));
    }
}
