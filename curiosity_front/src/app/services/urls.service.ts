import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse } from '@angular/common/http';
import { Observable } from 'rxjs';

import {Globals} from '../globals';

@Injectable({ providedIn: 'root' })
export class UrlsService {
  	constructor(private http: HttpClient, private globals: Globals) { }

  	getUrl(id): Observable<any> {
        return this.http.get<any>(`${this.globals.apiUrl}/url/` + id);
    }

    getUrlbyId(id, role): Observable<any> {
        return this.http.get<any>(`${this.globals.apiUrl}/url/byid/` + id + '?role='+role);
    }

  	acortarUrl(url) {
        return this.http.post(`${this.globals.apiUrl}/urls/acortar`, url);
    }

    delUri(id) {
        return this.http.delete(`${this.globals.apiUrl}/urls/delete/` + id);
    }

    getEstadisticas(id): Observable<any> {
        return this.http.get<any>(`${this.globals.apiUrl}/urls/estadisticas?user_id=`+id);
    }

    getAnalytic(): Observable<any> {
        return this.http.get<any>(`${this.globals.apiUrl}/urls/analytic`);
    }
}
