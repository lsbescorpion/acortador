import { AfterViewInit, Component, OnInit } from '@angular/core';
import { FormControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import {MatSnackBar} from '@angular/material';
import {Globals} from '../../globals';
import * as moment from '../../../assets/plantilla/vendors/bower_components/moment/moment.js';
import { AlertcopyComponent } from '../alertcopy/alertcopy.component';

import { UrlsService } from '../../services/urls.service';

declare var $: any;

@Component({
  	selector: 'app-urls',
  	templateUrl: './urls.component.html',
  	styleUrls: ['./urls.component.scss'],
})
export class UrlsComponent implements OnInit {

    urlsForm: FormGroup;
  	dtOptions: any = {};
  	table: any = '';
  	loading: any = false;
  	durationInSeconds = 5;

 	constructor(private formBuilder: FormBuilder, private globals: Globals, private urlsService: UrlsService, private snackBar: MatSnackBar, private router: Router) { }

    ngOnInit() {
        this.initForm();
        this.table = $('#data-table').DataTable(this.fillTable());
    }

  	initForm() {
    		this.urlsForm = this.formBuilder.group({
      			url: [''],
      			categoria: ['1'],
      			accion: [''],
      			user_id: ['']
    		});
  	}

    ngAfterViewInit(): void {
        var that = this;
        $('#data-table').on( 'click', '.btn-copy', function () {
            let data: any = $(this).attr('date');
            let selBox = document.createElement('textarea');
    		    selBox.style.position = 'fixed';
    		    selBox.style.left = '0';
    		    selBox.style.top = '0';
    		    selBox.style.opacity = '0';
    		    selBox.value = data;
    		    document.body.appendChild(selBox);
    		    selBox.focus();
    		    selBox.select();
    		    document.execCommand('copy');
    		    document.body.removeChild(selBox);
    		    that.snackBar.openFromComponent(AlertcopyComponent, {
    		      	duration: that.durationInSeconds * 1000,
    		    });
        });

        $('#data-table').on( 'click', '.btn-delete', function () {
            that.deleteUrl($(this).attr('date'));
        });

        $('#data-table').on( 'click', '.btn-show', function () {
            //that.showUrl($(this).attr('date'));
            that.router.navigate(['showurl', $(this).attr('date')]);
        });
    }

    get f() { return this.urlsForm.controls; }

    deleteUrl(id) {
        if(confirm("Esta Seguro que desea eliminar la URL?")) {
            this.urlsService.delUri(id)
                .subscribe(data => {
                    this.table = $('#data-table').DataTable(this.fillTable());
                    this.showMessage("Url eliminada");
                    this.clearAll();
                }
            );
        }
    }

    Acortar() {
        if (this.urlsForm.invalid) {
            return;
        }
        let us = JSON.parse(localStorage.getItem('currentUser'));
        this.urlsForm.get('user_id').setValue(us.user.id);
        this.loading = true;
      	this.urlsService.acortarUrl(this.urlsForm.value)
        		.subscribe(data => {
          			let da: any = data;
          			//this.clearAll();
          			this.table = $('#data-table').DataTable(this.fillTable());
          			this.loading = false;
          			this.initForm();
          			return false;
        		},
      			error => {
        				this.showMessage(error.errors.url[0]);
        				this.loading = false;
      			});
    }

    fillTable() {
      	var that = this;
      	let us = JSON.parse(localStorage.getItem('currentUser'));
        return this.dtOptions = {
            pageLength: 10,
            autoWidth: true,
            fixedColumns: true,
            responsive: true,
            "destroy": true,
            "order": [[0, 'desc']],
            language: {
              	"url": "assets/Spanish.json",
              	searchPlaceholder: "Escriba parametro a filtrar..."
          	},
            ajax: this.globals.apiUrl+'/urls?id='+us.user.id,
            columns: [
              	{ title: 'Fecha', data: 'fecha', className: "align-middle", "render": function ( data, type, row, meta ) {
              		  return moment(data).format('YYYY/MM/DD H:mm');
                }},
                { title: 'Acortada', data: 'url_acortada', className: "align-middle", "render": function ( data, type, row, meta ) {
                    return that.globals.urlShared+'/categoria/'+row.categoria.categoria+'/'+data;
                } },
            		{ title: 'Acción', data: 'accion', className: "align-middle", "render": function ( data, type, row, meta ) {
                    return data;
            		}},
                { title: 'Real', data: 'url_real', className: "align-middle", "render": function ( data, type, row, meta ) {
                    return data;
                }},
                { title: 'Visitas', data: 'visitas', className: "align-middle", "render": function ( data, type, row, meta ) {
                  	return data;
          		  }},
                { title: 'Opciones', data: 'id', "render": function ( data, type, row, meta ) {
                  	let editar = '<button date="'+row.accion+' '+that.globals.urlShared+'/categoria/'+row.categoria.categoria+'/'+row.url_acortada+'" title="Copiar url" data-toggle="tooltip" class="mat-icon-button mat-accent btn-copy"><span class="mat-button-wrapper"><mat-icon class="mat-icon material-icons" role="img" aria-hidden="true">file_copy</mat-icon></span><div class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple="" ng-reflect-centered="true" ng-reflect-disabled="false" ng-reflect-trigger="[object HTMLButtonElement]"></div><div class="mat-button-focus-overlay"></div></button>';
                  	let eliminar = '<button date="'+data+'" title="Eliminar url" data-toggle="tooltip" class="mat-icon-button mat-accent btn-delete"><span class="mat-button-wrapper"><mat-icon class="mat-icon material-icons" role="img" aria-hidden="true">delete_sweep</mat-icon></span><div class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple="" ng-reflect-centered="true" ng-reflect-disabled="false" ng-reflect-trigger="[object HTMLButtonElement]"></div><div class="mat-button-focus-overlay"></div></button>';
                    let view = '<button date="'+data+'" title="Mostrar datos url" data-toggle="tooltip" class="mat-icon-button mat-accent btn-show"><span class="mat-button-wrapper"><mat-icon class="mat-icon material-icons" role="img" aria-hidden="true">visibility</mat-icon></span><div class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple="" ng-reflect-centered="true" ng-reflect-disabled="false" ng-reflect-trigger="[object HTMLButtonElement]"></div><div class="mat-button-focus-overlay"></div></button>';
                  	return editar + eliminar + view;
                }}
            ],
            "columnDefs": [
                { "width": "150px", "targets": 0 },
                { "width": "200px", "targets": 1 },
                { "width": "400px", "targets": 2 },
                { "width": "300px", "targets": 3 },
                { "width": "60px", "targets": 4 },
                { "width": "120px", "targets": 5 }
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

    clearAll() {
        this.urlsForm.get('url').setValue('');
        this.urlsForm.get('categoria').setValue('1');
        this.urlsForm.get('accion').setValue('');
    }

    showMessage(message: string) {
        $.notify({
            icon: 'notifications',
            title: ' Notificación',
            message: message,
            url: ''
        },{
            type: 'info',
            allow_dismiss: true,
            placement: {
                from: 'top',
                align: 'center'
            },
            timer: 1000,
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