<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CityController extends Controller
{
    public function setCity(Request $request)
    {
        $city = City::where('id', $request->city_id)->first();
        if (!$city) {
            return redirect()->back()->withErrors('Ошибка выбора города');
        }

        session([
            //'city_id' => $request->city_id,
            'city' => $city,
        ]);

        return redirect()->back();
    }

    public function index()
    {
        return CityResource::collection(City::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return new CityResource(City::findOrFail($id));
    }

    public function edit(City $city)
    {
        //
    }

    public function update(Request $request, City $city)
    {
        //
    }

    public function destroy(City $city)
    {
        //
    }
}
