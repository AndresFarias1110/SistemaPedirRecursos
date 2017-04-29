@if(isset($msg))
<div class="alert alert-{{ $msg['type'] }}">
	<strong>{{ $msg['title'] }}</strong> {{ (isset($msg['msg']) ? $msg['msg'] : $msg['message']) }}
</div>
@endif