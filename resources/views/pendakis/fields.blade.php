<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Regu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regu_id', 'Regu Id:') !!}
    {!! Form::text('regu_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Mendaki Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_mendaki', 'Tanggal Mendaki:') !!}
    {!! Form::text('tanggal_mendaki', null, ['class' => 'form-control','id'=>'tanggal_mendaki']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tanggal_mendaki').datepicker({
            format: 'dd-mm-yyyy',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

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
    <a href="{{ route('pendakis.index') }}" class="btn btn-default">Cancel</a>
</div>
