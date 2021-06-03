@extends('layouts.main-layout')
@section('content')
    <main class="home">

        <h1>Cars:</h1>
        <ul class="mainList">
            @foreach ($cars as $car)
                <li>
                    <h2>
                        <span>Car name:</span>
                        {{$car -> name}}
                    </h2>
                    <h2>
                        <span>Model:</span>
                        {{$car -> model}}
                    </h2>
                    <h2>
                        <span>Cilindrata:</span>
                        {{$car -> KW}}kW
                    </h2>
                    <h2>
                        <span>Brand name:</span>
                        {{$car->brand-> name}}
                    </h2>

                    <h2>Pilots:</h2>
                    <ul>
                        @foreach ($car->pilots as  $pilot)
                            <li>
                                <h3>
                                    {{$pilot -> name}}
                                    {{$pilot -> lastname}}
                                </h3>
                                Nationality: {{$pilot -> nationality}} </br>
                                Date of Birth: {{$pilot -> date_of_birth}}

                            </li>

                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

    </main>
@endsection
