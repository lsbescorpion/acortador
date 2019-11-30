import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http';
import { Observable } from 'rxjs';

import {Globals} from '../globals';

@Injectable({ providedIn: 'root' })
export class UsuarioService {
    constructor(private http: HttpClient, private globals: Globals) { }

    getUser(id): Observable<any> {
        return this.http.get<any>(`${this.globals.apiUrl}/user/` + id);
    }

    crearUser(user) {
        return this.http.post(`${this.globals.apiUrl}/users/create`, user);
    }

    updateUser(id, user) {
        return this.http.put(`${this.globals.apiUrl}/users/update/` + id, user);
    }

    delUser(id) {
        return this.http.delete(`${this.globals.apiUrl}/users/delete/` + id);
    }

    logout(token: any) {
        return this.http.put(`${this.globals.apiUrl}/users/logout`, {token: token})
    }

    removePhoto(id: number, photo) {
        return this.http.get(`${this.globals.apiUrl}/user/removephoto?photo=`+photo+`&id=`+id);
    }

    remPhotos(id: number, photo) {
        return this.http.get(`${this.globals.apiUrl}/usr/remphotos?photo=`+photo+`&id=`+id);
    }

    updatePerfil(id, user) {
        return this.http.put(`${this.globals.apiUrl}/users/perfil/` + id, user);
    }

    getUserUser(user): Observable<any> {
        return this.http.get<any>(`${this.globals.apiUrl}/user?user=`+user);
    }

    getUserCorreo(correo): Observable<any> {
        return this.http.get<any>(`${this.globals.apiUrl}/user?correo=`+correo);
    }
}