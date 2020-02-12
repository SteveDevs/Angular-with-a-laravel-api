<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ProductsAttributes;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->get();

        $products_response = [];
        foreach ($products as $key => $value) {
            $sku = $products[$key]->sku;
            $attribute_sub_arr = [];
            $product_attributes = DB::table('products_attributes')
                ->select('attributes.attribute','products_attributes.attribute_value')
                ->join('attributes', 'products_attributes.attribute_id', '=', 'attributes.id')
                ->where('products_attributes.sku', '=', $sku)
                ->get();

                foreach ($product_attributes as $key => $value) {
               $attribute_sub_arr[] = array($product_attributes[$key]->attribute => $product_attributes[$key]->attribute_value);
                }
            $products_response[] = [
                'sku' => $sku,
                'attributes' => $attribute_sub_arr
            ];
        }

        return response()->json($products_response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = microtime(true);
        
        $input = $request->all();

        if(Products::find($input[0]['sku'])){
            return response()->json($response, 400);
        }
        try{
            //DB::beginTransaction();
            $product = Products::create(array('sku' => $input[0]['sku']));
            foreach ($input as $attribute) {
                /*$product_attribute = ProductsAttributes::create(array(
                    'sku' => $input[0]['sku'],
                    'attribute_id' => $attribute['attribute_id'],
                    'attribute_value' => $attribute['attribute_value']
                ));*/
            }   
            $product_attribute = ProductsAttributes::create(array(
                    'sku' => $input[0]['sku'],
                    'attribute_id' => '1',
                    'attribute_value' => 'asdasdasd'
                ));
            //DB::commit();
        }catch(Exception $e){
            //DB::rollBack();
        }
        $end = microtime(true);
        $time = (int)(($end - $start)*1000);

        $response = [
            'success' => true,
            'message' => 'Product created successfully.',
        ];
        return response()->json($time, 200);
    }
}
