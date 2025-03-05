import { Routes } from '@angular/router';
import { CentrosComponent } from './components/centros-component/centros-component.component';
import { RegistroComponent } from './components/registro/registro.component';
import { LoginComponent } from './components/login/login.component';
import { ActividadesComponent } from './components/actividades/actividades.component';
import { InstalacionesComponent } from './components/instalaciones/instalaciones.component';
import { ReservasComponent } from './components/reservas/reservas.component';
import { InscripcionesComponent } from './components/inscripciones/inscripciones.component';

export const routes: Routes = [
    {path: 'centros', component: CentrosComponent},
    {path: 'centro/:id', component: CentrosComponent},
    
    {path: 'actividades', component: ActividadesComponent},
    {path: 'actividad/:id', component: ActividadesComponent},

    {path: "instalaciones", component: InstalacionesComponent},
    {path: "centro/:id/instalaciones", component: InstalacionesComponent},

    {path: "actividades", component: ActividadesComponent},
    {path: "centro/:id/actividades", component: ActividadesComponent},

    {path: "reservas", component: ReservasComponent},
    {path: "reserva/:id", component: ReservasComponent},

    {path: "inscripciones", component: InscripcionesComponent},
    {path: "inscripcion/:id", component: InscripcionesComponent},
    
    {path: "registro", component: RegistroComponent},
    {path: "login", component: LoginComponent},

    {path: "", redirectTo: "centros", pathMatch: "full"},
    {path: "**", redirectTo: "centros", pathMatch: "full"}
];
