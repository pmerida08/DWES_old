import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Inscripcion } from '../../models/inscripcion';

@Injectable({
  providedIn: 'root',
})
export class InscripcionesService {
  private baseUrl = environment.base_url;
  constructor(private http: HttpClient) {}

  getInscripciones(): Observable<Inscripcion[]> {
    const token = localStorage.getItem('jwt');
    const user_id = localStorage.getItem('user_id');
    const headers = new HttpHeaders().set('Authorization', 'Bearer ' + token);
    return this.http.get<Inscripcion[]>(`${this.baseUrl}/inscripciones/${user_id}`, {
      headers,
    });
  }

  nuevaInscripcion(inscripcion: Inscripcion): Observable<Inscripcion> {
    const token = localStorage.getItem('jwt');
    const headers = new HttpHeaders().set('Authorization', 'Bearer ' + token);
    return this.http.post<Inscripcion>(
      `${this.baseUrl}/inscripciones`,
      inscripcion,
      { headers }
    );
  }

  cancelarInscripcion(id: number): Observable<any> {
    const token = localStorage.getItem('jwt');
    const headers = new HttpHeaders().set('Authorization', 'Bearer ' + token);
    return this.http.delete<void>(`${this.baseUrl}/inscripciones/${id}`, {
      headers,
    });
  }
}
