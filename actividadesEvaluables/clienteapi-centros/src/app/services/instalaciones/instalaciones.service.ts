import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Instalacion } from '../../models/instalacion';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class InstalacionesService {
  private baseUrl = environment.base_url;
  constructor(private http: HttpClient) { }

  getInstalaciones(): Observable<Instalacion[]> {
    return this.http.get<Instalacion[]>(`${this.baseUrl}/instalaciones`);
  }

  getInstalacion(id: number): Observable<Instalacion> {
    return this.http.get<Instalacion>(`${this.baseUrl}/centros/${id}/instalaciones`);
  }
}
