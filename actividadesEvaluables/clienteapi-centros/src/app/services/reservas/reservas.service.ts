import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Reserva } from '../../models/reserva';

@Injectable({
  providedIn: 'root'
})
export class ReservasService {
  private baseUrl = environment.base_url;
  constructor(private http: HttpClient) { }

  getReservas(): Observable<Reserva[]> {
    return this.http.get<Reserva[]>(`${this.baseUrl}/reservas`);
  }

  nuevaReserva(reserva: Reserva): Observable<Reserva> {
    return this.http.post<Reserva>(`${this.baseUrl}/reservas`, reserva);
  }

  deleteReserva(id: number): Observable<Reserva> {
    return this.http.delete<Reserva>(`${this.baseUrl}/reservas/${id}`);
  }
}
