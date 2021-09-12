<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Odoslanie Certifikátu</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Email s odkazom na certifikát {{ $payload->code_ref }} bol zaslaný na adresu {{ $payload->email }}.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-coreui-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
