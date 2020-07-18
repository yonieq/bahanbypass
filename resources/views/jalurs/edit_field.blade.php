<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control'])!!}
</div>

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Estimasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estimasi', 'Estimasi:') !!}
    {!! Form::text('estimasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Pos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_pos', 'Jumlah Pos:') !!}
    {!! Form::text('jumlah_pos', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control']) !!}
    @if($jalur->foto != NULL)
    <img src="{{ asset('storage/'. $jalur->foto) }}" alt="" width="100">
    @else
    <p>Tidak ada foto!</p>
    @endif
</div>



<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'File:') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}

    @if($jalur->file != NULL)
    <a href="{{ asset('storage/'. $jalur->file) }}" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
    @else
    <p>Tidak ada foto!</p>
    @endif
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jalurs.index') }}" class="btn btn-default">Cancel</a>
</div>
