import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ReservasService } from '../../services/reservas/reservas.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cancelar-reservas',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './cancelar-reservas.component.html',
  styleUrl: './cancelar-reservas.component.css'
})
export class CancelarReservasComponent {
  reservaId: number | null = null;
  mensaje: string = '';

  constructor(private reservaService: ReservasService, private router: Router) {}

  cancelarReserva() {
    if (this.reservaId) {
      this.reservaService.cancelarReserva(this.reservaId).subscribe({
        next: () => {
          this.mensaje = 'Reserva cancelada exitosamente.';
          setTimeout(() => this.router.navigate(['/reservas']), 2000);
        },
        error: (error) => {
          console.error('Error cancelando reserva', error);
          this.mensaje = 'Error al cancelar la reserva.';
        }
      });
    } else {
      this.mensaje = 'Por favor, ingrese un ID válido.';
    }
  }
}
