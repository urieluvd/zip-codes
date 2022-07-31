<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Http\Requests\StoreMunicipalityRequest;
use App\Http\Requests\UpdateMunicipalityRequest;

class MunicipalitiesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/municipalities/",
     *     summary="Get paginated Municipalities",
     *     @OA\Parameter(
     *         description="Page number",
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
     *             @OA\Items(ref="#/components/schemas/Municipality")
     *         )
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = Municipality::paginate(10);
        return response()->json($municipalities);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMunicipalityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMunicipalityRequest $request)
    {
        //
    }




    /**
     * @OA\Get(
     *     path="/municipalities/{id}",
     *     summary="Get Municipality by Id",
     *     @OA\Parameter(
     *         description="Id if the Municipality",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Item(ref="#/components/schemas/Municipality")
     *         )
     *     )
     * )
     *
     *
     * Display the specified resource.
     *
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function show(Municipality $municipality)
    {

        $municipality->load('cities');
        return response()->json($municipality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMunicipalityRequest  $request
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMunicipalityRequest $request, Municipality $municipality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipality $municipality)
    {
        //
    }
}
