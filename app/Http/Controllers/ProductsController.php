<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getAll() {
        $all = Products::getAllProducts();
        return response()->json($all);
    }

    public function getStoreProducts(Request $request) {
        $productType =  $request->input('productType');

        $products = Products::getProducts($productType);
        return response()->json($products);
    }

    public function insertStoreProduct(Request $request) {
        $pName = $request->input('pName');
        $pType = $request->input('pType');
        $pQuantity = $request->input(key: 'pQuantity');
        $pPrice = $request->input('pPrice');
        $sCode = $request->input('sCode');

        $productInsert = Products::insertNewProduct($pName, $pType, $pQuantity, $pPrice, $sCode);
        return response()->json($productInsert);
    }

    public function deleteStoreProduct(Request $request) {
        $pCode = $request->input('pCode');
        $pName = $request->input('pName');
        $pType = $request->input('pType');
        $sCode = $request->input('sCode');

        $productDelete = Products::deleteProduct($pCode, $pName, $pType, $sCode);
        return response()->json($productDelete);
    }
}
