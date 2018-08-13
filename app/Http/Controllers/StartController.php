<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $data = [
            [
                'title'=>'dka-develop',
                'url'=>'https://dka-develop.ru/'
            ],
            [
                'title'=>'YouTube',
                'url'=>'https://youtube.com'
            ]
        ];
        return view('start', [
            'url_data' => $data
        ]);
    }

    public function getJson()
    {
        return [
            [
                'title'=>'dka-develop',
                'url'=>'https://dka-develop.ru/'
            ],
            [
                'title'=>'YouTube',
                'url'=>'https://youtube.com'
            ]
        ];
    }


    public function chartData()
    {
        return [
          'labels' => ['March', 'April', 'May', 'June'],
          'datasets' => array(
              [
              'label' => 'Продажи',
              'backgroundColor' =>  '#F26202',
              'data' => [15000, 50000, 10000, 8000],
              ],
              [
                  'label' => 'Last year',
                  'backgroundColor' => '#b5cc18',
                  'data' => [40000, 10000, 5000, 60000],
              ]
          )
        ];
    }

    public function chartRandom()
    {
        return [
            'labels' => ['March', 'April', 'May', 'June'],
            'datasets' => array(
                [
                'label' => 'Gold',
                'backgroundColor' => '#16ab13',
                'data' => [rand(0,40000), rand(0,40000), rand(0,40000), rand(0,40000)],
                ],
                [
                    'label' => 'Silver',
                    'backgroundColor' => '#b5cc18',
                    'data' => [rand(0,40000), rand(0,40000), rand(0,40000), rand(0,40000)],
                ]
            )
        ];
    }


    public function newEvent(Request $request)
    {

        $result =  [
            'labels' => ['March', 'April', 'May', 'June'],
            'datasets' => array(
                [
                    'label' => 'Продажи',
                    'backgroundColor' =>  '#F26202',
                    'data' => [15000, 50000, 10000, 8000],
                ]
            )
        ];

        if ($request->has('label'))
        {
            $result['labels'][] = $request->label;
            $result['datasets'][0]['data'][] = (integer)$request->sale;

            if ($request->has('realtime')) {
                if ($request->realtime == true) {

                }
            }

        }
    }
}
