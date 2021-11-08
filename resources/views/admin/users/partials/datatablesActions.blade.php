<div class="btn-group" role="group" aria-label="">
@can($viewGate)
    <a class="btn btn-primary mr-2" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        {{ trans('global.view') }}
    </a>
@endcan
@can($editGate)
    <a class="btn btn-info mr-2" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
        {{ trans('global.edit') }}
    </a>
@endcan
@can($editGate)
    @if(auth()->id() !== $row->id)
    <a class="btn btn-warning mr-2" href="{{ route('admin.' . $crudRoutePart . '.impersonate', $row->id) }}">
        {{ trans('global.impersonate') }}
    </a>
    @endif
@endcan
@can($deleteGate)
    <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-danger" value="{{ trans('global.delete') }}">
    </form>
@endcan
</div>
