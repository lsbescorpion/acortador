import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class HomeGuard implements CanActivate {
	constructor(private router: Router) { }
  	canActivate(next: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
    	if (localStorage.getItem('currentUser')) {
            let us = JSON.parse(localStorage.getItem('currentUser'));

            if(us.role == "Admin"){
                this.router.navigate(['/admin/boards']);
                return true;
            }
            else
            if(us.role == "Client"){
                this.router.navigate(['/client/trips']);
                return true;
            }
            else
            if(us.role == "Dispatcher"){
                this.router.navigate(['/dispatcher/trip']);
                return true;
            }
        }
        this.router.navigate(['/login']);
        return false;
  	}
}
