import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { Actividades } from '../../models/actividades';
import { Router } from '@angular/router';
import { ActividadesService } from '../../services/actividades/actividades.service';

@Component({
  selector: 'app-actividades',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './actividades.component.html',
  styleUrl: './actividades.component.css'
})
export class ActividadesComponent implements OnInit {

  actividades: Actividades[] = [];

  constructor(private actividadesService: ActividadesService, private router: Router) {}

  ngOnInit(): void {
    this.getActividades();
  }

  getActividades() {
    this.actividadesService.getActividades().subscribe({
      next: (result: Actividades[]) => {
        console.log('Datos obtenidos', result);
        this.actividades = result;
      },
      error: (error) => {
        console.log('Error obteniendo datos', error);
      },
    });
  }
}
