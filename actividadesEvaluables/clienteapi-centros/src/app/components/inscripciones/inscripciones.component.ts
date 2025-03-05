import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Inscripcion } from '../../models/inscripcion';
import { InscripcionesService } from '../../services/inscripciones/inscripciones.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-inscripciones',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './inscripciones.component.html',
  styleUrl: './inscripciones.component.css'
})
export class InscripcionesComponent {
  inscripciones: Inscripcion[] = [];

  constructor(private inscripcionService: InscripcionesService, private router: Router) {}

  ngOnInit(): void {
    this.getInscripciones();
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

  nuevaInscripcion() {
    this.router.navigate(['/inscripcion']);
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
