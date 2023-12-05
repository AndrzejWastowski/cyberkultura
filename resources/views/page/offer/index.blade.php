
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @foreach ($offers as $offer) 
                    Offer ID: {{ $offer->id }} 

                        @foreach ($offer->translations as $translation) 
                            Translated Name: {{ $translation->name }}

                        @endforeach
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

