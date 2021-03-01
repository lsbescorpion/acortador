@extends('app')

@section('content')
<div class="card card-custom">
	<div class="card-body">
		<form class="form" id="form_noticia" action="{{action('BlogController@updateNoticia')}}" method="POST">
		@csrf
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Título de la Noticia</label>
						<div class="input-group input-group-solid">
							<input type="text" class="form-control" placeholder="Título de la Noticia" id="titulo" name="titulo" value="{{$blog->titulo}}" required>
							<div class="input-group-append">
								<span class="input-group-text">
									<span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Thumbtack.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"/>
									        <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747) " points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"/>
									    </g>
									</svg><!--end::Svg Icon--></span>
								</span>
							</div>
						</div>
						<div class="invalid-feedback-titulo col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;"></div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
	                    <label class="">Categoría</label>
	                    <select class="form-control form-control-solid select2" name="categoria" id="categoria" required>
	                        <option value="1">Salud</option>
	                        <option value="2">Entretenimiento</option>
	                        <option value="3">Curiosidades</option>
	                        <option value="4">Video</option>
	                        <option value="5">Tecnología</option>
	                        <option value="6">Manualidades</option>
	                    </select>
	                    <span class="form-text text-muted">Escoja la categoría.</span>
	                </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Video de la Noticia</label>
						<div class="input-group input-group-solid">
							<input type="text" class="form-control" placeholder="Video de la Noticia" name="video" value="{{$blog->video}}">
							<div class="input-group-append">
								<span class="input-group-text">
									<span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Video-camera.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									        <rect x="0" y="0" width="24" height="24"/>
									        <rect fill="#000000" x="2" y="6" width="13" height="12" rx="2"/>
									        <path d="M22,8.4142119 L22,15.5857848 C22,16.1380695 21.5522847,16.5857848 21,16.5857848 C20.7347833,16.5857848 20.4804293,16.4804278 20.2928929,16.2928912 L16.7071064,12.7071013 C16.3165823,12.3165768 16.3165826,11.6834118 16.7071071,11.2928877 L20.2928936,7.70710477 C20.683418,7.31658067 21.316583,7.31658098 21.7071071,7.70710546 C21.8946433,7.89464181 22,8.14899558 22,8.4142119 Z" fill="#000000" opacity="0.3"/>
									    </g>
									</svg><!--end::Svg Icon--></span>
								</span>
							</div>
						</div>
						<span class="form-text text-muted">Url del video si posee alguno.</span>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Bloque 1</label>
						<div class="summernote" id="bloque1"></div>
						<div class="invalid-feedback-bloque1 col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;"></div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Bloque 2</label>
						<div class="summernote" id="bloque2"></div>
						<div class="invalid-feedback-bloque2 col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;"></div>
					</div>
				</div>
				<div class="col-sm-12 mt-10 mb-10">
					<div class="form-group">
						<label>Foto Principal</label>
	                    <div class="dropzone dropzone-default" id="photo">
	                        <div class="dropzone-msg dz-message needsclick">
	                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
	                        </div>
	                    </div>
	                    <div class="invalid-feedback-photo col-md-9" style="width: 100%;margin-top: 0.25rem;font-size: 12px;color: #F64E60;"></div>
					</div>
                </div>
			</div>
			<div class="form-group text-right">
				<button type="button" class="btn btn-primary font-weight-bold btn-submit">Actualizar</button>
			</div>
			<input type="hidden" name="bloquep" id="bloquep">
			<input type="hidden" name="bloque_1" id="bloque_1">
			<input type="hidden" name="bloque_2" id="bloque_2">
			<input type="hidden" name="blog_id" id="blog_id" value="{{$blog->id}}">
			<input type="hidden" name="slug" id="slug">
		</form>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
var blog = {!! json_encode($blog) !!};
function getSlug(url) {
	const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
	const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
	const p = new RegExp(a.split('').join('|'), 'g')

	var fin = url.toString().toLowerCase()
		.replace(/\s+/g, '-') // Replace spaces with -
		.replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
		.replace(/&/g, '-and-') // Replace & with 'and'
		.replace(/[^\w\-]+/g, '') // Remove all non-word characters
		.replace(/\-\-+/g, '-') // Replace multiple - with single -
		.replace(/^-+/, '') // Trim - from start of text
		.replace(/-+$/, '') // Trim - from end of text
	if(fin != '') {
		return fin;
	}
}
$(document).on('click', '.btn-submit', function() {
	$('.invalid-feedback-titulo').text('');
	$('.invalid-feedback-bloque1').text('');
	$('.invalid-feedback-bloque2').text('');
	$('.invalid-feedback-photo').text('');
	var drop = Dropzone.forElement("#photo");
	if($('#titulo').val() == '' || $('#titulo').val() == null) {
		$('.invalid-feedback-titulo').text('El título es requerido');
		return false;
	}
	else
	if($('#bloque1').summernote('isEmpty')) {
		$('.invalid-feedback-bloque1').text('El bloque 1 es requerido');
		return false;
	}
	else
	if($('#bloque2').summernote('isEmpty')) {
		$('.invalid-feedback-bloque2').text('El bloque 2 es requerido');
		return false;
	}
	else
	if(drop.files.length == 0) {
		$('.invalid-feedback-photo').text('La foto es requerida');
		return false;
	}
	else {
		var parent = $('#bloque1').parent();
		$('#bloquep').val($($(parent).find('div.card-block')).text());
		$('#bloque_1').val($('#bloque1').summernote('code'));
		$('#bloque_2').val($('#bloque2').summernote('code'));
		$('#slug').val(getSlug($('#titulo').val()));
		$('#form_noticia').submit();
	}
});
$('#photo').dropzone({
    url: "{{route('uploadPhotoBlog')}}",
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 1,
    maxFilesize: 25, // MB
    addRemoveLinks: true,
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
        	if(response != null)
            	$(file._removeLink).attr('update', 0);
            else
            	$(file._removeLink).attr('update', 1);
        })
    },
    removedfile: function(file) {
        var _ref;
        var update = $(file._removeLink).attr('update');
        if(update != null && update == 1) {
            $.ajax({
                type:'post',
                url: "{{route('removePhotoBlog')}}",
                data:{id: blog.id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){

                },
                error:function(data){
                }
            });
        }
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
});
$('#categoria').select2({
    placeholder: "Seleccione la Categoría"
});
$('.summernote').summernote({
	height: 350
});
jQuery(document).ready(function() {
	$('#categoria').val(blog.categoria_id);
	$('#categoria').trigger('change');
	$('#bloque1').summernote('code', blog.bloque1);
	$('#bloque2').summernote('code', blog.bloque2);
	var mockFile = { name: blog.foto, size: blog.foto_size, isMock : true};
	var drop = Dropzone.forElement("#photo");
	if(drop.files.length > 0) {
		var file = drop.files[0];
		drop.removeFile(file);
		drop.files.pop();
	}
	drop.emit("addedfile", mockFile);
	drop.emit("thumbnail", mockFile, "{{asset('')}}"+"systemblog/"+blog.foto);
	drop.emit("success", mockFile);
	drop.files.push( mockFile );
});
</script>
@endsection
@section('pagina')
Editar Noticia
@endsection