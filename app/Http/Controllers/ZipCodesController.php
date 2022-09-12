<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use App\Http\Requests\StoreZipCodeRequest;
use App\Http\Requests\UpdateZipCodeRequest;
use App\Http\Resources\ZipCodeResource;

class ZipCodesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/zip-codes",
     *     summary="Get paginated Zip Codes",
     *     tags={"ZipCodes"},
     *     @OA\Parameter(
     *         description="Page Number",
     *         in="query",
     *         name="page",
     *         required=false
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $zipCodes = ZipCode::paginate(10);
        return response()->json($zipCodes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZipCodeRequest $request)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }


    /**
     * @OA\Get(
     *     path="/zip-codes/{code}",
     *     summary="Get ZipCode by Code",
     *     tags={"ZipCodes"},
     *     @OA\Parameter(
     *         description="Code of the ZipCode",
     *         in="path",
     *         name="id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/ZipCode")
     *     )
     * )
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $zipcode = ZipCode::where('code', $code)->with(['settlements.settlementType:id,name'])->first();
        $resource = new ZipCodeResource($zipcode);
        return response()->json($resource);

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
        return response()->json(['error' => 'Unauthorized.'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZipCode $code)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }
}
