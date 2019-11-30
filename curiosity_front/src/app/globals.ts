import { Injectable } from '@angular/core';

@Injectable()
export class Globals {
	apiUrl: string = 'http://127.0.0.1:8000/api';
	urlPhoto: string = 'http://127.0.0.1:8000/';
	globalUrl: string = 'http://localhost:4000';
	urlShared: string = 'http://localhost:4000';
	isLogued: boolean = false;
	role: string = '';
}
