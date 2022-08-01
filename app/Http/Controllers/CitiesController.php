<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CitiesController extends Controller
{

    /**
     * @OA\Get(
     *     path="/cities",
     *     summary="Get paginated Cities",
     *     tags={"Cities"},
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
     *             @OA\Items(ref="#/components/schemas/City")
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

        $cities = City::paginate(10);
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }

    /**
     * @OA\Get(
     *     path="/cities/{id}",
     *     summary="Get City by Id",
     *     tags={"Cities"},
     *     @OA\Parameter(
     *         description="Id of the City",
     *         in="path",
     *         name="id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/City")
     *     )
     * )
     *
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $city->load('settlements');
        return response()->json($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCityRequest  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        return response()->json(['error' => 'Unauthorized.'], 401);
    }
}
