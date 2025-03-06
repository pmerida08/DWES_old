import { Routes } from '@angular/router';
import { CentrosComponent } from './components/centros-component/centros-component.component';
import { RegistroComponent } from './components/registro/registro.component';
import { LoginComponent } from './components/login/login.component';
import { ActividadesComponent } from './components/actividades/actividades.component';
import { InstalacionesComponent } from './components/instalaciones/instalaciones.component';
import { ReservasComponent } from './components/reservas/reservas.component';
import { InscripcionesComponent } from './components/inscripciones/inscripciones.component';
import { UsuarioComponent } from './components/usuario/usuario.component';
import { ActividadesCentroCivComponent } from './components/actividades-centro-civ/actividades-centro-civ.component';

export const routes: Routes = [
    {path: 'centros', component: CentrosComponent},
    {path: 'centros/:id', component: CentrosComponent},
    
    {path: 'actividades', component: ActividadesComponent},
    {path: 'actividad/:id', component: ActividadesComponent},

    {path: "instalaciones", component: InstalacionesComponent},
    {path: "centros/:id/instalaciones", component: InstalacionesComponent},

    {path: "actividades", component: ActividadesComponent},
    {path: "centros/:centroId/actividades", component: ActividadesCentroCivComponent},

    {path: "reservas", component: ReservasComponent},
    {path: "reservas/:id", component: ReservasComponent},

    {path: "inscripciones", component: InscripcionesComponent},
    {path: "inscripciones/:id", component: InscripcionesComponent},
    
    {path: "registro", component: RegistroComponent},
    {path: "login", component: LoginComponent},

    {path: "user", component: UsuarioComponent},
    {path: "token/refresh", component: UsuarioComponent},

    {path: "", redirectTo: "centros", pathMatch: "full"},
    {path: "**", redirectTo: "centros", pathMatch: "full"}
];
