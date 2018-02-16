@extends('layouts.main')

@section('head')
    {!! HTML::style('/assets/css/reset-form.css') !!}
@stop

@section('content')

        {!! Form::open(['url' => url('/password/reset/'), 'class' => 'form-signin', 'method' => 'post' ] ) !!}

        @include('includes.errors')

        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <h2 class="form-signin-heading">Nouveau mot de passe</h2>

        <label for="inputEmail" class="sr-only">Adresse email</label>
        {!! Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Adresse email',
            'required',
            'id'                            => 'inputEmail',
            'data-parsley-required-message' => 'Email is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-type'             => 'email',
            'autofocus'
        ]) !!}

        <label for="inputPassword" class="sr-only">Nouveau mot de passe</label>
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe', 'required',  'id' => 'inputPassword' ]) !!}


        <label for="inputPasswordConfirmation" class="sr-only">Password Confirmation</label>
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation du nouveau mot de passe', 'required',  'id' => 'inputPasswordConfirmation' ]) !!}


        <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>

        {!! Form::close() !!}

@stop
