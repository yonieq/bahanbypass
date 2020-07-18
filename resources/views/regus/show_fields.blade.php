<!-- Regu Field -->
<div class="form-group">
    {!! Form::label('regu', 'Regu:') !!}
    <p>{{ $regu->regu }}</p>
</div>

<!-- Jumlah Anggota Field -->
<div class="form-group">
    {!! Form::label('jumlah_anggota', 'Jumlah Anggota:') !!}
    <p>{{ $regu->jumlah_anggota }}</p>
</div>

<!-- Jalur Id Field -->
<div class="form-group">
    {!! Form::label('jalur_id', 'Jalur Id:') !!}
    <p>{{ $regu->jalur_id }}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    @if($regu->foto != NULL)
        <img src="{{ asset('storage/'.$regu->foto) }}" alt="" width="100">
    @else
    <p>Tidak ada foto</p>
    @endif
</div>

<!-- File Field -->
<div class="form-group">
    {!! Form::label('file', 'File:') !!}
    @if($regu->file != NULL)
        <a href="{{ asset('storage/'.$regu->file) }}" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
    @else
    <p>Tidak ada PDF</p>
    @endif
</div>

