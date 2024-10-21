<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    public static function getSuppliers() {
        return Suppliers::orderBy("sCode","asc")->get();
    }
}
