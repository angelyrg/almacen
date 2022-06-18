
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1"
id="modal-delete-{{$sucursal->id}}">

    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Eliminar Sucursal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
			</div>
			<div class="modal-body">
				<p>¿Está seguro si desea eliminar la sucursal {{$sucursal->nombre."?"}} </p>
			</div>
			<div class="modal-footer">
                <form method="POST" action="{{route('sucursales.destroy', $sucursal->id)}}">
                    @csrf
                    @method('delete')
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"> {{ __('Sí, eliminar') }}</button>
                    
                </form>
			</div>
		</div>
	</div>
</div>