import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Inscripcion } from '../../models/inscripcion';

@Injectable({
  providedIn: 'root',
})
export class InscripcionesService {
  private baseUrl = environment.base_url;
  constructor(private http: HttpClient) {}

  getInscripciones(): Observable<Inscripcion[]> {
    return this.http.get<Inscripcion[]>(`${this.baseUrl}/inscripciones`);
  }

  nuevaInscripcion(inscripcion: Inscripcion): Observable<Inscripcion> {
    return this.http.post<Inscripcion>(
      `${this.baseUrl}/inscripciones`,
      inscripcion
    );
  }

  cancelarInscripcion(id: number): Observable<void> {
    return this.http.delete<void>(`${this.baseUrl}/inscripciones/${id}`);
  }
}
