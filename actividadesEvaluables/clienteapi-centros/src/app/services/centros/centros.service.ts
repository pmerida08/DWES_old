import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { CentroCivico } from '../../models/centroCivico';

@Injectable({
  providedIn: 'root'
})
export class CentrosService {
  private baseUrl = environment.base_url;
  constructor(private http: HttpClient) { }

  getCentros(): Observable<CentroCivico[]> {
    return this.http.get<CentroCivico[]>(`${this.baseUrl}/centros`);
  }

  getCentro(id: number): Observable<CentroCivico> {
    return this.http.get<CentroCivico>(`${this.baseUrl}/centros/${id}`);
  }
}
