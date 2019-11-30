import { switchMap } from 'rxjs/operators';
import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { Observable } from 'rxjs';
import { Title, Meta } from '@angular/platform-browser';
import {Globals} from '../../globals';

import { UrlsService } from '../../services/urls.service';

import * as $ from 'jquery';

@Component({
  	selector: 'app-temporal',
  	templateUrl: './temporal.component.html',
  	styleUrls: ['./temporal.component.scss']
})
export class TemporalComponent implements OnInit {

	url: any = null;
	title: any = '';
	show: any = false;

	constructor(private route: ActivatedRoute, private router: Router, private urlsService: UrlsService, private readonly meta: Meta, private titleService: Title,
				private globals: Globals) {

	}
 
	ngOnInit() {

	}

	onFinished() {
		/*var link = '<a href="'+this.url.url_real+'" style="color: #FFFFFF;">Acceder al artículo completo aquí</a>';
		$('.btn-count').html(link);*/
	}
}
