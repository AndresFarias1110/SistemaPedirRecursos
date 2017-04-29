<label>Descripciones de las metas</label>
@if(isset($disabled) && $disabled)
<select class="form-control" disabled>
	<option>[ Descripción ]</option>
</select>
@else
<select class="form-control" id="listDesMeta2" name="hoja_id2">
	<option>[ Descripción ]</option>
	@foreach($hojas as $h)
	<option value="{{ $h->id }}">{{ $h->id }}</option>
	@endforeach
</select>
@endif