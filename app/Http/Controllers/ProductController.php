<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    function index() {
        $product = Product::all();

        return response()->json([
            'success' => true,
            'message' => 'List all product',
            'data' => $product
        ], 200);
    }

    function show($id) {
        $product = Product::find($id);
        if($product) {
            return response()->json([
                'success' => true,
                'message' => 'Product found',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }
    }

    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data validation error',
                'data' => $validator->errors()
            ], 400);
        } else {
            $product = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
            ]);

            if ($product) {
                return response()->json([
                    'success' => true,
                    'message' => 'product created',
                    'data' => $product
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'product failed to created',
                    'data' => 'Error'
                ], 500);
            }
        }
    }

    function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable',
            'stock' => 'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data validation error',
                'data' => $validator->errors()
            ], 400);
        } else {
            $product = Product::whereId($id)->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
            ]);
            if ($product) {
                return response()->json([
                    'success' => true,
                    'message' => 'product updated',
                    'data' => $product
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'product failed to updated',
                    'data' => 'Error'
                ], 500);
            }
        }
    }

    function delete($id)
    {
        $product = Product::whereId($id)->first();
        $product->delete();

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'product deleted',
                'data' => 'deleted'
            ], 200);
        }
    }
}
