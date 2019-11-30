import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FormsModule, ReactiveFormsModule }    from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { AdsenseModule } from 'ng2-adsense';

import { PLATFORM_ID, APP_ID, Inject } from '@angular/core';
import { isPlatformBrowser } from '@angular/common';

import { ErrorInterceptor } from './help/error.interceptor';
import { JwtInterceptor } from './help/jwt.interceptor';

import { Globals } from './globals';
import { routing }        from './routes/app.routing';
import { MetaModule, MetaLoader, MetaStaticLoader, PageTitlePositioning } from '@ngx-meta/core';

import { ComponentsModule } from './components/components.module';

import {
  MatButtonModule,
  MatInputModule,
  MatRippleModule,
  MatFormFieldModule,
  MatIconModule,
  MatTooltipModule,
  MatSelectModule,
  MatSlideToggleModule,
  MatChipsModule,
  MatBadgeModule,
  MatTabsModule,
  MatProgressSpinnerModule,
  MatProgressBarModule,
  MatSnackBarModule
} from '@angular/material';

import { AppComponent } from './app.component';
import { AgmCoreModule } from '@agm/core';
import { EstadisticasComponent } from './pages/estadisticas/estadisticas.component';
import { UsuariosComponent } from './pages/usuarios/usuarios.component';
import { LoginComponent } from './pages/login/login.component';
import { PerfilComponent } from './pages/perfil/perfil.component';
import { UrlsComponent } from './pages/urls/urls.component';
import { AlertcopyComponent } from './pages/alertcopy/alertcopy.component';
import { TemporalComponent } from './pages/temporal/temporal.component';
import { ErrorComponent } from './pages/error/error.component';
import { ShowurlComponent } from './pages/showurl/showurl.component';
import { AdminLayoutComponent } from './layouts/admin-layout/admin-layout.component';

export function metaFactory(): MetaLoader {
    return new MetaStaticLoader({
        pageTitlePositioning: PageTitlePositioning.PrependPageTitle,
        pageTitleSeparator: ' - ',
        applicationName: 'Tour of (lazy/busy) heroes',
        defaults: {
            title: 'Mighty mighty mouse',
            description: 'Mighty Mouse is an animated superhero mouse character',
            'og:image': 'https://upload.wikimedia.org/wikipedia/commons/f/f8/superraton.jpg',
            'og:type': 'website',
            'og:locale': 'en_US',
            'og:locale:alternate': 'en_US,nl_NL,tr_TR'
        }
    });
}


@NgModule({
    imports: [
        BrowserModule.withServerTransition({appId: 'curiositylol'}),
        BrowserAnimationsModule,
        AdsenseModule.forRoot({
            adClient: 'ca-pub-8486867415622163',
            adSlot: 1390700653,
        }),
        FormsModule,
        ReactiveFormsModule,
        HttpClientModule,
        ComponentsModule,
        routing,
        AgmCoreModule.forRoot({
            apiKey: 'YOUR_GOOGLE_MAPS_API_KEY'
        }),
        MatButtonModule,
        MatRippleModule,
        MatFormFieldModule,
        MatInputModule,
        MatSelectModule,
        MatTooltipModule,
        MatIconModule,
        MatSlideToggleModule,
        MatChipsModule,
        MatBadgeModule,
        MatTabsModule,
        MatProgressBarModule,
        MatProgressSpinnerModule,
        MatSnackBarModule,
        MetaModule.forRoot({
            provide: MetaLoader,
            useFactory: (metaFactory)
        })
    ],
    declarations: [
        AppComponent,
        EstadisticasComponent,
        UsuariosComponent,
        LoginComponent,
        PerfilComponent,
        UrlsComponent,
        AlertcopyComponent,
        TemporalComponent,
        ErrorComponent,
        AdminLayoutComponent,
        ShowurlComponent
    ],
    entryComponents: [AlertcopyComponent],
    providers: [
        Globals,
        { provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor, multi: true },
        { provide: HTTP_INTERCEPTORS, useClass: ErrorInterceptor, multi: true },
    ],
    bootstrap: [AppComponent]
})
export class AppModule { 
  constructor(
    @Inject(PLATFORM_ID) private platformId: Object,
    @Inject(APP_ID) private appId: string) {
    const platform = isPlatformBrowser(platformId) ?
      'in the browser' : 'on the server';
    //console.log(`Running ${platform} with appId=${appId}`);
  }
}