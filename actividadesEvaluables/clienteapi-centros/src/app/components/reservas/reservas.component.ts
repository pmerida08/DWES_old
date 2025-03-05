import { Component } from '@angular/core';
import { Reserva } from '../../models/reserva';
import { ReservasService } from '../../services/reservas/reservas.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-reservas',
  standalone: true,
  imports: [],
  templateUrl: './reservas.component.html',
  styleUrl: './reservas.component.css'
})
export class ReservasComponent {
  reservas: Reserva[] = [];

  constructor(private reservaService: ReservasService, private router: Router) {}

  ngOnInit(): void {
    this.getReservas();
  }

  getReservas() {
    this.reservaService.getReservas().subscribe({
      next: (result: Reserva[]) => {
        console.log('Datos obtenidos', result);
        this.reservas = result;
      },
      error: (error) => {
        console.log('Error obteniendo datos', error);
      },
    });
  }

  nuevaReserva() {
    this.router.navigate(['/reserva/new']);
  }

  deleteReserva(id: number) {
    this.reservaService.deleteReserva(id).subscribe({
      next: (result: Reserva) => {
        console.log('Reserva eliminada', result);
        this.getReservas();
      },
      error: (error) => {
        console.log('Error eliminando reserva', error);
      },
    });
  }
}
