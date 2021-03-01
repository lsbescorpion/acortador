@extends('app')

@section('content')
<div class="card card-custom">
	<div class="card-body">
		<form class="form" id="form_save_user" action="{{action('UsersController@updateUser')}}" method="POST">
		@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Nombre y Apellidos</label>
						<div class="input-group input-group-solid">
							<input type="text" class="form-control" placeholder="Nombre y Apellidos" name="name" value="{{$user->nombre_apellidos}}" required>
							<div class="input-group-append">
								<span class="input-group-text">
									<span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Files\User-folder.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
									        <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
									        <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
									    </g>
									</svg><!--end::Svg Icon--></span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Correo</label>
						<div class="input-group input-group-solid mb-2">
							<input type="email" class="form-control" placeholder="Correo" name="correo" id="correo" value="{{$user->correo}}" required>
							<div class="input-group-append">
								<span class="input-group-text">
									<span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
									    </g>
									</svg><!--end::Svg Icon--></span>
								</span>
							</div>
						</div>
						@error('correo')
						    <div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Perfil de Facebook</label>
						<div class="input-group input-group-solid">
							<input type="text" class="form-control" placeholder="Perfil" name="perfil_fb" value="{{$user->perfil_fb}}" required>
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-facebook"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Contraseña</label>
						<div class="input-group input-group-solid">
							<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-eye pass"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Rol</label>
						<select title="Rol" class="form-control form-control-solid" name="rol" id="rol" data-style="form-control-solid text-dark" required>
							<option value="Administrador">Administrador</option>
		                    <option value="Moderador">Moderador</option>
		                    <option value="Usuarios">Usuario</option>
						</select>
					</div>
				</div>
				<div class="col-sm-12 mt-10 mb-10">
					<div class="form-group">
						<label>Avatar</label>
	                    <div class="dropzone dropzone-default" id="photo">
	                        <div class="dropzone-msg dz-message needsclick">
	                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
	                        </div>
	                    </div>
					</div>
                </div>
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-primary font-weight-bold">ACTUALIZAR</button>
			</div>
		<input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
		</form>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
var user = {!! json_encode($user) !!};
$(document).on('click', '.pass', function() {
	if($(this).hasClass('la-eye')) {
		$(this).removeClass('la-eye');
		$(this).addClass('la-eye-slash ');
		$('#password').attr('type', 'text');
	}
	else {
		$(this).addClass('la-eye');
		$(this).removeClass('la-eye-slash ');
		$('#password').attr('type', 'password');
	}
});
$('#photo').dropzone({
    url: "{{route('uploadPhoto')}}",
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 1,
    maxFilesize: 25, // MB
    addRemoveLinks: true,
    //autoQueue: false,
    acceptedFiles: "image/*",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: function() {    
        this.on('addedfile', function(file) {
            if (this.files.length > 1) {
                this.removeFile(file);
            }
        });
        this.on("success", function(file,response) {
        	var image = $(file.previewElement).find('img');
            if(response != null) {
                $(file._removeLink).attr('dato', response);
                $(file._removeLink).attr('update', 0);
            }
            else {
            	$(image).css({'width': '100%', 'height': '100%'});
                $(file._removeLink).attr('dato', file.name);
                $(file._removeLink).attr('update', 1);
            }
        })
    },
    removedfile: function(file) {
        var _ref;
        var name = $(file._removeLink).attr('dato');
        var update = $(file._removeLink).attr('update');
        if(name != 'undefined' && update == 0) {
            $.ajax({
                type:'post',
                url: "{{route('removePhoto')}}",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                },
                error:function(data){
                }
            });
        }
        else 
        if(name != 'undefined' && update == 1) {
            $.ajax({
                type:'post',
                url: "{{route('removePhotoUser')}}",
                data:{user_id: user.id},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                },
                error:function(data){
                }
            });
        }
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
});
jQuery(document).ready(function() {
	window.history.pushState("", "", '/admin/edituser?user_id='+user.id);
	$('#rol').val(user.roles[0].name);
	$('#rol').selectpicker('refresh');
	if(user.foto != null) {
		var drop = Dropzone.forElement("#photo");
	    if(drop.files.length > 0) {
	        for(var i = 0; i < drop.files.length; i++) {
	            var file = drop.files[i].previewElement;
	            $(file).remove();
	        }
	    }
	    var na = user.foto.split("/");
	    var mockFile = { name: na[na.length - 1], size: user.foto_size, isMock : true};
	    drop.emit("addedfile", mockFile);
        drop.emit("thumbnail", mockFile, "{{asset('storage')}}"+"/"+user.foto);
	    drop.emit("success", mockFile);
	    drop.files.push( mockFile );
	}
});
</script>
@endsection
@section('pagina')
Modificar Usuario
@endsection