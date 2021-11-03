<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $ibadah->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ibadah->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ibadah->updated_at }}</p>
</div>

<!-- Nama Ibadah Field -->
<div class="col-sm-12">
    {!! Form::label('nama_ibadah', 'Nama Ibadah:') !!}
    <p>{{ $ibadah->nama_ibadah }}</p>
</div>

<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $ibadah->tanggal }}</p>
</div>

<!-- Deskripsi Field -->
<div class="col-sm-12">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{{ $ibadah->deskripsi }}</p>
</div>

<!-- Jam Ibadah Field -->
<div class="col-sm-12">
    {!! Form::label('jam_ibadah', 'Jam Ibadah:') !!}
    <p>{{ $ibadah->jam_ibadah }}</p>
</div>

<!-- Background Image Field -->
<div class="col-sm-12">
    {!! Form::label('background_image', 'Background Image:') !!}
    <p>{{ $ibadah->background_image }}</p>
</div>

<!-- Quota Field -->
<div class="col-sm-12">
    {!! Form::label('quota', 'Quota:') !!}
    <p>{{ $ibadah->quota }}</p>
</div>

