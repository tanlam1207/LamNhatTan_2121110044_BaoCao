<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Import;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index()
    {
        $list = Import::where('product_id', '!=', 0)->get();
        return view('backend.import.index', compact('list'));
    }
    // public function create()
    // {
    //     $list = ProductImport::all();
    //     $list_product = Product::where('status', '!=', '0')->get();
    //     $html_product_id = "";
    //     foreach ($list_product as $item) {
    //         $html_product_id .= "<option value='" . $item['id'] . "'>" . $item["name"] . "</option>";
    //     }

    //     return view('backend.product_import.create', compact('html_product_id','list'));
    // }
    
}
