@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('app.show') }} {{ trans('app.category.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('app.category.fields.name') }}
                    </th>
                    <td>
                        {{ $category->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
