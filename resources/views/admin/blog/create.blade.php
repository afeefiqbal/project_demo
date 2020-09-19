@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('app.blog.title_singular') }}
    </div>
    <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route("admin.blog.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('app.blog.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($blogs) ? $blogs->name : '') }}">

                <p class="helper-block">
                    {{ trans('global.role.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('app.blog.fields.description') }}*</label>
                <textarea id="description" name="description" class="form-control"></textarea>
                <p class="helper-block">
                    {{ trans('global.role.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group ">
                <label for="tags">{{ trans('app.tags.title') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                    @foreach($tags as $id => $tags)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || isset($blog) && $blog->tags->contains($id)) ? 'selected' : '' }}>
                            {{ $tags }}
                        </option>
                    @endforeach
                </select>


            </div>
            <div class="form-group ">
                <label for="tags">{{ trans('app.category.title') }}*

                <select name="category" id="category" class="form-control select2" >
                    @foreach($category as $id => $category)
                        <option value="{{ $id }}" >
                            {{ $category }}
                        </option>
                    @endforeach
                </select>


            </div>
               <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>

        </form>
    </div>
</div>
@endsection
