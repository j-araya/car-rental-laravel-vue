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

        if ($request->hasFile('photo1')) {
            
        }

        $photo1 = $request->file('photo1');
        $photo2 = $request->file('photo2');
        $photo3 = $request->file('photo3');
        $photo4 = $request->file('photo4');

        $name_gen1 = hexdec(uniqid());
        $name_gen2 = hexdec(uniqid());
        $name_gen3 = hexdec(uniqid());
        $name_gen4 = hexdec(uniqid());

        $img_ext1 = strtolower($photo1->getClientOriginalExtension());
        $img_ext2 = strtolower($photo2->getClientOriginalExtension());
        $img_ext3 = strtolower($photo3->getClientOriginalExtension());
        $img_ext4 = strtolower($photo4->getClientOriginalExtension());

        $img_name1 = $name_gen1.'.'.$img_ext1;
        $img_name2 = $name_gen2.'.'.$img_ext2;
        $img_name3 = $name_gen3.'.'.$img_ext3;
        $img_name4 = $name_gen4.'.'.$img_ext4;
        
        $up_location = 'image/car/';

        $photo1->move($up_location, $img_name1);
        $photo2->move($up_location, $img_name2);
        $photo3->move($up_location, $img_name3);
        $photo4->move($up_location, $img_name4);

        $car->photo1 = $up_location.$img_name1;
        $car->photo2 = $up_location.$img_name2;
        $car->photo3 = $up_location.$img_name3;
        $car->photo4 = $up_location.$img_name4;

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
