@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tp Documento Identidad
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('tp_documento_identidads.show_fields')
                    <a href="{!! route('tpDocumentoIdentidads.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
