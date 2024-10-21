<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function getStoreSuppliers() {
        $suppliers = Suppliers::getSuppliers();
        return response()->json($suppliers);
    }
}
