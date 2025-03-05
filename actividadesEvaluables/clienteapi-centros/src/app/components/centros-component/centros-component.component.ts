import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { CentroCivico } from '../../models/centroCivico';
import { CentrosService } from '../../services/centros/centros.service';

@Component({
  selector: 'app-centros-component',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './centros-component.component.html',
  styleUrl: './centros-component.component.css',
})
export class CentrosComponent implements OnInit {
  centros: CentroCivico[] = [];

  constructor(private centroService: CentrosService, private router: Router) {}

  ngOnInit(): void {
    this.getCentros();
  }

  getCentros() {
    this.centroService.getCentros().subscribe({
      next: (result: CentroCivico[]) => {
        console.log('Datos obtenidos', result);
        this.centros = result;
      },
      error: (error) => {
        console.log('Error obteniendo datos', error);
      },
    });
  }

  verCentro(id: number) {
    this.router.navigate(['/centro', id]);
    console.log('Ver centro', id);
  }
}
