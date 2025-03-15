import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Inscripcion } from '../../models/inscripcion';
import { InscripcionesService } from '../../services/inscripciones/inscripciones.service';
import { ActividadesService } from '../../services/actividades/actividades.service';
import { Router } from '@angular/router';
import { Actividades } from '../../models/actividades';
import { CentroCivico } from '../../models/centroCivico';
import { CentrosService } from '../../services/centros/centros.service';

@Component({
  selector: 'app-nueva-inscripcion',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './nueva-inscripcion.component.html',
  styleUrl: './nueva-inscripcion.component.css',
})
export class NuevaInscripcionComponent implements OnInit {
  inscripcion: Inscripcion = {
    id: 0,
    nom_solicitante: '',
    telefono: 0,
    correo: '',
    actividades_id: 0,
    fecha_incripcion: '',
    estado: 'pendiente',
    usuario_id: 0,
  };

  usuario_id = localStorage.getItem('user_id');
  actividades: Actividades[] = [];
  centros: CentroCivico[] = [];

  constructor(
    private inscripcionService: InscripcionesService,
    private actividadesService: ActividadesService,
    private centroService: CentrosService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getActividades();
    this.getCentros();
  }

  getActividades() {
    this.actividadesService.getActividades().subscribe({
      next: (result: Actividades[]) => {
        // console.log('Actividades obtenidas', result);
        this.actividades = result;
      },
      error: (error) => {
        console.error('Error obteniendo actividades', error);
      },
    });
  }

  getCentros() {
    this.centroService.getCentros().subscribe({
      next: (result: CentroCivico[]) => {
        // console.log('Centros obtenidos', result);
        this.centros = result;
      },
      error: (error) => {
        console.error('Error obteniendo centros', error);
      },
    });
  }

  getCentrosById(id: number): string {
    const centro = this.centros.find((centro) => centro.id === id);
    return centro ? centro.nombre : 'Centro no disponible';
  }

  onSubmit() {
    this.inscripcionService.nuevaInscripcion(this.inscripcion).subscribe({
      next: () => {
        this.router.navigate(['/inscripciones']);
      },
      error: (error) => {
        console.error('Error realizando inscripción', error);
      },
    });
  }
}
