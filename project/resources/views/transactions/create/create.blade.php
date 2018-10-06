@extends('layouts.layout')


@section('content')
	@if(Auth::check())

		@if(\App\Http\Controllers\UserControlPermissionController::hasCreatePackagePermission(Auth::user()))
        
<form class="form-horizontal" role="form" method="POST" action="/create_packages" name="create" id="create" enctype="multipart/form-data">
	{{csrf_field()}}

    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
    <div class="alert alert-success print-success-msg" style="display:none">
        <ul></ul>
    </div>

	<div class="form-group">
		<label class="control-label col-sm-2" for="cpackno">Package No:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" name="cpackno" id="cpackno">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="date">Date:</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" name="date" id="date">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="package_code">Package Code:</label>
		<div class="col-sm-4">
			<select class="form-control" id="package_code" name="package_code">
				<option value="">Choose the code</option>
				{{-- this part displays the data fetched from the database see the route and the controller files on how to pass the variable $package --}}
				@foreach($package as $code)
					<option value="{{$code->Packagecode}}">{{$code->Packagename}}</option>
				@endforeach
			</select>
		</div>

	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="created_by">Created By:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" name="created_by" id="created_by" value="{{ Auth::user()->user_name}}" readonly>
		</div>
	</div>
	
	<div class="form-group col-md-12 table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th scope="col"></th>
				<th scope="col">Item Name</th>
				<th scope="col">Upload a document</th>
				<th scope="col" colspan="2">Comments</th>
			</tr>
			<tbody id="dynamic_field">
				<tr>
					<input type="hidden" value="1" name="item_no[]" class="name_list">
					<td>Item 1</td>
					<td>
						<select class="form-control name_list" id="item_name" name="item_name[]" >
							<option value="">Choose item name</option>
							
						</select> 
					</td>
					<td>
						<input type="file" class="form-control name_list" name="upload[]" id="upload[]" accept="application/pdf">
					</td>
					<td>
						<input type="text" class="form-control name_list" name="comments[]" id="comments[]">
					</td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
				</tr>
				</tbody>
		</table>
	</div>

<br>
	<div class="form-group col-sm-2">
		<button name="save" class="form-control btn btn-primary col-sm-5" data-toggle="modal" data-target="#mySaveModal" style="margin-left: 1275px;" id="save" type="button" onclick="printelement()">Save</button>
	</div>
	<div class="modal fade" id="mySaveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Check your Input</h4>
				</div>
				<div class="modal-body">
					<p>Here is your input are u sure to proceed?</p>
					<p id="pack_no"></p>
					<p id="dat"></p>
					<p id="package"></p>
					<p id="by"></p>
					<script>

                        //console.log("afasdfasf");

                        function printelement(){
                            var pack_no=document.getElementById("cpackno");
                            var date=document.getElementById("date");
                            var package=document.getElementById("package_code");
                            var by=document.getElementById("created_by");
                            console.log(pack_no.value);
                            document.getElementById('pack_no').innerHTML='<p id="pack_no">Package number:'+pack_no.value+'</p>';
                            document.getElementById('dat').innerHTML='<p id="date">Date:'+date.value+'</p>';
                            document.getElementById('package').innerHTML='<p id="package">Package:'+package.options[package.selectedIndex].text+'</p>';
                            document.getElementById('by').innerHTML='<p id="by">Created By:'+by.value+'</p>';
                        }

					</script>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" >Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	@include('layouts.errors')


</form>


@else
			<h1>Not Allowed to view this page!</h1>
@endif
	@include('layouts.errors');
@else
	<h1>You re not logged in!</h1>
	@if (Auth::guest())
		{{ view('Auth.login')}}
	@endif
@endif
@endsection

@section('ajax')
<script type="text/javascript">
	
    var j=1;
    $(document).ready(function(){      

      var postURL = "<?php echo url('/create_packages'); ?>";

      var i=1;
       
      $('#add').click(function(){ 
           i++; 
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
					'<input type="hidden" value="'+i+'" name="item_no[]" class="name_list">'+
					'<td>Item '+i+'</td>'+
					'<td>'+
						'<select class="form-control name_list" id="item_name'+i+'" name="item_name[]">'+
							'<option value="">Choose item name</option>'+
							
						'</select>'+ 
					'</td>'+
					'<td>'+
						'<input type="file" class="form-control name_list" name="upload[]" id="upload'+i+'" accept="application/pdf">'+
					'</td>'+
					'<td>'+
						'<input type="text" class="form-control name_list" name="comments[]" id="comments'+i+'">'+
					'</td>'+
                    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'+
				'</tr>');  
                j=i;
      });
      $(document).on('click', '.btn_remove', function(){ 
           var button_id = $(this).attr("id"); 
           $('#row'+button_id+'').remove();
		   j--; 
      });
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#save').click(function(){            

           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#create').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });

      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }

    });
//this is the Ajax script that fetches the 
//data behind the scene from database based on the selectoin of the package code,
 var xhttp = new XMLHttpRequest();
 var packageNumber = document.getElementById('package_code');
 packageNumber.onchange=  function (){
 	console.log("adfasfda");
 	var package_name='';
 	xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
 	   	responseObject=JSON.parse(xhttp.responseText);
    	console.log(responseObject);
    	var newcontent='';
    	//items is part of the response
    	console.log(responseObject.items.length);
    	$('#item_name').empty();
    	for(var i=0;i<responseObject.items.length;i++){
    		newcontent+='<option value="'+responseObject.items[i].Itemname+'">'+responseObject.items[i].Itemname+'</option>';
    	}
        document.getElementById("item_name").innerHTML = newcontent;
        for(var k=2;k<=j;k++){
            document.getElementById("item_name"+k).innerHTML = newcontent;
        }
            //document.getElementById("package_name");
    }
  };
  xhttp.open("GET", "get_package_id/" + packageNumber.value, true);
 	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhttp.send();
 }

</script>

@endsection