<div class="table-responsive">
    <table class="table" id="postxes-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Image Url</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($postxes as $postx)
            <tr>
                <td>{{ $postx->title }}</td>
            {{-- <td>{{ $postx->image_url }}</td> --}}
            <td><img height="50" src="{{ Storage :: url ($postx->image_url) }}" alt=""></td>
                <td width="120">
                    {!! Form::open(['route' => ['postxes.destroy', $postx->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postxes.show', [$postx->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('postxes.edit', [$postx->id]) }}" class='btn btn-default btn-xs'>
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
