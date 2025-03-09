import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Inscripcion } from '../../models/inscripcion';
import { InscripcionesService } from '../../services/inscripciones/inscripciones.service';
import { ActividadesService } from '../../services/actividades/actividades.service';
import { Router } from '@angular/router';
import { Actividades } from '../../models/actividades';

@Component({
  selector: 'app-nueva-inscripcion',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './nueva-inscripcion.component.html',
  styleUrl: './nueva-inscripcion.component.css'
})
export class NuevaInscripcionComponent implements OnInit {

  inscripcion: Inscripcion = {
    id: 0,
    nom_solicitante: '',
    telefono: 0,
    correo: '',
    actividades_id: 0,
    fecha_incripcion: '',
    estado: 'pendiente'
  };

  actividades: Actividades[] = [];

  constructor(
    private inscripcionService: InscripcionesService,
    private actividadesService: ActividadesService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getActividades();
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

  onSubmit() {
    this.inscripcionService.nuevaInscripcion(this.inscripcion).subscribe({
      next: (result: Inscripcion) => {
        console.log('Inscripción realizada', result);
        this.router.navigate(['/inscripciones']);
      },
      error: (error) => {
        console.error('Error realizando inscripción', error);
      },
    });
  }
}
