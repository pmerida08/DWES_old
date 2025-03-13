import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Reserva } from '../../models/reserva';
import { ReservasService } from '../../services/reservas/reservas.service';
import { InstalacionesService } from '../../services/instalaciones/instalaciones.service';
import { Router } from '@angular/router';
import { Instalacion } from '../../models/instalacion';

@Component({
  selector: 'app-nueva-reservas',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './nueva-reservas.component.html',
  styleUrl: './nueva-reservas.component.css',
})
export class NuevaReservasComponent implements OnInit {
  reserva: Reserva = {
    id: 0,
    nom_solicitante: '',
    telefono: 0,
    correo: '',
    instalaciones_id: '',
    fechahora_inicio: '',
    fechahora_final: '',
    estado: 'pendiente',
    usuario_id: 0,
  };

  usuario_id = localStorage.getItem('user_id');
  instalaciones: Instalacion[] = [];

  constructor(
    private reservaService: ReservasService,
    private instalacionesService: InstalacionesService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getInstalaciones();
  }

  getInstalaciones() {
    this.instalacionesService.getInstalaciones().subscribe({
      next: (result: Instalacion[]) => {
        console.log('Instalaciones obtenidas', result);
        this.instalaciones = result;
      },
      error: (error) => {
        console.error('Error obteniendo instalaciones', error);
      },
    });
  }

  onSubmit() {
    this.reservaService.nuevaReserva(this.reserva).subscribe({
      next: () => {
        this.router.navigate(['/reservas']);
      },
      error: (error) => {
        console.error('Error realizando reserva', error);
      },
    });
  }
}
