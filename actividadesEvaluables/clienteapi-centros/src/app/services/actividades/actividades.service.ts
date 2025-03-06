import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { map, Observable } from 'rxjs';
import { Actividades } from '../../models/actividades';

@Injectable({
  providedIn: 'root',
})
export class ActividadesService {
  private baseUrl = environment.base_url;
  constructor(private http: HttpClient) {}

  getActividades(): Observable<Actividades[]> {
    return this.http.get<Actividades[]>(`${this.baseUrl}/actividades`);
  }
  getActividad(centroId: number): Observable<Actividades[]> {
    return this.http.get<{ status: string; data: any }>(`${this.baseUrl}/centros/${centroId}/actividades`)
      .pipe(
        map(response => Array.isArray(response.data) ? response.data : Object.values(response.data))
      );
    
  }
}
