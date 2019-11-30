import { AfterViewInit, Component, OnInit } from '@angular/core';
import { FormControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import {MatSnackBar} from '@angular/material';
import {Globals} from '../../globals';
import * as moment from '../../../assets/plantilla/vendors/bower_components/moment/moment.js';
import * as Chartist from 'chartist';

import { UrlsService } from '../../services/urls.service';

declare var $: any;

@Component({
  	selector: 'app-estadisticas',
  	templateUrl: './estadisticas.component.html',
  	styleUrls: ['./estadisticas.component.scss']
})
export class EstadisticasComponent implements OnInit {

    vdiarias: any = 0;
    fvdiarias: any = '';
    visitas: any = 0;
    gdiarias: any = 0;
    gmensual: any = 0;

    constructor(private globals: Globals, private urlsService: UrlsService, private snackBar: MatSnackBar) { }

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

    ngOnInit() {
    }

    ngAfterViewInit(): void {
        var that = this;
        this.getEstadisticas();
        /*this.urlsService.getAnalytic()
            .subscribe(data => {
                let da: any = data;
                console.log(da);
            })*/
    }

    getEstadisticas() {
      	let us = JSON.parse(localStorage.getItem('currentUser'));
        this.urlsService.getEstadisticas(us.user.id)
            .subscribe(data => {
              	let da: any = data;
                let divisor: any = (us.role == 'Administrador' ? 100 : (us.role == 'Moderador' ? 60 : 50));
              	this.vdiarias = (da.vdiarias != null ? da.vdiarias.visitas : 0);
              	this.fvdiarias = da.fvdiarias
              	this.visitas = da.visitas;
                this.gdiarias = (da.gdiarias * divisor / 100).toFixed(2);
                this.gmensual = (da.gmensual * divisor / 100).toFixed(2);

                const dataCompletedTasksChart: any = {
        		        labels: da.chartdias.dia,
        		        series: [
        		            da.chartdias.visitas
        		        ]
        		    };

                const optionsCompletedTasksChart: any = {
        		        lineSmooth: Chartist.Interpolation.cardinal({
        		            tension: 0
        		        }),
        		        low: 0,
        		        high: da.max,
        		        chartPadding: { top: 0, right: 0, bottom: 0, left: 0}
        		    }

                const dataGananciasChart: any = {
                    labels: da.chartganancias.dia,
                    series: [
                        da.chartganancias.ganancias
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

        		    var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart)
              			.on("draw", function(data) {
                				if (data.type === "point") {
                  					data.element._node.setAttribute("title", "Value: " + data.value.y);
                  					data.element._node.setAttribute("data-chart-tooltip", "completedTasksChart");
                				}
              			}).on("created", function() {
                    		$("#completedTasksChart").tooltip({
                      			selector: '[data-chart-tooltip="completedTasksChart"]',
                      			container: "#completedTasksChart",
                      			html: true
                      	});
                    });

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

    		        this.startAnimationForLineChart(completedTasksChart);
                this.startAnimationForLineChart(gananciasChart);
      		  })
    }
}
