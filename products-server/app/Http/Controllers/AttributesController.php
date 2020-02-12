<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attributes;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $attributes = Attributes::all();
        // return response
        $response = [
            'success' => true,
            'attributes' => $attributes,
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $attribute = Attributes::create($input);

        // return response
        $response = [
            'success' => true,
            'message' => 'Attribute created successfully.',
        ];
    }
}
