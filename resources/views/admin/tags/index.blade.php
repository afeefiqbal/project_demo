@extends('layouts.admin')
@section('content')
{{-- @can('permission_create') --}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tags.create") }}">
                {{ trans('global.add') }} {{ trans('app.tags.title_singular') }}
            </a>
        </div>
    </div>
{{-- @endcan --}}
<div class="card">
    <div class="card-header">
        {{ trans('app.tags.title_singular') }} {{ trans('app.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('app.tags.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $key => $tags)
                        <tr data-entry-id="{{ $tags->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tags->name}}
                            </td>
                            <td>
                                @can('permission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tags.show', $tags->id) }}">
                                        {{ trans('app.view') }}
                                    </a>
                                @endcan
                                @can('permission_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tags.edit', $tags->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('permission_delete')
                                    <form action="{{ route('admin.tags.destroy', $tags->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection

