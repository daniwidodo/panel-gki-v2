<!-- Nama Ibadah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_ibadah', 'Nama Ibadah:') !!}
    {!! Form::text('nama_ibadah', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Deskripsi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Jam Ibadah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jam_ibadah', 'Jam Ibadah:') !!}
    {!! Form::text('jam_ibadah', null, ['class' => 'form-control']) !!}
</div>

<!-- Background Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('background_image', 'Background Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('background_image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('background_image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Quota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quota', 'Quota:') !!}
    {!! Form::number('quota', null, ['class' => 'form-control']) !!}
</div>