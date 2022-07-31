<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use App\Http\Requests\StoreZipCodeRequest;
use App\Http\Requests\UpdateZipCodeRequest;

class ZipCodesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/zip-codes",
     *     summary="Get paginated Zip Codes",
     *     @OA\Parameter(
     *         description="Page Number",
     *         in="query",
     *         name="page",
     *         required=false,
     *         type="integer"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/ZipCode")
     *         )
     *     )
     * )
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZipCodeRequest $request)
    {
        //
    }


    /**
     * @OA\Get(
     *     path="/zip-codes/{id}",
     *     summary="Get ZipCode by Code",
     *     @OA\Parameter(
     *         description="Code of the ZipCode",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Item(ref="#/components/schemas/ZipCode")
     *         )
     *     )
     * )
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $zipcode = ZipCode::where('code', $code)->with(['settlements.settlementType:id,name'])->first();
        return response()->json($zipcode);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCodeRequest  $request
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZipCodeRequest $request, ZipCode $code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZipCode $code)
    {
        //
    }
}
