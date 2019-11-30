import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import {Globals} from '../../globals';

declare const $: any;
declare interface RouteInfo {
    path: string;
    title: string;
    icon: string;
    class: string;
}
export const ROUTES: RouteInfo[] = [
    { path: '/estadisticas', title: 'Estadísticas',  icon: 'dashboard', class: '' },
    { path: '/usuarios', title: 'Usuarios',  icon:'person', class: '' },
    { path: '/perfil', title: 'Perfil',  icon:'person', class: '' },
    { path: '/urls', title: 'Urls',  icon:'person', class: '' },
    { path: '/showurl', title: 'Estadísticas Url',  icon:'person', class: '' },
];

@Component({
    selector: 'app-sidebar',
    templateUrl: './sidebar.component.html',
    styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
    menuItems: any[];
    showFiller: any = false;
    nombre: string = '';
    foto: any = 'assets/img/new_logo.png';

    constructor(private router: Router, public globals: Globals) { }

    ngOnInit() {
        this.menuItems = ROUTES.filter(menuItem => menuItem);
        let us = JSON.parse(localStorage.getItem('currentUser'));
        this.nombre = us.user.nombre_apellidos;
        if(us.user.foto != null)
            this.foto = this.globals.urlPhoto+"photos/ID("+us.user.id+")"+us.user.foto;
    }

    isMobileMenu() {
        if ($(window).width() > 991) {
            return false;
        }
        return true;
    }

    logout() {
        localStorage.removeItem('currentUser');
        this.globals.isLogued = false;
        this.router.navigate(['/login']);
    }
}
