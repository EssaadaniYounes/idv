<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return response()->json($branches);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branches = Branch::create($request->all());
        return $branches? response()->json($branches) : 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branches
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branche = Branch::find($id);
        return response()->json($branche);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branches
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branches)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields=[
                'brand' => $request->brand,
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'city' => $request->city,
                'country' => $request->country,
                'tel' => $request->tel,
                'fax' => $request->fax
            ];


        $branch = DB::table("branches")->where("id", $id)->update($fields);
        return $branch? 1 : 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branches
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $rs = $branch->delete();
        return $rs? 1 : 0;
    }
}
