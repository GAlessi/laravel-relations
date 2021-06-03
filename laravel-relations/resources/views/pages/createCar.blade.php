@extends('layouts.main-layout')
@section('content')

<main class="form">

    <form action="#">


        <div >
            <label for="name">Name:</label>
            <div>
                <input id="name" type="text" name="name">
            </div>
        </div>
        <div >
            <label for="model">Model</label>
            <div >
                <input id="model" type="text" name="model">
            </div>
        </div>
        <div>
            <label for="KW">Cilindrata</label>
            <div>
                <input id="KW" type="number" name="KW">
            </div>
        </div>

        <div>
            <div>
                <button class="btn" type="submit">
                    CREATE
                </button>
            </div>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</main>
@endsection
