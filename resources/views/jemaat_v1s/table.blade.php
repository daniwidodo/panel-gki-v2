<div class="table-responsive">
    <table class="table" id="jemaatV1s-table">
        <thead>
            <tr>
                <th>Nik</th>
        <th>Nama Lengkap</th>
        <th>Nomor Whatsapp</th>
        <th>Alamat Domisili</th>
        <th>Tanggal Lahir</th>
        <th>Kartu Vaksin</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jemaatV1s as $jemaatV1)
            <tr>
                <td>{{ $jemaatV1->nik }}</td>
            <td>{{ $jemaatV1->nama_lengkap }}</td>
            <td>{{ $jemaatV1->nomor_whatsapp }}</td>
            <td>{{ $jemaatV1->alamat_domisili }}</td>
            <td>{{ $jemaatV1->tanggal_lahir }}</td>
            <td>{{ $jemaatV1->kartu_vaksin }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['jemaatV1s.destroy', $jemaatV1->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jemaatV1s.show', [$jemaatV1->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('jemaatV1s.edit', [$jemaatV1->id]) }}" class='btn btn-default btn-xs'>
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
