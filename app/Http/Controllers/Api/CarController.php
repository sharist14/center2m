<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CarController extends BaseController
{
    public function index()
    {
        $json_cars = $this->service->getAll();

        return $json_cars;
    }

    public function store(Request $request)
    {
        $req_data = $request->json()->all();

        $validator = Validator::make($req_data, [
          'data'             => 'required|array',
          'data.*.RegNumber' => 'required|string|regex:/^[a-zA-Z0-9]+$/u|min:6|max:6',
          'data.*.Vin'       => 'required|string|regex:/^[0-9]+$/u|min:17|max:17',
          'data.*.Model'     => 'nullable|string|max:200',
          'data.*.Brand'     => 'nullable|string|max:200',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 400);
        }

        $return_data = $this->service->store($req_data);

        return response()->json($return_data, 201);
    }
}
