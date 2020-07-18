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
    @if($perlengkapan->foto != NULL)
        <img src="{{ asset('storage/'. $perlengkapan->foto) }}" alt="" width="100">
    @else
        <p>Tidak ada foto!</p>
    @endif
</div>

<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'File:') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
    @if($perlengkapan->file != NULL)
        <a href="{{ asset('storage/'.$perlengkapan->file) }}" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
    @else
        <p>Tidak ada PDF!</p>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('perlengkapans.index') }}" class="btn btn-default">Cancel</a>
</div>
