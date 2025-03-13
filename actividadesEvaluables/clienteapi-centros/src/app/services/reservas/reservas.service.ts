import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Reserva } from '../../models/reserva';

@Injectable({
  providedIn: 'root',
})
export class ReservasService {
  private baseUrl = environment.base_url;
  constructor(private http: HttpClient) {}

  getReservas(): Observable<Reserva[]> {
    const token = localStorage.getItem('jwt');
    const user_id = localStorage.getItem('user_id');
    const headers = new HttpHeaders().set('Authorization', 'Bearer ' + token);
    return this.http.get<Reserva[]>(`${this.baseUrl}/reservas/${user_id}`, { headers });
  }

  nuevaReserva(reserva: Reserva): Observable<Reserva> {
    const token = localStorage.getItem('jwt');
    const headers = new HttpHeaders().set('Authorization', 'Bearer ' + token);
    return this.http.post<Reserva>(`${this.baseUrl}/reservas`, reserva, {
      headers,
    });
  }

  cancelarReserva(id: number): Observable<any> {
    const token = localStorage.getItem('jwt');
    const headers = new HttpHeaders().set('Authorization', 'Bearer ' + token);
    return this.http.delete<any>(`${this.baseUrl}/reservas/${id}`, {
      headers,
    });
  }
}
