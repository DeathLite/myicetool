{!! Form::open(['url' => 'search']) !!}
<div class="input-group searchBar">
    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Rechercher une ville', 'id' => 'location-input', 'autocomplete' => 'off']) !!}
    <span class="input-group-btn">
        {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
    </span>
</div>
{!! Form::close() !!}

