@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytpowanie'}} użytkownika</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Panel</a></li>
        <li class="breadcrumb-item">Użytkownicy</li>
        <li class="breadcrumb-item active">{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
    <div class="container">
        <form id="myForm" action="{{ $action == 'create' ? route('panel.user.create') : route('panel.user.update', $user)}}" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
             @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Tytuł</h5>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $user->name }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Grupa użytkownika]</h5>
                            <select class="form-select" id="user_group_id" name="user_group_id" required>
                                @foreach ($user_groups as $group)
                                    <option value="{{ $group->id }}"
                                        {{ $group->id === $user->user_groups_id ? 'selected' : '' }}>
                                        {{ $group->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Lead</h5>
                    <label for="user_category_id" class="form-label"><i>Lead - krótki opis, streszczenie lub wstęp do usera. Wyświetla się na liście userów</i></label>
                    <p>najlepiej od 50 do 250 znaków</p>
                    <!-- Quill Editor Default -->
                    <div id="lead-editor" style="height: 150px;">{!! $user->lead !!}  </div>
                    <input type="hidden" name="lead" id="hidden-lead">
                    <!-- End Quill Editor Default -->
                </div>

                <div class="card-body">
                    <h5 class="card-title">Treść wiadomości</h5>

                    <!-- Quill Editor Full -->
                    <p>pełna treść wiadomośc, wyświetla się po klikniciu w usera</p>
                    <div id="description-editor" style="height: 250px;">
                        <p>{!! $user->description !!} </p>
                    </div>
                    <input type="hidden" name="description" id="hidden-description">

                    <!-- End Quill Editor Full -->

                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj' : 'Edytuj' }} </button>
            </div>
        </form>
    </div>

@endsection
