<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = new Product;
        $get = $product->get();
        
        // Data is fetched
        if($get->count() > 0) {
            $response = array(
                'status' => 'SUCCESS',
                'body' => $get
            );
        } else {
            $response = array(
                'status' => 'FAILED',
                'body' => 'NO DATA FOUND'
            );
        }

        return $response;
    }

    public function createProduct(Request $request)
    {
        if( $request->has(['name','price','description']) ) {
            $data = array(
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
            );

            $product = new Product;
            $product->fill($data);
            $product->save();

            $response = array(
                'status' => "SUCCESS",
                'message' => "SUCCESS INSERTING"
            );
        } else {

            $response = array(
                'status' => "FAILED",
                'message' => "CHECK YOUR DATA"
            );

        }
        return $response;
    }
    

    public function fetchProductById(Request $request)
    {
        $id = $request->route('id');
        $product = new Product;
        $_product = $product
                    ->find($id);
        
        if($_product == NULL ) {

            $response = array(
                'status' => "FAILED",
                'message' => "NO PRODUCT FOUND"
            );

        } else {

            $response = array(
                'status' => "SUCCESS",
                'message' => "SUCCESS FETCHING",
                "body" => $_product
            );
        }

        return $response;
    }

    public function updateProduct(Request $request)
    {
        $id = $request->route('id');
        $product = new Product;
        $_product = $product
                    ->find($id);

        if($_product != NULL) {
            $data = array(
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            );

            $_product->fill($data);
            $_product->save();

            $response = array(
                'status' => "SUCCESS",
                'message' => "SUCCESS UPDATING"
            );
        } else {
            $response = array(
                'status' => "FAILED",
                'message' => "NO PRODUCT FOUND"
            );
        }                

        return $response;

    }

}
