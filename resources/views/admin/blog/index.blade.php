
@extends('layouts.admin')
@section('content')
{{-- @can('permission_create') --}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.blog.create") }}">
                {{ trans('global.add') }} {{ trans('app.blog.title_singular') }}
            </a>
        </div>
    </div>
{{-- @endcan --}}
<div class="card">
    <div class="card-header">
        {{ trans('app.blog.title_singular') }} {{ trans('app.list') }}
    </div>


</div>
@endsection
@section('scripts')
@parent

@endsection
