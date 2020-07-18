<!-- Regu Id Field -->
<div class="form-group">
    {!! Form::label('regu_id', 'Regu Id:') !!}
    <p>{{ $perlengkapan->regu_id }}</p>
</div>

<!-- Navigasi Field -->
<div class="form-group">
    {!! Form::label('navigasi', 'Navigasi:') !!}
    <p>{{ $perlengkapan->navigasi }}</p>
</div>

<!-- Foto Field -->
<div class="form-group">
    {!! Form::label('foto', 'Foto:') !!}
    @if($perlengkapan->foto != NULL)
        <img src="{{ asset('storage/'. $perlengkapan->foto) }}" alt="" width="100">
    @else
        <p>Tidak ada foto!</p>
    @endif
</div>

<!-- File Field -->
<div class="form-group">
    {!! Form::label('file', 'File:') !!}
    @if($perlengkapan->file != NULL)
        <a href="{{ asset('storage/'.$perlengkapan->file) }}" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
    @else
        <p>Tidak ada PDF!</p>
    @endif
</div>

<div class="form-group">
    <b>Rincian data regu : </b>
    <ul>
    <li><p>Nama Regu : {{ $perlengkapan->regu->regu }}</p></li>
    <li><p>Jumlah Anggota : {{ $perlengkapan->regu->jumlah_anggota }}</p></li>
    </ul>
</div>