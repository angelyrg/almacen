<div class="modal fade modal-slide-in-right" id="modal-delete-{{$entrada->id}}" aria-hidden="true" role="dialog" tabindex="-1">

    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Eliminar registro</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
			</div>
			<div class="modal-body">
				<p>¿Está seguro si desea eliminar el registro?</p>
			</div>
			<div class="modal-footer">
                <form method="POST" action="{{route('entradas.destroy', $entrada->id)}}">
                    @csrf
                    @method('delete')
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-cancel"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger">
						<i class="fa fa-trash"></i>
						{{ __('Sí, eliminar') }}
					</button>
                </form>
			</div>
		</div>
	</div>

</div>