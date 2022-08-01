<?php

namespace App\Http\Controllers;

use App\Models\FederalEntity;
use App\Http\Requests\StoreFederalEntityRequest;
use App\Http\Requests\UpdateFederalEntityRequest;

class FederalEntitiesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/federalEntities/",
     *     summary="Get paginated Fedearl Entities",
     *     tags={"Federal Entities"},
     *     @OA\Parameter(
     *         description="Page Number",
     *         in="query",
     *         name="page",
     *         required=false
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/FederalEntity")
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
        $federalEntities = FederalEntity::paginate(10);
        return response()->json($federalEntities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFederalEntityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFederalEntityRequest $request)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }


    /**
     * @OA\Get(
     *     path="/federalEntities/{id}",
     *     summary="Get Federal Entity by Id",
     *     tags={"Federal Entities"},
     *     @OA\Parameter(
     *         description="Id of the Federal Entity",
     *         in="path",
     *         name="id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/FederalEntity")
     *     )
     * )
     *
     * Display the specified resource.
     *
     * @param  \App\Models\FederalEntity  $federalEntity
     * @return \Illuminate\Http\Response
     */
    public function show(FederalEntity $federalEntity)
    {

        $federalEntity->load('municipalities');
        return response()->json($federalEntity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFederalEntityRequest  $request
     * @param  \App\Models\FederalEntity  $federalEntity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFederalEntityRequest $request, FederalEntity $federalEntity)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederalEntity  $federalEntity
     * @return \Illuminate\Http\Response
     */
    public function destroy(FederalEntity $federalEntity)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }
}
