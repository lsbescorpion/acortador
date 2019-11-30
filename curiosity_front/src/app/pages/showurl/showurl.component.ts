import { AfterViewInit, Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import {MatSnackBar} from '@angular/material';
import * as Chartist from 'chartist';

import { UrlsService } from '../../services/urls.service';
import {Globals} from '../../globals';
import { AlertcopyComponent } from '../alertcopy/alertcopy.component';

declare var $: any;

@Component({
  	selector: 'app-showurl',
  	templateUrl: './showurl.component.html',
  	styleUrls: ['./showurl.component.css']
})
export class ShowurlComponent implements OnInit {

	fgdiarias: any = '';
	url: any = '';
	url_acortada: any = '';
	gtotal: any = 0;
	durationInSeconds = 5;

	constructor(private globals: Globals, private urlsService: UrlsService, private route: ActivatedRoute, private snackBar: MatSnackBar) { }

	startAnimationForLineChart(chart){
      	let seq: any, delays: any, durations: any;
      	seq = 0;
      	delays = 80;
      	durations = 500;

      	chart.on('draw', function(data) {
            if(data.type === 'line' || data.type === 'area') {
            		data.element.animate({
                		d: {
    	              		begin: 600,
    	              		dur: 700,
    	              		from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
    	              		to: data.path.clone().stringify(),
    	              		easing: Chartist.Svg.Easing.easeOutQuint
                		}
            		});
            } else if(data.type === 'point') {
              	seq++;
              	data.element.animate({
                  	opacity: {
  	                  	begin: seq * delays,
  	                  	dur: durations,
  	                  	from: 0,
  	                  	to: 1,
  	                  	easing: 'ease'
                  	}
              	});
            }
      	});

      	seq = 0;
  	};

  	ngAfterViewInit(): void {
  		$('[data-toggle="tooltip"]').tooltip();
    }

  	ngOnInit() {
  		let id: any = +this.route.snapshot.paramMap.get('id');
  		let us = JSON.parse(localStorage.getItem('currentUser'));
  		this.urlsService.getUrlbyId(id, us.role)
  			.subscribe(data => {
  				let da: any = data;
  				this.url = da.url;
  				this.fgdiarias = da.fgdiarias;
  				this.url_acortada = this.globals.globalUrl+'/'+da.url.categoria.categoria+'/'+da.url.url_acortada;
  				this.gtotal = da.gtotal;
  				const dataGananciasChart: any = {
                    labels: da.ganancias.dia,
                    series: [
                        da.ganancias.ganancias
                    ]
                };

                const optionsGananciasChart: any = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 0
                    }),
                    low: 0,
                    high: da.maxg,
                    chartPadding: { top: 0, right: 0, bottom: 0, left: 0}
                }

                var gananciasChart = new Chartist.Line('#gananciasChart', dataGananciasChart, optionsGananciasChart)
                    .on("draw", function(data) {
                        if (data.type === "point") {
                            data.element._node.setAttribute("title", "Value: " + data.value.y);
                            data.element._node.setAttribute("data-chart-tooltip", "gananciasChart");
                        }
                    }).on("created", function() {
                        $("#gananciasChart").tooltip({
                            selector: '[data-chart-tooltip="gananciasChart"]',
                            container: "#gananciasChart",
                            html: true
                        });
                    });

                this.startAnimationForLineChart(gananciasChart);
  			})
  	}

  	Copiar() {
  		let selBox = document.createElement('textarea');
		selBox.style.position = 'fixed';
		selBox.style.left = '0';
		selBox.style.top = '0';
		selBox.style.opacity = '0';
		selBox.value = this.url.accion + ' ' + this.url_acortada;
		document.body.appendChild(selBox);
		selBox.focus();
		selBox.select();
		document.execCommand('copy');
		document.body.removeChild(selBox);
		this.snackBar.openFromComponent(AlertcopyComponent, {
			duration: this.durationInSeconds * 1000,
		});
  	}
}
