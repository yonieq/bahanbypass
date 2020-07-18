<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $jalur->nama }}</p>
</div>

<!-- Lokasi Field -->
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    <p>{{ $jalur->lokasi }}</p>
</div>

<!-- Estimasi Field -->
<div class="form-group">
    {!! Form::label('estimasi', 'Estimasi:') !!}
    <p>{{ $jalur->estimasi }}</p>
</div>

<!-- Jumlah Pos Field -->
<div class="form-group">
    {!! Form::label('jumlah_pos', 'Jumlah Pos:') !!}
    <p>{{ $jalur->jumlah_pos }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $jalur->status }}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    @if($jalur->foto != NULL)
    <img src="{{ asset('storage/'. $jalur->foto) }}" alt="" width="200">
    @else
    <p>Tidak ada foto!</p>
    @endif
</div>

<!-- File Field -->
<div class="form-group">
    {!! Form::label('file', 'File:') !!}
    @if($jalur->file != NULL)
    <a href="{{ asset('storage/'. $jalur->file) }}" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
    @else
    <p>Tidak ada foto!</p>
    @endif
</div>

