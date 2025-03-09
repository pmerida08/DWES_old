import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { InscripcionesService } from '../../services/inscripciones/inscripciones.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cancelar-inscripcion',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './cancelar-inscripcion.component.html',
  styleUrl: './cancelar-inscripcion.component.css'
})
export class CancelarInscripcionComponent {
  inscripcionId: number | null = null;
  mensaje: string = '';

  constructor(private inscripcionService: InscripcionesService, private router: Router) {}

  cancelarInscripcion() {
    if (this.inscripcionId) {
      this.inscripcionService.cancelarInscripcion(this.inscripcionId).subscribe({
        next: () => {
          this.mensaje = 'Inscripción cancelada exitosamente.';
          setTimeout(() => this.router.navigate(['/inscripciones']), 2000);
        },
        error: (error) => {
          console.error('Error cancelando inscripción', error);
          this.mensaje = 'Error al cancelar la inscripción.';
        }
      });
    } else {
      this.mensaje = 'Por favor, ingrese un ID válido.';
    }
  }
}
