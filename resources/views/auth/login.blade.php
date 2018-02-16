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


        {!! Form::open(['url' => url('login'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}


        @include('includes.status')


        <div class="whitediv">
        <img  src="https://julienrouzot.com/Connexion.PNG" style="width:350px; height:250px; margin-left: auto; margin-right: auto; display: block;" alt="logo my ice tool">
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

        <div style="height:15px;"></div>
        <div class="row">
            <div class="col-md-12">
                <fieldset class="form-group">
                    {!! Form::checkbox('remember', 1, null, ['id' => 'remember-me']) !!}
                    <label for="remember-me">Remember me</label>
                </fieldset>
            </div>
        </div>

        <button class="btn btn-lg btn-primary btn-block login-btn" type="submit">Connexion</button>
        <p><a href="{{ url('password/reset') }}">Mot de passe oublié?</a></p>

        <p class="or-social">Se connecter avec mon reseau social :</p>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.5.0/parsley.min.js"></script>

@stop
