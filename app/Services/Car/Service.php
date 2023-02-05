<?php

namespace App\Services\Car;
use App\Models\Car;

class Service
{
    public function getAll()
    {
        $cars = Car::all();
        $data = [];

        foreach($cars as $car){
             $data['data'][] = [ 'Id'        => (int) $car['Id'],
                                 'RegNumber' => (string) $car['RegNumber'],
                                 'Vin'       => (string) $car['VIN'],
                                 'Model'     => $car['Model']? strval($car['Model']) : null,
                                 'Brand'     => $car['Brand']? strval($car['Brand']) : null
                               ];
        }

        $data['meta']['count'] = count($cars);

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function store($data)
    {
        $return_data = [];

        foreach($data['data'] as $info){
            $id = Car::insertGetId([
                'RegNumber' => $info['RegNumber'],
                'VIN'       => $info['Vin'],
                'Model'     => $info['Model'],
                'Brand'     => $info['Brand']
            ]);

            $return_data['data'][] = [ 'Id'        => (int) $id,
                                       'RegNumber' => (string) $info['RegNumber'],
                                       'Vin'       => (string) $info['Vin'],
                                       'Model'     => $info['Model']? strval($info['Model']) : null,
                                       'Brand'     => $info['Brand']? strval($info['Brand']) : null
                                     ];
        }

        $return_data['meta']['count'] = count($data['data']);

        return $return_data;
    }
}