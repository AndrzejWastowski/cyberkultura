@extends('panel.app')
@section('content')
<div class="pagetitle">
    <h1>{{ $action == 'create' ? 'Dodawanie' : 'Edytpowanie'}} użytkownika</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.start') }}">Panel</a></li>
        <li class="breadcrumb-item">Użytkownicy</li>
        <li class="breadcrumb-item active">{{ $action == 'create' ? 'Dodawanie' : 'Edytowanie'}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
    <div class="container">

        @if(auth()->user()->isEditorOrAdmin())
    <!-- Treść dostępna dla edytora lub administratora -->
    tutaj mamy treść dostepna tylko dla użytkownika - admina lub edytora
       
        <form id="myForm" action="{{ $action == 'create' ? route('panel.user.create') : route('panel.user.update', ['user'=>$user])}}" method="POST">
            @csrf
            @if($action == 'edit')
            @method('PUT')
             @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Nazwa użytkownika</h5>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $user->id }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title">Grupa użytkownika</h5>
                            <select class="form-select" id="users_groups_id" name="users_groups_id" required>
                                @foreach ($user_groups as $group)
                                    <option value="{{ $group->id }}"
                                        {{ $group->id === $user->users_groups_id ? 'selected' : '' }}>
                                        {{ $group->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">e-mail</h5>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Podpis - sygnaturka</h5>
                        <input type="text" class="form-control" id="signature" name="signature" value="{{ $user->signature }}">
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Hasło</h5>
                        <input type="text" class="form-control" id="passwd" name="passwd" value="" >
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 class="card-title">Powtórz Hasło</h5>
                        <input type="text" class="form-control" id="passwd_confirmation" name="passwd_confirmation" value="" >
                    </div>
                </div>

            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Dodaj' : 'Edytuj' }} </button>
            </div>
        </form>
        @endif
      

    tutaj treść dla każdego bez uprawnienień


    </div>

@endsection
