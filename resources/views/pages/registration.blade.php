@extends('layouts.default')
@section('title', 'Registrazione - Birre Laravel')
@section('content')
<div class="container">
    <form class="ms-auto me-auto mt-3" style="width:500px">
    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="password" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="conferma_password" id="form2Example3" class="form-control" />
        <label class="form-label" for="form2Example3">Conferma Password</label>
    </div>

    <!-- Submit button -->
    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Registrati</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Sei già iscritto? <a href="/login">Accedi</a></p>
    </div>
    </form>
</div>
@stop
