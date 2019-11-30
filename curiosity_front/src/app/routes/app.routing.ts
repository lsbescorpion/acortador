import { Routes, RouterModule } from '@angular/router';

import { AuthGuards } from '../guard/auth.guard';
import { HomeGuard } from '../guard/home.guard';

import { EstadisticasComponent } from '../pages/estadisticas/estadisticas.component';
import { UsuariosComponent } from '../pages/usuarios/usuarios.component';
import { LoginComponent } from '../pages/login/login.component';
import { PerfilComponent } from '../pages/perfil/perfil.component';
import { UrlsComponent } from '../pages/urls/urls.component';
import { TemporalComponent } from '../pages/temporal/temporal.component';
import { ErrorComponent } from '../pages/error/error.component';
import { AppComponent } from '../app.component';
import { ShowurlComponent } from '../pages/showurl/showurl.component';

/*********************************
Configuración de las Rutas del APP
**********************************/

const appRoutes: Routes = [
	{ path: 'login', component: LoginComponent},
    { path: '', redirectTo: 'estadisticas', pathMatch: 'full' },
    { path: 'estadisticas', component: EstadisticasComponent, canActivate: [AuthGuards],data: {Role: ['Administrador','Moderador', 'Usuarios']} },
    { path: 'usuarios', component: UsuariosComponent, canActivate: [AuthGuards],data: {Role: ['Administrador']} },
    { path: 'perfil', component: PerfilComponent, canActivate: [AuthGuards],data: {Role: ['Administrador','Moderador', 'Usuarios']} },
    { path: 'urls', component: UrlsComponent, canActivate: [AuthGuards],data: {Role: ['Administrador','Moderador', 'Usuarios']} },
    { path: 'showurl/:id', component: ShowurlComponent, canActivate: [AuthGuards],data: {Role: ['Administrador','Moderador', 'Usuarios']} },

    { path: 'categoria/salud/:id', component: LoginComponent },
    { path: 'categoria/gracioso/:id', component: LoginComponent },
    { path: 'categoria/curiosidades/:id', component: LoginComponent },
    { path: 'categoria/videos/:id', component: LoginComponent },
    { path: 'categoria/tecnología/:id', component: LoginComponent },
    { path: 'categoria/manualidades/:id', component: LoginComponent },
    { path: '404', component: ErrorComponent },
    { path: '**', redirectTo: '404' },
];

export const routing = RouterModule.forRoot(appRoutes);