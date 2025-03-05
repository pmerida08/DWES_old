import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
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

  getActividad(id: number): Observable<Actividades> {
    return this.http.get<Actividades>(`${this.baseUrl}/centros/${id}/actividades`);
  }
}
