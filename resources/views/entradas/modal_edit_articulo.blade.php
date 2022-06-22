
<div class="modal fade modal-slide-in-right" id="modal-edit-{{$item->id}}" aria-hidden="true" role="dialog" tabindex="-1">

    <div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{route('entradadetalle.update', $item->id)}}">
				@csrf
				@method('put')

				<div class="modal-header">
					<h4 class="modal-title">Editar registro {{$item->id}}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						 <span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="articulo_id" value="{{$item->articulo->id}}">
					<div class="form-group row">
						<label  class="col-md-4 col-form-label text-md-right">Artículo</label>
						<div class="col-md-6">
							<input  type="text" class="form-control"  value="{{$item->articulo->nombre}}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>
						<div class="col-md-6">
							<input id="cantidad" type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="@if(!old('cantidad')){{$item->cantidad}}@else{{old('cantidad')}}@endif" required>

							@if ($errors->has('cantidad'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('cantidad') }}</strong>
								</span>
							@endif
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-cancel"></i> Cancelar</button>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-trash"></i>
						{{ __('Actualizar') }}
					</button>
				</div>
				
			</form>

			
		</div>
	</div>

</div>