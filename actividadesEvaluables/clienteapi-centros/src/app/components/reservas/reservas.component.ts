import { Component } from '@angular/core';
import { Reserva } from '../../models/reserva';
import { ReservasService } from '../../services/reservas/reservas.service';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';
import { InstalacionesService } from '../../services/instalaciones/instalaciones.service';
import { CentrosService } from '../../services/centros/centros.service';
import { Instalacion } from '../../models/instalacion';
import { CentroCivico } from '../../models/centroCivico';

@Component({
  selector: 'app-reservas',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './reservas.component.html',
  styleUrl: './reservas.component.css',
})
export class ReservasComponent {
  reservas: Reserva[] = [];
  centros: CentroCivico[] = [];
  instalaciones: Instalacion[] = [];

  constructor(
    private reservaService: ReservasService,
    private instalacionesService: InstalacionesService,
    private centroService: CentrosService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getReservas();
    this.getCentros();
    this.getInstalaciones();
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

  getInstalacionesReserva(id: any) {
    const instalacion = this.instalaciones.find(
      (instalacion) => instalacion.id === id
    );
    return instalacion ? instalacion.nombre : '';
  }

  getInstalacionesId(id: any) {
    const instalacion = this.instalaciones.find(
      (instalacion) => instalacion.id === id
    );
    return instalacion ? instalacion.id : '';
  }

  getCentrosInstalaciones(id: any) {
    const instalacion = this.instalaciones.find(
      (instalacion) => instalacion.id === id
    );
    const centro = this.centros.find(
      (centro) => centro.id === instalacion?.centcivicos_id
    );
    return centro ? centro.nombre : '';
  }

  nuevaReserva() {
    this.router.navigate(['/reserva/new']);
  }

  cancelarReserva(id: number) {
    this.reservaService.cancelarReserva(id).subscribe({
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
