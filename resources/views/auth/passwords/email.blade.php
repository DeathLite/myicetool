@extends('layouts.main')

@section('head')
    {!! HTML::style('/assets/css/reset.css') !!}
    <style type="text/css">
      .whitediv{
        background-color:#fff;
        padding:15px;
        box-sizing:border-box;
      }
    </style>
@stop

@section('content')
<div class="whitediv">
        {!! Form::open(['url' => url('/password/email'), 'class' => 'form-signin' ] ) !!}

        @include('includes.status')



        <h2 class="form-signin-heading">Mot de passe oublié</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Adresse E-Mail', 'required', 'autofocus', 'id' => 'inputEmail' ]) !!}

        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer mon nouveau mot de passe</button>
      </div>
        {!! Form::close() !!}

@stop
