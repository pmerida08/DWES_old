import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Inscripcion } from '../../models/inscripcion';
import { InscripcionesService } from '../../services/inscripciones/inscripciones.service';
import { Router } from '@angular/router';
import { Actividades } from '../../models/actividades';
import { ActividadesService } from '../../services/actividades/actividades.service';
import { CentroCivico } from '../../models/centroCivico';
import { CentrosService } from '../../services/centros/centros.service';

@Component({
  selector: 'app-inscripciones',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './inscripciones.component.html',
  styleUrl: './inscripciones.component.css',
})
export class InscripcionesComponent {
  inscripciones: Inscripcion[] = [];
  actividades: Actividades[] = [];
  centros: CentroCivico[] = [];

  constructor(
    private inscripcionService: InscripcionesService,
    private actividadesService: ActividadesService,
    private centroService: CentrosService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getInscripciones();
    this.getActividades();
    this.getCentros();
  }

  getCentros() {
    this.centroService.getCentros().subscribe({
      next: (result: CentroCivico[]) => {
        console.log('Centros obtenidos', result);
        this.centros = result;
      },
      error: (error) => {
        console.error('Error obteniendo centros', error);
      },
    });
  }

  getActividades() {
    this.actividadesService.getActividades().subscribe({
      next: (result: Actividades[]) => {
        console.log('Actividades obtenidas', result);
        this.actividades = result;
      },
      error: (error) => {
        console.error('Error obteniendo actividades', error);
      },
    });
  }

  getInscripciones() {
    this.inscripcionService.getInscripciones().subscribe({
      next: (result: Inscripcion[]) => {
        console.log('Datos obtenidos', result);
        this.inscripciones = result;
      },
      error: (error) => {
        console.log('Error obteniendo datos', error);
      },
    });
  }

  getActividadesInscripcion(id: any) {
    const actividad = this.actividades.find((actividad) => actividad.id === id);
    return actividad ? actividad.nombre : '';
  }

  getActividadesId(id: any) {
    const actividad = this.actividades.find((actividad) => actividad.id === id);
    return actividad ? actividad.id : '';
  }

  getCentrosActividades(id: any) {
    const actividad = this.actividades.find((actividad) => actividad.id === id);
    const centro = this.centros.find((centro) => centro.id === actividad?.centcivicos_id);
    return centro ? centro.nombre : '';
  }

  nuevaInscripcion() {
    this.router.navigate(['/inscripcion/new']);
  }

  cancelarInscripcion(id: number) {
    this.inscripcionService.cancelarInscripcion(id).subscribe({
      next: () => {
        console.log('Inscripción cancelada');
        this.getInscripciones();
      },
      error: (error) => {
        console.error('Error cancelando inscripción', error);
      },
    });
  }
}
