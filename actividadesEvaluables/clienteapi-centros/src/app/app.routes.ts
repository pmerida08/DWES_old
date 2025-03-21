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
import { NuevaInscripcionComponent } from './components/nueva-inscripcion/nueva-inscripcion.component';
import { NuevaReservasComponent } from './components/nueva-reservas/nueva-reservas.component';
import { CuentaComponent } from './components/cuenta/cuenta.component';
import { UpdateUsuarioComponent } from './components/update-usuario/update-usuario.component';

export const routes: Routes = [
    // {path: 'home', component: AppComponent},

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
    {path: "reserva/new/:id", component: NuevaReservasComponent},

    {path: "inscripciones", component: InscripcionesComponent},
    {path: "inscripciones/:id", component: InscripcionesComponent},
    {path: "inscripcion/new", component: NuevaInscripcionComponent},
    
    {path: "registro", component: RegistroComponent},
    {path: "login", component: LoginComponent},

    {path: "cuenta", component: CuentaComponent},
    {path: "cuenta/edit", component: UpdateUsuarioComponent},
    {path: "user", component: UsuarioComponent},
    {path: "token/refresh", component: UsuarioComponent},

    {path: "", redirectTo: "centros", pathMatch: "full"},
    {path: "**", redirectTo: "centros", pathMatch: "full"}
];
