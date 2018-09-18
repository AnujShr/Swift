<?php

namespace App\Http\Controllers;

use App\Cruds;
use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Cruds::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Generator $faker
     * @return \Illuminate\Http\Response
     */
    public function create(Generator $faker)
    {
        $crud = new Cruds();
        $crud->name = $faker->lexify('????????');
        $crud->color = $faker->boolean ? 'red' : 'green';
        $crud->save();

        return response($crud->jsonSerialize(), Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Cruds $cruds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cruds = Cruds::findOrFail($id);
        $cruds->color = $request->color;
        $cruds->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cruds $cruds
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cruds::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
