<label>Descripciones de las metas</label>
@if(isset($disabled) && $disabled)
<select class="form-control" disabled>
	<option>[ Descripción ]</option>
</select>
@else
<select class="form-control" id="listDesMeta" name="hoja_id">
	<option>[ Descripción ]</option>
	@foreach($hojas as $h)
	<option value="{{ $h->id }}">{{ $h->id }}</option>
	@endforeach
</select>
<script>
	(function (){
		var baseUrl = $("body").attr('data-base-url');
		 console.log(baseUrl);
		 $("#listDesMeta").change(function(e) {
            var id = $(this).val();
            if(id > 0)
            {
               var url = baseUrl + '/api/hoja/descripcion/' + id;
               //$("#divDescM").html(loader);
               $.ajax({
                  url: url,
               	  type: 'GET',
                  success: function(data) {
                    $("#divDescM").html('<h4>Descripcion ' + id + ':</h4> '+ data.descripcion);
                  }
              }).fail(function(a, b, c) {
                $("#divDescM").html("<div class=\"alert alert-warning\">Ocurrio un problema de carga.</div>");
                console.log(a.responseText);
              });
            } else {
             //$("#divDescM").html(listMetas);
            }
         });
	})();
</script>

@endif