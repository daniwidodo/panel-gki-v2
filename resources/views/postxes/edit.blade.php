@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Postx</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($postx, ['route' => ['postxes.update', $postx->id], 'method' => 'patch', 'files' => true]) !!}

            <div class="card-body">
                <img height="150" src="{{ Storage :: url ($postx->image_url) }}" alt="">
                <div class="row">
                   
                    @include('postxes.fields')
                    
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('postxes.index') }}" class="btn btn-default">Cancel</a>
            </div>

            
           {!! Form::close() !!}

        </div>
    </div>
@endsection
