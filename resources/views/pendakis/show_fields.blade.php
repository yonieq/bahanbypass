<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $pendaki->nama }}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $pendaki->alamat }}</p>
</div>

<!-- Regu Id Field -->
<div class="form-group">
    {!! Form::label('regu_id', 'Regu Id:') !!}
    <p>{{ $pendaki->regu_id }}</p>
</div>

<!-- Tanggal Mendaki Field -->
<div class="form-group">
    {!! Form::label('tanggal_mendaki', 'Tanggal Mendaki:') !!}
    <p>{{ $pendaki->tanggal_mendaki }}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    @if($pendaki->foto != NULL)
    <img src="{{ asset('storage/'.$pendaki->foto) }}" alt="" width="100">
    @else
    <p>Tidak ada Foto</p>
    @endif
</div>

<!-- File Field -->
<div class="form-group">
    {!! Form::label('file', 'File:') !!}
    @if($pendaki->file != NULL)
    <a href="{{ asset('storage/'.$pendaki->file) }}" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
    @else
    <p>Tidak ada PDF</p>
    @endif
</div>

