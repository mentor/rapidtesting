<div class="button-group">
    <div class="row">

        <div class="col-6">
            <input type="hidden" name="redirect_back"
                   value="{{ old('redirect_back', url()->previous('admin.tests.index')) }}"/>
            <a class="btn btn-outline-danger"
               href="{{ old('redirect_back', url()->previous('admin.tests.index')) }}">
                <span class="btn-icon fa fa-angle-double-left "></span>
                {{ trans('global.back') }}
            </a>
            <button class="btn btn-success" type="submit">
                <span class="btn-icon fa fa-save "></span>
                {{ trans('global.save') }}
            </button>
        </div>
        <div class="col-6 text-right">
            @if($test->isTested())
                <a class="btn btn-outline-dark" data-toggle="modal"
                   href="#"
                   data-target="#sendEmailModal" data-url="{{ route('admin.tests.email', $test->code_ref) }}"
                   data-email="{{ $test->email }}" data-ref="{{ $test->code_ref }}">
                    <span class="btn-icon fa fa-envelope "></span>
                    Email
                </a>
                <a class="btn btn-outline-dark" target="_blank"
                   href="{{ route('admin.tests.pdf', $test->code_ref) }}">
                    <span class="btn-icon fa fa-print "></span>
                    Vytlačiť
                </a>
            @endif
        </div>
    </div>
</div>
