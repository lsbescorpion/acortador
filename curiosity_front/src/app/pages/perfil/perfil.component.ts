import { AfterViewInit, Component, OnInit } from '@angular/core';
import { FormControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import {Globals} from '../../globals';
import * as Dropzone from "../../../assets/plantilla/vendors/bower_components/dropzone/dist/dropzone.js";

import { UsuarioService } from '../../services/usuario.service';

declare var $: any;

@Component({
  	selector: 'app-perfil',
 	templateUrl: './perfil.component.html',
  	styleUrls: ['./perfil.component.scss']
})
export class PerfilComponent implements OnInit {

	us: any;
	foto: any = 'assets/img/new_logo.png';
	userForm: FormGroup;
    drop: any = '';
    opt: any = '';
    user_foto: any = '';
    hide: any = true;
    urls: any = 0;
    visitas: any = 0;

	constructor(private formBuilder: FormBuilder, private globals: Globals, private userService: UsuarioService) { }

    ngOnInit() {
    	this.us = JSON.parse(localStorage.getItem('currentUser'));
    	if(this.us.user.foto != null)
            this.foto = this.globals.urlPhoto+"photos/ID("+this.us.user.id+")"+this.us.user.foto;
        this.initForm();
        this.UploadPhoto();
        this.fillPersonal();
    }

    ngAfterViewInit(): void {
        var that = this;        
    }

    get f() { return this.userForm.controls; }

	initForm() {
		this.userForm = this.formBuilder.group({
			nombre_apellidos: ['', [Validators.required]],
	        perfil_fb: ['', [Validators.required]],
			password: [''],
			correo: [''],
            ci: ['', [Validators.required]],
            direccion: [''],
            metodo: [''],
            tarjeta: [''],
		});
	}

    Registrar() {
        if (this.userForm.invalid) {
            return;
        }
        if(!confirm("Esta Seguro que desea modificar el perfil de USUARIO?")) 
                return false;
        this.userService.updatePerfil(this.us.user.id, this.userForm.value)
            .subscribe(data => {
                let da: any = data;
                if(da.foto != null) {
                    let usr = JSON.parse(localStorage.getItem('currentUser'));
                    if(usr.user.foto != da.foto) {
                        usr.user.foto = da.foto;
                        usr.user.foto_size = da.foto_size;
                        localStorage.setItem('currentUser', JSON.stringify(usr));
                        this.user_foto = da.foto;
                        this.fillPersonal();
                        this.foto = this.globals.urlPhoto+"photos/ID("+this.us.user.id+")"+da.foto;
                    }
                }
                this.showMessage("Perfil actualizadodo");
                return;
        });
    }

	fillPersonal() {
        this.userService.getUser(this.us.user.id)
            .subscribe(data => {
                var user: any = data;
                this.userForm.get('nombre_apellidos').setValue(this.us.user.nombre_apellidos);
                this.userForm.get('perfil_fb').setValue(this.us.user.perfil_fb);
                this.userForm.get('correo').setValue(this.us.user.correo);
                this.userForm.get('ci').setValue((user.perfil != null ? user.perfil.ci : ''));
                this.userForm.get('direccion').setValue((user.perfil != null ? user.perfil.direccion : ''));
                var banco = (user.perfil != null ? user.perfil.banco : '');
                this.userForm.get('metodo').setValue(banco.toString());
                this.userForm.get('tarjeta').setValue((user.perfil != null ? user.perfil.tarjeta : ''));
                this.urls = (user.urls != null ? user.urls.length : 0);
                this.visitas = (user.visitas != null ? user.visitas : 0);
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
                    drop.emit("thumbnail", mockFile, this.globals.urlPhoto+"photos/ID("+this.us.user.id+")"+user.foto);
                    drop.emit("complete", mockFile);
                    drop.files.push( mockFile );
                }
            });
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
                    that.userService.remPhotos(that.us.user.id, file.name)
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
