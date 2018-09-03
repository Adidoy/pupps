@extends('backpack::layout')
@section('header')
	<section class="content-header">
		<legend><h3 class="text-muted">Sectors</h3></legend>
		<ol class="breadcrumb">
			<li>Sectors</li>
			<li class="active">Home</li>
		</ol>
	</section>
@endsection
@section('content')
<!-- Default box -->
  <div class="box">
    <div class="box-body">
		<div class="panel panel-body table-responsive">
			<table class="table table-striped table-hover table-bordered" id='sectorTable'>
				<thead>
					<th class="no-sort">Sector Code</th>
					<th>Sector Name</th>
					<th>Head</th>
					<th>Designation</th>
					<th>Assistant to the Sector Head</th>
					<th>Designation</th>
					<th class="no-sort"></th>
				</thead>
			</table>
		</div>

    </div>
  </div>
@endsection

@section('after_scripts')
<script>
	$(document).ready(function(){
	    var table = $('#sectorTable').DataTable( {
	    	serverSide: true,
	    	processing: true,
			"processing": true,
	    	columnDefs:[
				{ targets: 'no-sort', orderable: false },
	    	],
		    language: {
		        searchPlaceholder: "Search..."
		    },
	    	"dom": "<'row'<'col-sm-3'l><'col-sm-6'<'toolbar'>><'col-sm-3'f>>" +
						    "<'row'<'col-sm-12'tr>>" +
						    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	        ajax: "{{ url('/maintenance/sectors') }}",
	        columns: [
	            { data: "sectorcode" },
	            { data: "sectorname" },
	            { data: "sectorhead" },
	            { data: "sectorheadposition" },
	            { data: "assisthead" },
	            { data: "assistheadposition" },
	            { data: function(callback){
	            	return `
						<a href="{{ url("maintenance/sectors") }}` + '/' + callback.id + '/edit' + `" class="btn btn-sm btn-default">Edit</a>
						<a href="{{ url("maintenance/sectors") }}` + '/' + callback.id + '/destroy' + `" class="btn btn-sm btn-default" id="button.remove">Remove</a>
	            	`;
	            } }
	        ],
	    } );

	 	$("div.toolbar").html(`
 			<a href="{{ url('maintenance/sectors/create') }}" id="newSector" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Add Sector</a>
		`);

		$('#sectorTable').on('click','button.remove',function(){
		  	var removeButton = $(this);
			removeButton.button('loading');
			$.ajax({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				type: 'delete',
				url: '{{ url("maintenance/sectors") }}' + '/' + $(this).data('id'), 
				dataType: 'json',
				success: function(response){
					if(response == 'success')
						swal("Operation Success",'An sector has been removed.',"success")
					else
						swal("Error Occurred",'An error has occurred while processing your data.',"error")
					table.ajax.reload()
			  		removeButton.button('reset');
				},
				error: function(response){
					swal("Error Occurred",'An error has occurred while processing your data.',"error")
				}
			})
		})
	});
</script>
@endsection
