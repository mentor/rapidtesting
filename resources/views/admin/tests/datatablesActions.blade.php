<div class="btn-group" role="group" aria-label="Toolbar with buttons">
    @can($viewGate)
       {{-- <a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
            {{ trans('global.view') }}
        </a>--}}
    @endcan
    @can($editGate)
        <a title="{{ trans('global.edit') }}" class="btn btn-ghost-dark" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
            <span class="btn-icon fa fa-edit fa-lg"></span>
        </a>
    @endcan
    @if($row->isTested())
        <button title="{{ trans('global.email') }}" class="btn btn-ghost-dark" data-toggle="modal" data-target="#sendEmailModal" data-url="{{ route('admin.' . $crudRoutePart . '.email', $row->code_ref) }}" data-email="{{ $row->email }}" data-ref="{{ $row->code_ref }}">
            <span class="btn-icon fa fa-envelope fa-lg"></span>
        </button>
    @endif

    @if($row->isTested())
            <a title="{{ trans('global.pdf') }}" target="_blank" class="btn btn-ghost-dark" href="{{ route('admin.' . $crudRoutePart . '.pdf', $row->code_ref) }}">
                <span class="btn-icon fa fa-print fa-lg"></span>
            </a>
    @endif

    @can($deleteGate)
        <form class="btn-group" action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button title="{{ trans('global.delete') }}" type="submit" class="btn btn-ghost-dark">
                <span class="btn-icon fa fa-trash fa-lg"></span>
            </button>
        </form>
    @endcan
</div>

