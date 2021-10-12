<div class="btn-group" role="group" aria-label="">
@can($viewGate)
   {{-- <a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        {{ trans('global.view') }}
    </a>--}}
@endcan
@can($editGate)
    <a class="btn btn-success" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
        <i class="fa fa-edit fa-lg">&nbsp;</i>
        {{--{{ trans('global.edit') }}--}}
    </a>

    @if($row->isTested())
        <button class="btn btn-danger" data-toggle="modal" data-target="#sendEmailModal" data-url="{{ route('admin.' . $crudRoutePart . '.email', $row->code_ref) }}" data-email="{{ $row->email }}" data-ref="{{ $row->code_ref }}">
            <i class="fa fa-envelope fa-lg">&nbsp;</i>
            {{--{{ trans('global.email') }}--}}
        </button>
    @endif

    @if($row->isTested())
            <a class="btn btn-danger" href="{{ route('admin.' . $crudRoutePart . '.pdf', $row->code_ref) }}">
                <i class="fa fa-print fa-lg">&nbsp;</i>
                {{--{{ trans('global.pdf') }}--}}
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
