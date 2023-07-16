<?php

namespace App\Http\Controllers;

use App\Models\Column;

class RootController extends Controller
{
    public function index()
    {
        $columns = Column::with('cards')->get();

        return view('root.index', compact('columns'));
    }

}
