<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    // Return a list of cars
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // List of cars
            return Car::all();
        } else {
            // Template in Vue.js
            return view('car');
        }
    }

    // Create form in Vue.js
    public function create()
    {
        return view('carform');
    }

    // Store request data to a new Car object and makes validations
    public function store(Request $request)
    {
        $car = new Car();
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->plate = $request->plate;
        $car->color = $request->color;
        $car->cartype_id = $request->cartype_id;
        $car->state = $request->state;
        $car->photo1 = $request->photo1;
        $car->photo2 = $request->photo2;
        $car->photo3 = $request->photo3;
        $car->photo4 = $request->photo4;

        $car->save();

        return response()->json("Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Car::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('carform');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->plate = $request->plate;
        $car->color = $request->color;
        $car->cartype_id = $request->cartype_id;
        $car->state = $request->state;
        $car->photo1 = $request->photo1;
        $car->photo2 = $request->photo2;
        $car->photo3 = $request->photo3;
        $car->photo4 = $request->photo4;

        $car->save();

        return response()->json("Created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
    }
}
