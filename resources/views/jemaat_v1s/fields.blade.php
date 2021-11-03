<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Lengkap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    {!! Form::text('nama_lengkap', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Whatsapp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_whatsapp', 'Nomor Whatsapp:') !!}
    {!! Form::text('nomor_whatsapp', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Domisili Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_domisili', 'Alamat Domisili:') !!}
    {!! Form::text('alamat_domisili', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::text('tanggal_lahir', null, ['class' => 'form-control','id'=>'tanggal_lahir']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_lahir').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Kartu Vaksin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kartu_vaksin', 'Kartu Vaksin:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('kartu_vaksin', ['class' => 'custom-file-input']) !!}
            {!! Form::label('kartu_vaksin', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
