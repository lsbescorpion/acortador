import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import {Globals} from '../globals';

import * as moment from '../../assets/moment/moment.js';

@Injectable({ providedIn: 'root' })
export class AuthenticationService {
    constructor(private http: HttpClient, private globals: Globals) { }

    login(correo: string, password: string) {
        return this.http.post<any>(`${this.globals.apiUrl}/logins`, { correo, password })
            .pipe(map(user => {
                if (user && user.token) {
                    let expire = moment.duration({'days' : 1});
                    user.expireDate = moment().add(expire);
                    localStorage.setItem('currentUser', JSON.stringify(user));
                    this.globals.role = user.role;
                }
                return user;
            }));
    }

    logout() {
        localStorage.removeItem('currentUser');
    }
}