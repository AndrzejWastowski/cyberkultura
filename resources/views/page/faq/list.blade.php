
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <ul>
                       
                    @foreach ($faqs as $faq) 
                        <li>
                            <a href="{{ route('page.faq.show',['question'=>$faq->question]) }}">{{ $faq->answer }}</a>
                        </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('meta_tag')
<title>Cyberkultura - Nasza oferta wizytówki pieczątki oprawa prac druk A3/A4 skan ksero zaproszenia bindowanie laminowanie i inne..</title>

<meta property="og:title" content="Cyberkultura - Oferta wizytówki pieczątki oprawa prac druk A3/A4 skan ksero zaproszenia bindowanie laminowanie">
<meta property="og:description" content="Kutno - mała poligrafia, drukowanie, laminowanie, kserowanie i skanowanie. Wykonujemy wizytówki ulotki zaprozenia ślubne i na inne okoliczności. Winietki na stoły. Krótkie terminy realizacji. zajmujemy się również poligrafią reklamową. Wykonujemy banery, plakaty. grawerowanie laserem w drewnie. Kubki koszulki ">
<meta property="og:image" content="https://cyberkultura.pl/{{ $path_m }}">
<meta property="og:url" content="http://cyberkultura.pl/oferta/">
<meta property="og:type" content="website">
<meta property="og:locale" content="pl_PL">
<meta property="og:site_name" content="Cyberkultura - pieczątki, druk/ksero A3/A4 wizytówki zaproszenia ślubne i okolicznościowe, winietki Kutno">
<meta property="fb:app_id" content="1234567890">
@endsection

