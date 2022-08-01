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
     *     tags={"Municipalities"},
     *     @OA\Parameter(
     *         description="Page number",
     *         in="query",
     *         name="page",
     *         required=false
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
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
        return response()->json(['error' => 'Unauthorized.'], 401);
    }




    /**
     * @OA\Get(
     *     path="/municipalities/{id}",
     *     summary="Get Municipality by Id",
     *     tags={"Municipalities"},
     *     @OA\Parameter(
     *         description="Id if the Municipality",
     *         in="path",
     *         name="id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/Municipality")
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
        return response()->json(['error' => 'Unauthorized.'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipality  $municipality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipality $municipality)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }
}
