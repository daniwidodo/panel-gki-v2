<div class="table-responsive">
    <table class="table" id="ibadahs-table">
        <thead>
            <tr>
                <th>Nama Ibadah</th>
        <th>Tanggal</th>
        <th>Deskripsi</th>
        <th>Jam Ibadah</th>
        <th>Background Image</th>
        <th>Quota</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ibadahs as $ibadah)
            <tr>
                <td>{{ $ibadah->nama_ibadah }}</td>
            <td>{{ $ibadah->tanggal }}</td>
            <td>{{ $ibadah->deskripsi }}</td>
            <td>{{ $ibadah->jam_ibadah }}</td>
            <td>{{ $ibadah->background_image }}</td>
            <td>{{ $ibadah->quota }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ibadahs.destroy', $ibadah->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ibadahs.show', [$ibadah->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ibadahs.edit', [$ibadah->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
