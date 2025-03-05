import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { Instalacion } from '../../models/instalacion';
import { InstalacionesService } from '../../services/instalaciones/instalaciones.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-instalaciones',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './instalaciones.component.html',
  styleUrl: './instalaciones.component.css',
})
export class InstalacionesComponent {
  instalaciones: Instalacion[] = [];

  constructor(
    private instalacionesService: InstalacionesService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getInstalaciones();
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

  verInstalacion(id: number) {
    this.router.navigate(['/instalacion', id]);
    console.log('Ver instalacion', id);
  }
}
