<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        $products = DB::table("products")
            ->join('categories','products.category_id', '=','categories.id')
            ->join('branches','products.branch_id', '=','branches.id')
            ->selectRaw("
            products.*,
            categories.title as category_title,
            branches.brand
            ")
            ->get();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store_imgs(Request $request)
    {
        $files=[];
        if($request->TotalImages > 0)
        {

            for ($i=0;$i<$request->TotalImages;$i++){

                if($request->hasFile('images'.$i)){
                $file = $request->file('images'.$i);
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('images/products/extra'), $file_name);
                array_push($files, $file_name);
                }
            }
            return response()->json([
                'message' => 'files uploaded',
                'files'=>$files,
            ], 200);
        }

        if($request->hasFile('main_img')){
            $file = $request->file('main_img');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images/products/main_images'), $file_name);
            return response()->json([
                'message' => 'file uploaded',
                'file' => $file_name
            ], 200);
        }

    }
    public function store(Request $request)
    {
        $fields = $request->all();
        $fields['extra_imgs'] = json_encode($fields['extra_imgs']);
        $fields['functionalities'] = json_encode($fields['functionalities']);

        $product = Product::create($fields);

        return $product? response()->json($product) : 0;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['created_at'] = date('Y-m-d H:i:s', strtotime($request['created_at']));
        $request['updated_at'] = date('Y-m-d H:i:s', strtotime($request['updated_at']));
        $products = DB::table("products")->where("id", $id)->update($request->all());
        return $products? 1 : 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return ($product)? 1 : 0;
    }
}
