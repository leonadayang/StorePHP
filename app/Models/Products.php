<?php

namespace App\Models;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'pName',
        'pType',
        'pQuantity',
        'pPrice',
        'sCode',
    ];

    public static function getAllProducts()
    {
        return Products::all();
    }

    public static function getProducts($productType)
    {
        switch ($productType) {
            case '1':
                $selectedProducts = Products::orderBy('pPrice', 'asc')->get();
                break;
            case '2':
                $selectedProducts = Products::where('pType', 'Snacks')->get();
                break;
            case '3':
                $selectedProducts = Products::where('pType', 'Canned Goods')->get();
                break;
            default:
                return 'Empty';
        }

        return $selectedProducts;
    }

    public static function insertNewProduct($pName, $pType, $pQuantity, $pPrice, $sCode)
    {
        $checkExisting =
            Products::where('pName', $pName)
            ->where('pType', $pType)
            ->exists();

        if ($checkExisting) {
            return "existing";
        } else {
            return Products::insert([
                'pName' => $pName,
                'pType' => $pType,
                'pQuantity' => $pQuantity,
                'pPrice' => $pPrice,
                'sCode' => $sCode,
            ]);
        }
    }

    public static function deleteProduct($pCode, $pName, $pType, $sCode)
    {
        $checkExisting =
            Products::where('pName', $pName)
            ->where('pType', $pType)
            ->exists();

        if ($checkExisting) {
            return Products::where('pCode', $pCode)
                ->where('pName', $pName)
                ->where('pType', $pType)
                ->where('sCode', $sCode)
                ->delete();
        } else {
            return "missing";
        }
    }
}
