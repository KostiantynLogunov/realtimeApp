@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">Standart Vue+Laravel</h2>
        </div>
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">ChartJS: Vue+Laravel</h2>
        </div>
        <div class="col-sm-4">
            <h2 class="border-bottom text-center">RealTime:</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 ">
            <ul class="nav nav-tabs justify-content-center">
                <li><a type="button" class="btn btn-secondary" data-toggle="tab" href="#menu1">Example component</a></li>
                <li><a type="button" class="btn btn-secondary" data-toggle="tab" href="#menu2">Vue -> Blade</a></li>
                <li><a type="button" class="btn btn-secondary" data-toggle="tab" href="#menu3">Ajax</a></li>
            </ul>
        </div>
        <div class="col-sm-4 ">
            <ul class="nav nav-tabs justify-content-center ">
                <li><a type="button" class="btn btn-dark" data-toggle="tab" href="#menu4">Line</a></li>
                <li><a type="button" class="btn btn-dark" data-toggle="tab" href="#menu5">Pie</a></li>
                <li><a type="button" class="btn btn-dark" data-toggle="tab" href="#menu6">Trigger</a></li>
            </ul>
        </div>

        <div class="col-sm-4 ">
            <ul class="nav nav-tabs justify-content-center ">
                <li><a type="button" class="btn btn-primary" data-toggle="tab" href="#menu7">RealTime Line</a></li>
                <li><a type="button" class="btn btn-primary" data-toggle="tab" href="#menu8">Chat All</a></li>
                <li><a type="button" class="btn btn-primary" data-toggle="tab" href="#menu9">Chat Privat</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class=" tab-content col-sm-12">
            <div id="menu1" class="tab-pane active">
                <div class="row m-2" data-hash="1">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">1# Example Component</h2>
                                <example-component></example-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu2" class="tab-pane fade">
                <div class="row m-2" data-hash="2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">2# Передача данных в Vue из Blade</h2>
                                {{--<prop-component v-bind:urldata=""></prop-component>--}}
                                {{--OR--}}
                                <prop-component :urldata="{{ json_encode($url_data) }}"></prop-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu3" class="tab-pane fade">
                <div class="row m-2" data-hash="3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">3# Передача данных по Ajax в Vue из Controller</h2>
                                {{--<prop-component v-bind:urldata=""></prop-component>--}}
                                {{--OR--}}
                                <ajax-component ></ajax-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu4" class="tab-pane fade">
                <div class="row m-2" data-hash="4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">4#  (Line) & VueJS *ajax</h2>
                                <chartline-component></chartline-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu5" class="tab-pane fade">
                <div class="row m-2" data-hash="5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">5# (Pie) & VueJS *ajax</h2>
                                <chartpie-component></chartpie-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu6" class="tab-pane fade">
                <div class="row m-2" data-hash="6">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">6# Trigger</h2>
                                <chartrandom-component></chartrandom-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu7" class="tab-pane fade">
                <div class="row m-2" data-hash="7">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">7# RealTime Line</h2>
                                <socket-component></socket-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu8" class="tab-pane fade">
                <div class="row m-2" data-hash="8">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">8# Chat All</h2>
                                <socket-chat-component></socket-chat-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu9" class="tab-pane fade">
                <div class="row m-2" data-hash="9">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="min-height: 720px;">
                                <h2 class="text-center">9# Chat Privat</h2>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <h4 class="text-center">user: {{ \Illuminate\Support\Facades\Auth::user()->email }}</h4>
                                    <socket-private-component
                                            :users="{{ \App\User::select('email', 'id')->where('id', '!=', \Illuminate\Support\Facades\Auth::id())->get() }}"
                                            :user="{{ \Illuminate\Support\Facades\Auth::user() }}">
                                    </socket-private-component>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection