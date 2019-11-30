import { AfterViewInit, Component, OnInit, Injectable, Inject, ElementRef, Renderer, PLATFORM_ID } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { first } from 'rxjs/operators';
import {Globals} from '../../globals';
import { Title, Meta, DOCUMENT } from '@angular/platform-browser';
import { MetaService } from '@ngx-meta/core';
import 'jquery-countdown';

import { AuthenticationService } from '../../services/authentication.service';
import { UrlsService } from '../../services/urls.service';

import * as $ from 'jquery';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

    loginForm: FormGroup;
    loading = false;
    submitted = false;
    returnUrl: string;
    error = '';
    url: any = null;
    title: any = '';
    show: any = false;
    id_url: any = null;

    constructor(
        private formBuilder: FormBuilder,
        private route: ActivatedRoute,
        private router: Router,
        private authenticationService: AuthenticationService,
        private globals: Globals,
        private urlsService: UrlsService, 
        private readonly meta: Meta, 
        private titleService: Title, 
        @Inject(DOCUMENT) private document) {}

    ngOnInit() {
        this.id_url = this.route.snapshot.paramMap.get('id');
        if(this.id_url != null) {
            this.show = true;
            /*const script = this.document.createElement('script');
            script.onload = () => {
                setTimeout(() => {
                    ((window as any).adsbygoogle || []).push({
                        google_ad_client: "ca-pub-8486867415622163",
                        enable_page_level_ads: true
                    });
                }, 100);
            }

            this.document.head.appendChild(script);*/
            this.urlsService.getUrl(this.id_url)
                .subscribe(data => {
                    let da: any = data;
                    this.url = da;
                    
                    this.titleService.setTitle(da.titulo);
                    this.meta.updateTag({name: 'title', content: da.titulo});
                    this.meta.updateTag({name: 'description', content: da.descripcion});
                    this.meta.updateTag({property: 'og:url', content: da.url_real});
                    this.meta.updateTag({property: 'og:title', content: da.titulo});
                    this.meta.updateTag({property: 'og:description', content: da.descripcion});
                    this.meta.updateTag({property: 'og:image', content: this.globals.urlPhoto+da.foto});

                    this.meta.updateTag({name: 'twitter:card', content: "summary"});
                    this.meta.updateTag({name: 'twitter:site', content: da.url_real});
                    this.meta.updateTag({name: 'twitter:title', content: da.titulo});
                    this.meta.updateTag({name: 'twitter:description', content: da.descripcion});
                    this.meta.updateTag({name: 'twitter:image', content: this.globals.urlPhoto+da.foto});

                    this.title = da.titulo;
                    let link: any = this.document.createElement('link');
                    link.rel = 'canonical';
                    link.href = da.url_real;
                    this.document.head.appendChild(link);
                    var that = this;
                    var fiveSeconds = new Date().getTime() + 15000;
                    setTimeout(() => {
                        $('#clock').countdown(fiveSeconds, function(event) {
                            $(this).html("Por favor espere: " + event.strftime('%S') + " Generando enlace");
                        }).on('finish.countdown', function(event) {
                            var link = '<a href="'+that.url.url_real+'" style="color: #FFFFFF;">Acceder al artículo completo aquí</a>';
                            $('.btn-count').html(link);
                        });  
                    }, 5000);   
                },
                err => {
                    if(err.id != null) {
                        this.show = false;
                        window.location = err.url_real;
                    }
                    else
                        this.router.navigate(['404']);
                });
        }
        else {
            this.authenticationService.logout();
            this.globals.isLogued = false;

            this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/';
        }

        this.loginForm = this.formBuilder.group({
            correo: ['', [Validators.required, Validators.email]],
            password: ['', Validators.required]
        });
    }

    ngAfterViewInit(): void {
        
    }

    get f() { return this.loginForm.controls; }

    onSubmit() {
        this.submitted = true;
        // stop here if form is invalid
        if (this.loginForm.invalid) {
            return;
        }

        this.loading = true;
        this.authenticationService.login(this.f.correo.value, this.f.password.value)
            .pipe(first())
            .subscribe(
                data => {
                    this.globals.isLogued = true;
                    this.router.navigate([data.url]);
                },
                error => {
                    this.error = error;
                    this.loading = false;
                    this.submitted = false;
                    this.loginForm.get('correo').setValue('');
                    this.loginForm.get('password').setValue('');
                    
                });
    }

}