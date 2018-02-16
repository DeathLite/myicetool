@extends('layouts.main')

@section('head')
    {!! HTML::style('/assets/css/register.css') !!}
    {!! HTML::style('/assets/css/parsley.css') !!}
    <style type="text/css">
      .whitediv{
        background-color:#fff;
        padding:15px;
        box-sizing:border-box;
      }
    </style>
@stop

@section('content')

        {!! Form::open(['url' => url('register'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

        @include('includes.errors')
        <div class="whitediv">
        <img  src="https://julienrouzot.com/inscription.PNG" style="width:350px; height:250px; margin-left: auto; margin-right: auto; display: block;" alt="logo my ice tool">
        <br>

        <label for="inputEmail" class="sr-only">Email address</label>
        {!! Form::email('email', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Adresse e-mail',
            'required',
            'id'                            => 'inputEmail',
            'data-parsley-required-message' => 'Email is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-type'             => 'email'
        ]) !!}

        <label for="inputFirstName" class="sr-only">First name</label>
        {!! Form::text('first_name', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Nom',
            'required',
            'id'                            => 'inputFirstName',
            'data-parsley-required-message' => 'First Name is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
            'data-parsley-minlength'        => '2',
            'data-parsley-maxlength'        => '32'
        ]) !!}

        <label for="inputLastName" class="sr-only">Last name</label>
        {!! Form::text('last_name', null, [
            'class'                         => 'form-control',
            'placeholder'                   => 'Prenom',
            'required',
            'id'                            => 'inputLastName',
            'data-parsley-required-message' => 'Last Name is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
            'data-parsley-minlength'        => '2',
            'data-parsley-maxlength'        => '32'
        ]) !!}


        <label for="inputPassword" class="sr-only">Password</label>
        {!! Form::password('password', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Mot de passe',
            'required',
            'id'                            => 'inputPassword',
            'data-parsley-required-message' => 'Password is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-minlength'        => '6',
            'data-parsley-maxlength'        => '20'
        ]) !!}


        <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label>
        {!! Form::password('password_confirmation', [
            'class'                         => 'form-control',
            'placeholder'                   => 'Confirmation du mot de passe',
            'required',
            'id'                            => 'inputPasswordConfirm',
            'data-parsley-required-message' => 'Password confirmation is required',
            'data-parsley-trigger'          => 'change focusout',
            'data-parsley-equalto'          => '#inputPassword',
            'data-parsley-equalto-message'  => 'Not same as Password',
        ]) !!}

        <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>

        <button class="btn btn-lg btn-primary btn-block register-btn" type="submit">S'inscrire</button>

        <p class="or-social">Ou s'inscrire avec : </p>

        @include('partials.socials')

        {!! Form::close() !!}
          </div>

@stop

@section('footer')

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>

    {!! HTML::script('/assets/plugins/parsley.min.js') !!}

    <script src='https://www.google.com/recaptcha/api.js'></script>

@stop
