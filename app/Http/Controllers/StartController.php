<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use App\Events\NewMessage;
use App\Events\PrivateMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

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

        if ($request->has('label')) {
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = (integer)$request->input('sale');

            if ($request->has('realtime')) {
                if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
                    event(new NewEvent($result));
                }
            }
        }

        return $result;
    }


    public function sendMessage(Request $request)
    {
        event( new NewMessage($request->input('message')) );

//        return ;
    }

    public function sendPrivateMessage(Request $request)
    {
//        event( new PrivateMessage($request) );
//        OR
        PrivateMessage::dispatch($request->all());

        return $request->all();
    }
}
