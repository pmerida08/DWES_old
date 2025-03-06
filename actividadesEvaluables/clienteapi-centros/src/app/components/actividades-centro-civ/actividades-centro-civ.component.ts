import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Actividades } from '../../models/actividades';
import { ActividadesService } from '../../services/actividades/actividades.service';

@Component({
  selector: 'app-actividades-centro-civ',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './actividades-centro-civ.component.html',
  styleUrl: './actividades-centro-civ.component.css',
})
export class ActividadesCentroCivComponent implements OnInit {
  actividades: Actividades[] = [];
  centroId: number = 0;

  constructor(
    private route: ActivatedRoute, // ✅ Para obtener la URL
    private actividadesService: ActividadesService
  ) {}

  ngOnInit(): void {
    // 📌 Obtener el centroId de la URL
    this.route.paramMap.subscribe((params) => {
      const id = params.get('centroId');
      if (id) {
        this.centroId = +id; // Convertir a número
        this.getActividad(); // Llamar a la API con el centroId
      }
    });
  }

  getActividad() {
    this.actividadesService.getActividad(this.centroId).subscribe({
      next: (result: Actividades[]) => {
        console.log('📌 Datos obtenidos:', result);
        this.actividades = result;
      },
      error: (error) => {
        console.error('❌ Error obteniendo datos', error);
      },
    });
  }
}
