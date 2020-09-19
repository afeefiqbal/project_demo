@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('app.edit') }} {{ trans('app.category.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.category.update", [$category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('app.category.fields.name') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($category) ? $category->name : '') }}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('app.category.fields.title_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('app.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
