import { Component, OnInit, ViewChild, AfterViewInit } from '@angular/core';
import { Location, LocationStrategy, PathLocationStrategy, PopStateEvent } from '@angular/common';
import {trigger, animate, transition, style, query} from '@angular/animations';
import 'rxjs/add/operator/filter';
import { NavbarComponent } from './components/navbar/navbar.component';
import { Router, ActivatedRoute, ParamMap, NavigationEnd, NavigationStart } from '@angular/router';
import { Subscription } from 'rxjs/Subscription';
/*import PerfectScrollbar from 'perfect-scrollbar';*/
import {Globals} from './globals';
import { Observable } from 'rxjs';
import { Title, Meta } from '@angular/platform-browser';

import { UrlsService } from './services/urls.service';

declare var $: any;

@Component({
	  selector: 'app-root',
	  templateUrl: './app.component.html',
	  styleUrls: ['./app.component.css'],
    animations: [
        trigger('fadeAnimation', [
            transition('* => *', [
                query(
                  ':enter',
                  [style({ opacity: 0 })],
                  { optional: true }
                ),
                query(
                    ':enter',
                    [style({ opacity: 0 }), animate('0.3s ease-in', style({ opacity: 1 }))],
                    { optional: true }
                )
            ])
        ])
    ]
})
export class AppComponent {
    private _router: Subscription;
  	private lastPoppedUrl: string;
  	private yScrollStack: number[] = [];
    url: any = null;
    title: any = '';
    show: any = false;

  	constructor( public location: Location, private router: Router, public globals: Globals, private route: ActivatedRoute, private urlsService: UrlsService, private meta: Meta, private titleService: Title) {
    }

  	ngOnInit() {

  	}
    ngAfterViewInit() {
	    this.runOnRouteChange();
    }
  	isMaps(path){
      	var titlee = this.location.prepareExternalUrl(this.location.path());
      	titlee = titlee.slice( 1 );
      	if(path == titlee){
          	return false;
      	}
      	else {
          	return true;
      	}
  	}
  	runOnRouteChange(): void {
    	/*if (window.matchMedia(`(min-width: 960px)`).matches && !this.isMac()) {
      		const elemMainPanel = <HTMLElement>document.querySelector('.main-panel');
          if(elemMainPanel != null) {
          		const ps = new PerfectScrollbar(elemMainPanel);
          		ps.update();
          }
    	}*/
  	}
  	isMac(): boolean {
      	let bool = false;
      	if (navigator.platform.toUpperCase().indexOf('MAC') >= 0 || navigator.platform.toUpperCase().indexOf('IPAD') >= 0) {
          	bool = true;
      	}
      	return bool;
  	}
}
