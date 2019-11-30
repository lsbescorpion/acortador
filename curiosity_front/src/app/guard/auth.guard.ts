import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { Observable } from 'rxjs';
import {Globals} from '../globals';
import * as moment from '../../assets/moment/moment.js';
import { UsuarioService } from '../services/usuario.service';

@Injectable({
  	providedIn: 'root'
})
export class AuthGuards implements CanActivate {
  	constructor(private router: Router, private globals: Globals, private userService: UsuarioService) { }
    canActivate(next: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
      	if (localStorage.getItem('currentUser')) {
            let us = JSON.parse(localStorage.getItem('currentUser'));
            let day = moment();
            if(day.diff(us.expireDate) > 0) {
                this.userService.logout(us.token)
                    .subscribe(data => {
                        localStorage.removeItem('currentUser');
                        this.globals.isLogued = false;
                        this.router.navigate(['/login'], { queryParams: { returnUrl: state.url }});
                    }
                );
                return false;
            }
            let expectedRole = next.data.Role;
            let arr = expectedRole.filter(word => word == us.role);
            if(expectedRole != null && arr.length == 0 ){
                this.userService.logout(us.token)
                    .subscribe(data => {
                        localStorage.removeItem('currentUser');
                        this.globals.isLogued = false;
                        this.router.navigate(['/login'], { queryParams: { returnUrl: state.url }});
                    }
                );
                return false;
            }
            this.globals.isLogued = true;
            return true;
        }
        this.globals.isLogued = false;
        this.router.navigate(['/login']/*, { queryParams: { returnUrl: state.url }}*/);
        return false;
    }
}
