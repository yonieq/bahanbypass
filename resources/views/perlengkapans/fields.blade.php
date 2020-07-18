<!-- Regu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regu_id', 'Regu Id:') !!}
    {!! Form::number('regu_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Navigasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('navigasi', 'Navigasi:') !!}
    {!! Form::text('navigasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control']) !!}
</div>

<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'File:') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('perlengkapans.index') }}" class="btn btn-default">Cancel</a>
</div>
