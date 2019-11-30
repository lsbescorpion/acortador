import { AfterViewInit, Component, OnInit } from '@angular/core';
import { FormControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import {Globals} from '../../globals';
import * as Dropzone from "../../../assets/plantilla/vendors/bower_components/dropzone/dist/dropzone.js";

import { UsuarioService } from '../../services/usuario.service';

declare var $: any;

@Component({
	selector: 'app-usuarios',
	templateUrl: './usuarios.component.html',
	styleUrls: ['./usuarios.component.scss']
})
export class UsuariosComponent implements OnInit {

  	userForm: FormGroup;
  	dtOptions: any = {};
  	table: any = '';
  	user_id = 0;
    drop: any = '';
    opt: any = '';
    hide: any = true;

 	constructor(private formBuilder: FormBuilder, private globals: Globals, private userService: UsuarioService) { }

    ngOnInit() {
        this.initForm();
        this.table = $('#data-table').DataTable(this.fillTable());
    }

  	initForm() {
      	if(this.user_id == 0)
            this.userForm = this.formBuilder.group({
                nombre_apellidos: ['', [Validators.required]],
                perfil_fb: ['', [Validators.required]],
                password: ['', [Validators.required]],
                correo: ['', [Validators.required, Validators.email]],                
                rol: ['', [Validators.required]],
                activo: [true]
            });
        else
    	    	this.userForm = this.formBuilder.group({
                nombre_apellidos: ['', [Validators.required]],
                perfil_fb: ['', [Validators.required]],
                password: [''],
                correo: ['', [Validators.required, Validators.email]],                
                rol: ['', [Validators.required]],
                activo: [true]
            });
  	}

    ngAfterViewInit(): void {
        var that = this;
        this.UploadPhoto();
        $('#data-table').on( 'click', '.btn-delete', function () {
            that.deleteUser($(this).attr('date'));
        });

        $('#data-table').on( 'click', '.btn-edit', function () {
            that.fillPersonal($(this).attr('date'));
        });
    }

    get f() { return this.userForm.controls; }

    Registrar() {
        if (this.userForm.invalid) {
            return;
        }
        if(this.user_id == 0) {
            if(!confirm("Esta Seguro que desea Registrar el USUARIO?")) 
                return false;
            this.userService.crearUser(this.userForm.value)
                .subscribe(data => {
                    this.clearAll();
                    this.table = $('#data-table').DataTable(this.fillTable());
                    this.showMessage("Usuario creado");
                    var drop = Dropzone.forElement("#photo");
                    if(drop.files.length > 0) {
                        drop.files[0].update = 1;
                        var file = drop.files[0];
                        drop.removeFile(file);
                        drop.files.pop();
                    }
                    return;
            },
            error => {
                this.showMessage(error.errors.email[0]);
            });
        }
        else {
            if(!confirm("Esta Seguro que desea Modificar el USUARIO?")) 
                return false;
            this.userService.updateUser(this.user_id, this.userForm.value)
                .subscribe(data => {
                    this.clearAll();
                    this.table = $('#data-table').DataTable(this.fillTable());
                    this.showMessage("Usuario actualizado");
                    var drop = Dropzone.forElement("#photo");
                    if(drop.files.length > 0) {
                        drop.files[0].update = 1;
                        var file = drop.files[0];
                        drop.removeFile(file);
                        drop.files.pop();
                    }
            },
            error => {
                this.showMessage(error.errors.email[0]);
            });
        }
    }

    fillPersonal(p) {
        var that = this;
        this.userService.getUser(p)
            .subscribe(data => {
                var user: any = data;
                this.user_id = user.id;
                this.initForm();
                this.userForm.get('rol').setValue(user.roles[0].name);
                var activo = (user.activo == 1 ? true : false);
                this.userForm.get('activo').setValue(activo);
                this.userForm.get('nombre_apellidos').setValue(user.nombre_apellidos);
                this.userForm.get('perfil_fb').setValue(user.perfil_fb);
                this.userForm.get('correo').setValue(user.correo);
                $('.btn-addp').html('Actualizar');
                if(user.foto != null) {
                    var mockFile = { name: user.foto, size: user.foto_size, isMock : true};
                    var drop = Dropzone.forElement("#photo");
                    if(drop.files.length > 0) {
                        drop.files[0].update = 1;
                        var file = drop.files[0];
                        drop.removeFile(file);
                        drop.files.pop();
                    }
                    drop.emit("addedfile", mockFile);
                    drop.emit("thumbnail", mockFile, that.globals.urlPhoto+"photos/ID("+this.user_id+")"+user.foto);
                    drop.emit("complete", mockFile);
                    drop.files.push( mockFile );
                }
                else
                {
                  var drop = Dropzone.forElement("#photo");
                  if(drop.files.length > 0) {
                      drop.files[0].update = 1;
                      var file = drop.files[0];
                      drop.removeFile(file);
                      drop.files.pop();
                  }
                }
                $('#nombre_apellidos').focus();
                $('html, body').animate({ scrollTop: $('#foco').offset().top }, 'slow');
            });
    }

    deleteUser(id) {
        if(confirm("Esta Seguro que desea eliminar el USUARIO?")) {
            this.userService.delUser(id)
                .subscribe(data => {
                  this.table = $('#data-table').DataTable(this.fillTable());
                  this.showMessage("Usuario eliminado");
                  this.clearAll();
                }
            );
        }
    }

    clearAll() {
        this.userForm.get('rol').setValue('');
        this.userForm.get('activo').setValue(1);
        this.userForm.get('nombre_apellidos').setValue('');
        this.userForm.get('perfil_fb').setValue('');
        this.userForm.get('password').setValue('');
        this.userForm.get('correo').setValue('');
        $('#activo').prop('checked', true);
        this.user_id = 0;
        $('#rol').val('').trigger('change');
        $('.btn-addp').html('Registrar');
        this.initForm();
        var drop = Dropzone.forElement("#photo");
        if(drop.files.length > 0) {
            drop.files[0].update = 1;
            var file = drop.files[0];
            drop.removeFile(file);
            drop.files.pop();
        }
    }

  	fillTable() {
    	var that = this;
        return this.dtOptions = {
            pageLength: 10,
            autoWidth: !1,
            responsive: !0,
            "destroy": true,
            language: {
              	"url": "assets/Spanish.json",
              	searchPlaceholder: "Escriba parametro a filtrar..."
          	},
            ajax: this.globals.apiUrl+'/users',
            columns: [
              	{ title: 'Nombre y Apellidos', data: 'nombre_apellidos', className: "align-middle", "render": function ( data, type, row, meta ) {
              		return data;
                }},
                { title: 'Correo', data: 'correo', className: "align-middle", "render": function ( data, type, row, meta ) {
                    return  '<i class="zmdi zmdi-account-box-mail"></i> '+data;
                } },
          		{ title: 'Perfil FB', data: 'perfil_fb', className: "align-middle", "render": function ( data, type, row, meta ) {
                  	return  '<i class="zmdi zmdi-facebook"></i> '+data;
          		}},
                { title: 'Rol', data: 'id', className: "align-middle", "render": function ( data, type, row, meta ) {
                    return  '<mat-chip-list _ngcontent-c4="" class="mat-chip-list" tabindex="0" aria-required="false" aria-disabled="false" aria-invalid="false" aria-multiselectable="false" role="listbox" aria-orientation="horizontal" id="mat-chip-list-1"><div class="mat-chip-list-wrapper"><mat-chip _ngcontent-c4="" class="mat-chip mat-standard-chip mat-accent mat-chip-selected" color="accent" role="option" selected="" ng-reflect-color="accent" ng-reflect-selected="" tabindex="-1" aria-disabled="false" aria-selected="true">'+row.roles[0].name+'</mat-chip></div></mat-chip-list>';
                }},
                { title: 'Activo', data: 'activo', className: "align-middle", "render": function ( data, type, row, meta ) {
                  	return  (data == 1 ? '<i class="zmdi zmdi-check-circle-u zmdi-hc-2x"></i>' : '<i class="zmdi zmdi-dot-circle zmdi-hc-2x"></i>');
          		}},
                { title: 'Acción', data: 'id', "render": function ( data, type, row, meta ) {
                  	let editar = '<button date="'+data+'" title="Editar usuario" data-toggle="tooltip" class="mat-icon-button mat-accent btn-edit"><span class="mat-button-wrapper"><mat-icon class="mat-icon material-icons" role="img" aria-hidden="true">edit</mat-icon></span><div class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple="" ng-reflect-centered="true" ng-reflect-disabled="false" ng-reflect-trigger="[object HTMLButtonElement]"></div><div class="mat-button-focus-overlay"></div></button>';
                  	let eliminar = (row.roles[0].name != "Administrador") ? '<button date="'+data+'" title="Eliminar usuario" data-toggle="tooltip" class="mat-icon-button mat-accent btn-delete"><span class="mat-button-wrapper"><mat-icon class="mat-icon material-icons" role="img" aria-hidden="true">delete_sweep</mat-icon></span><div class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple="" ng-reflect-centered="true" ng-reflect-disabled="false" ng-reflect-trigger="[object HTMLButtonElement]"></div><div class="mat-button-focus-overlay"></div></button>' : '';
                  	return editar + eliminar;
                }}
            ],
            dom: '<"dataTables__top"lfB>rt<"dataTables__bottom"ip><"clear">',
            buttons: [{
                extend: "excelHtml5",
                title: "Export Data"
            }, {
                extend: "csvHtml5",
                title: "Export Data"
            }, {
                extend: "print",
                title: "Material Admin"
            }],
            "initComplete": function () {
                $('[data-toggle="tooltip"]').tooltip();
                $(this).closest(".dataTables_wrapper").find(".dataTables__top").prepend('<div class="dataTables_buttons hidden-sm-down actions"><span class="actions__item zmdi zmdi-print" data-table-action="print" /><span class="actions__item zmdi zmdi-fullscreen" data-table-action="fullscreen" /><div class="dropdown actions__item"><i data-toggle="dropdown" class="zmdi zmdi-download" /><ul class="dropdown-menu dropdown-menu-right"><a href="" class="dropdown-item" data-table-action="excel">Excel (.xlsx)</a><a href="" class="dropdown-item" data-table-action="csv">CSV (.csv)</a></ul></div></div>')
            },
        };
  	}

    UploadPhoto() {
        var that = this;
        var url = this.globals.apiUrl+"/user/photo";
        this.opt = {
            dictDefaultMessage: "Arrastre la imagen aqui",
            uploadMultiple: false,
            parallelUploads: 1,
            maxFiles: 1,
            url: url,
            addRemoveLinks:true,
            acceptedFiles: "image/*",
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            init: function() {    
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(file);
                        alert("Solo puede escoger una foto");
                    }
                });
                this.on("thumbnail", function(file, dataUrl) {
                    $('#photo .dz-image').last().find('img').attr({width: '100%', height: '100%'});
                });
                this.on("success", function(file) {
                    $('#photo .dz-image').css({"width":"100%", "height":"auto"});
                })
            },
            removedfile: function(file) {
                var _ref;
                if(file.update != 1)
                    that.userService.removePhoto(that.user_id, file.name)
                        .subscribe(data => {
                                    
                        }
                    );
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        };
        Dropzone.autoDiscover = false;
        this.drop = new Dropzone('#photo', this.opt);
    }

    showMessage(message: string) {
        $.notify({
            icon: 'notifications',
            title: ' Notificación',
            message: message,
            url: ''
        },{
            /*element: 'body',*/
            type: 'info',
            allow_dismiss: true,
            placement: {
                from: 'top',
                align: 'center'
            },
            timer: 1000,
            /*offset: {
                x: 20,
                y: 20
            },
            spacing: 10,
            z_index: 1031,
            delay: 2500,
            
            url_target: '_blank',
            mouse_over: false,*/
            animate: {
                enter: 'fadeInDown',
                exit: 'fadeOutUp'
            },
            template: '<div data-notify="container" class="col-xl-4 col-lg-4 col-11 col-sm-4 col-md-4 alert alert-{0} alert-with-icon" role="alert">' +
                      '<button mat-button  type="button" aria-hidden="true" class="close mat-button" data-notify="dismiss">  <i class="material-icons">close</i></button>' +
                      '<i class="material-icons" data-notify="icon">notifications</i> ' +
                      '<span data-notify="title">{1}</span> ' +
                      '<span data-notify="message">{2}</span>' +
                      '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                      '</div>' +
                      '<a href="{3}" target="{4}" data-notify="url"></a>' +
                      '</div>'
        });
    }

}
