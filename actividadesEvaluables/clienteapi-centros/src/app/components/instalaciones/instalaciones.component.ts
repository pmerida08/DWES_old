import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Instalacion } from '../../models/instalacion';
import { InstalacionesService } from '../../services/instalaciones/instalaciones.service';
import { Router } from '@angular/router';
import { CentroCivico } from '../../models/centroCivico';
import { CentrosService } from '../../services/centros/centros.service';

@Component({
  selector: 'app-instalaciones',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './instalaciones.component.html',
  styleUrl: './instalaciones.component.css',
})
export class InstalacionesComponent {
  instalaciones: Instalacion[] = [];
  centros: CentroCivico[] = [];

  constructor(
    private instalacionesService: InstalacionesService,
    private centrosService: CentrosService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getInstalaciones();
    this.getCentros();
  }

  getInstalaciones() {
    this.instalacionesService.getInstalaciones().subscribe({
      next: (result: Instalacion[]) => {
        console.log('Datos obtenidos', result);
        this.instalaciones = result;
      },
      error: (error) => {
        console.log('Error obteniendo datos', error);
      },
    });
  }

  getCentros() {
    this.centrosService.getCentros().subscribe({
      next: (result: CentroCivico[]) => {
        console.log('Datos obtenidos', result);
        this.centros = result;
      },
      error: (error) => {
        console.log('Error obteniendo datos', error);
      },
    });
  }

  getCentroById(id: number) {
    const centro = this.centros.find((centro) => centro.id === id);
    return centro?.nombre;
  }

  verInstalacion(id: number) {
    this.router.navigate(['/instalacion', id]);
    console.log('Ver instalacion', id);
  }

  reservarInstalacion(id: number) {
    this.router.navigate(['/reserva/new', id]);
    console.log('Reservar instalacion');
  }
}
