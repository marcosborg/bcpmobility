@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hero.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.heroes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.id') }}
                        </th>
                        <td>
                            {{ $hero->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.lang') }}
                        </th>
                        <td>
                            {{ $hero->lang->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.title') }}
                        </th>
                        <td>
                            {{ $hero->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.text') }}
                        </th>
                        <td>
                            {{ $hero->text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.button') }}
                        </th>
                        <td>
                            {{ $hero->button }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.link') }}
                        </th>
                        <td>
                            {{ $hero->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.button_2') }}
                        </th>
                        <td>
                            {{ $hero->button_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.link_2') }}
                        </th>
                        <td>
                            {{ $hero->link_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hero.fields.image') }}
                        </th>
                        <td>
                            @if($hero->image)
                                <a href="{{ $hero->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $hero->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.heroes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection