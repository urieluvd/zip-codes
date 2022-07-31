<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use App\Http\Requests\StoreSettlementRequest;
use App\Http\Requests\UpdateSettlementRequest;

class SettlementsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/settlements/",
     *     summary="Get paginated Settlements",
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
     *             @OA\Items(ref="#/components/schemas/Settlement")
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettlementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettlementRequest $request)
    {
        //
    }



    /**
     * @OA\Get(
     *     path="/settlements/{id}",
     *     summary="Get Settlement by Id",
     *     @OA\Parameter(
     *         description="Id of the Settlement",
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
     *             @OA\Item(ref="#/components/schemas/Settlement")
     *         )
     *     )
     * )
     *
     * Display the specified resource.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function show(Settlement $settlement)
    {

        $settlement->load('codes');
        return response()->json($settlement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettlementRequest  $request
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettlementRequest $request, Settlement $settlement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settlement $settlement)
    {
        //
    }
}
