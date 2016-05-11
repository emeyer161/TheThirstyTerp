<div style="display:inline-block">
	<script>

	  function ConfirmDelete(){
		  var x = confirm("Are you sure you want to delete?");
		  if (x)
		    return true;
		  else
		    return false;
	  }

		// function ConfirmDelete(text, callback) {
		// 	var shim, div, parent = document.body;

		// 	shim = document.createElement('iframe');
		// 	shim.className = 'shim';
		// 	parent.appendChild(shim);

		// 	div = document.createElement('div');
		// 	div.className = 'overlay';
		// 	div.innerHTML = text;
		// 	parent.appendChild(div);
		// 	div.onclick = function() {
		// 		parent.removeChild(div);
		// 		parent.removeChild(shim);
		// 		if (typeof callback === "function") {
		// 			try { callback(); } catch (e) { }
		// 		}
		// 	};
		// }
	</script>

	{!! Form::open(array('url' => $url, 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()')) !!}
		<button type="submit" class="btn btn-primary btn-danger" role="button"><span class="glyphicon glyphicon-trash"></button>
	{!! Form::close() !!}
</div>