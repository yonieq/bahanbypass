<!-- Regu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regu', 'Regu:') !!}
    {!! Form::text('regu', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Anggota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_anggota', 'Jumlah Anggota:') !!}
    {!! Form::text('jumlah_anggota', null, ['class' => 'form-control']) !!}
</div>

<!-- Jalur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jalur_id', 'Jalur Id:') !!}
    {!! Form::text('jalur_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control']) !!}
    @if($regu->foto != NULL)
    <img src="{{ asset('storage/'.$regu->foto) }}" alt="" width="100">
    @else
    <p>Tidak ada foto</p>
    @endif
</div>

<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'File:') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
    @if($regu->file != NULL)
        <a href="{{ asset('storage/'.$regu->file) }}" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
    @else
    <p>Tidak ada PDF</p>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('regus.index') }}" class="btn btn-default">Cancel</a>
</div>
