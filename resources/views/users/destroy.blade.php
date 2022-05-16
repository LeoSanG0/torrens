<!-- Modal -->
<div class="modal fade" id="modal_delete_user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 bg-black">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Eliminar</span>
                    <span class="fw-light">
                        Acción del Sistema
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_delete_user">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <p class="text-center">¿Esta seguro de eliminar este registro?</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-delete-user" >Eliminar</button>
            </div>
        </div>
    </div>
</div>