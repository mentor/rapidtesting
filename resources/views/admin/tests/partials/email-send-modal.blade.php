@section('content')
@parent
<!-- Modal -->
<div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Odoslať Certifikát</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Skutočne si prajete odoslať email s certifikátom?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavrieť</button>
                <button type="button" class="btn btn-primary" id="sendEmail" data-dismiss="modal">Odoslať</button>
            </div>
        </div>
    </div>
</div>

<div id="sendEmailResponseModal"></div>
@endsection
@section('scripts')
@parent
    <script type="text/javascript">
        $(function() {
            $('#sendEmailModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget) // Button that triggered the modal
                let code_ref = button.data('ref') // Extract info from data-* attributes
                let email = button.data('email') // Extract info from data-* attributes
                let url = button.data('url') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                let modal = $(this);
                modal.find('.modal-title').text('Odoslať Certifikát ' + code_ref);
                modal.find('.modal-body').text('Skutočne si prajete odoslať certifikát na email ' + email + '?');
                modal.find('.modal-footer #sendEmail').off('click');
                modal.find('.modal-footer #sendEmail').on('click', function () {

                    $.ajax({
                        url: url, success: function (result) {
                            $('#sendEmailResponseModal').html(result);
                            $('#sendEmailResponseModal .modal').modal('show');
                        }
                    });

                });

            })
        });
    </script>
@endsection
