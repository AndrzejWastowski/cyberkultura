@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}} podstrony - <strong>{{ $page->title }}</strong></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
        <li class="breadcrumb-item">Podstrony</li>
        <li class="breadcrumb-item active">{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <div class="container">
        <form id="myForm" action="{{ $action == 'create' ? route('panel.pages.store') : route('panel.pages.update', $page)}}" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
             @endif

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Tytuł</h5>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" required>
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title">Link (<i>SEO</i>)</h5>
                            <input type="text" class="form-control" id="link" name="link" value="{{ $page->link }}" required>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Lead</h5>
                    <label for="news_category_id" class="form-label"><i>Lead - krótki opis, jedno zdanie pojawiające się na początku strony w nagłówku</i></label>
                    <p>najlepiej od 50 do 250 znaków</p>
                    <!-- Quill Editor Default -->
                    <div id="lead-editor" style="height: 100px;">{!! $page->lead !!} </div>
                    <input type="hidden" name="lead" id="hidden-lead">
                    <!-- End Quill Editor Default -->
                </div>

                <div class="card-body">
                    <h5 class="card-title">Treść strony</h5>

                    <!-- Quill Editor Full -->
                    <p>Pełna treść strony</p>
                    <div id="description-editor" style="height: 550px;">
                        <p>{!! $page->description !!}</p>
                    </div>
                    <input type="hidden" name="description" id="hidden-description">
                    <!-- End Quill Editor Full -->
                </div>
                <div class="form-group">
                    <label for="pages_photo">Zdjęcie poglądowe do podstrony:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="current_photo">Aktualne zdjęcie:</label>
                    <img src="/resources/subpage/{{ $page->image }}" alt="{{ $page->image }}" class="img-fluid">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj Nową' : 'Zapisz zmiany' }} </button>
            </div>
        </form>
    </div>
@endsection


@section('script')
    <script>

      document.addEventListener('DOMContentLoaded', function() {


            // Konfiguracja edytora dla pola "Description"
            var descriptionEditorOptions = {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': 'left'
                        }, {
                            'align': 'center'
                        }, {
                            'align': 'right'
                        }, {
                            'align': 'justify'
                        }],
                        ['blockquote', 'code-block'],
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        ['clean']
                    ]
                },

                theme: 'snow'
            };

            var leadEditorOptions = {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': 'left'
                        }, {
                            'align': 'center'
                        }, {
                            'align': 'right'
                        }, {
                            'align': 'justify'
                        }],
                        ['blockquote', 'code-block'],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        ['clean']
                    ]
                },

                theme: 'snow'
            }

            var specificationEditorOptions = {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': 'left'
                        }, {
                            'align': 'center'
                        }, {
                            'align': 'right'
                        }, {
                            'align': 'justify'
                        }],
                        ['blockquote', 'code-block'],
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        ['clean']
                    ]
                },

                theme: 'snow'
            };

            // Inicjalizacja edytora dla pola "Description"
            var descriptionEditor = new Quill('#description-editor', descriptionEditorOptions);
            // Inicjalizacja edytora dla pola "lead"
            var leadEditor = new Quill('#lead-editor', leadEditorOptions);

            var specificationEditor = new Quill('#specification-editor', specificationEditorOptions);

            // Pobierz formularz
            var form = document.getElementById('myForm');

            // Dodaj obsługę zdarzenia submit formularza
            form.onsubmit = function() {

                // Pobierz zawartość edytorów Quill

                var descriptionContent = descriptionEditor.root.innerHTML;
                document.getElementById('hidden-description').value = descriptionContent;

                var leadContent = leadEditor.root.innerHTML;
                document.getElementById('hidden-lead').value = leadContent;

                var specificationContent = specificationEditor.root.innerHTML;
                document.getElementById('hidden-specification').value = specificationContent;
            }
        });
    </script>
@endsection




