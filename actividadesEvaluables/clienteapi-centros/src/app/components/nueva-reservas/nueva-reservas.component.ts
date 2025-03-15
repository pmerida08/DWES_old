import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Reserva } from '../../models/reserva';
import { ReservasService } from '../../services/reservas/reservas.service';
import { InstalacionesService } from '../../services/instalaciones/instalaciones.service';
import { Router } from '@angular/router';
import { Instalacion } from '../../models/instalacion';
import { CentroCivico } from '../../models/centroCivico';
import { CentrosService } from '../../services/centros/centros.service';

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
  centros: CentroCivico[] = [];

  constructor(
    private reservaService: ReservasService,
    private instalacionesService: InstalacionesService,
    private centroService: CentrosService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getInstalaciones();
    this.getCentros();
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

  getCentrosById(id: number): string {
    const centro = this.centros.find((centro) => centro.id === id);
    return centro ? centro.nombre : 'Centro no disponible';
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
