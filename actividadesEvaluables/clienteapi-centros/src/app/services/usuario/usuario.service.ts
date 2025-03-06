import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Usuario } from '../../models/usuario';
import { catchError, Observable, tap, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class UsuarioService {
  private baseUrl = environment.base_url;

  constructor(private http: HttpClient) {}

  createUsuario(usuario: Usuario) {
    return this.http.post(`${this.baseUrl}/register/`, JSON.stringify(usuario));
  }

  login(usuario: Usuario): Observable<any> {
    return this.http.post<any>(
      `${this.baseUrl}/login/`,
      JSON.stringify(usuario)
    );
  }

  getUsuario(): Observable<any> {
    const headers = this.getAuthHeaders();
    return this.http.get(`${this.baseUrl}/user`, { headers }).pipe(
      tap((response) => {
        console.log('Respuesta del perfil:', response);
      }),
      catchError((error) => {
        console.error('❌ Error en la solicitud del perfil:', error);
        return throwError(
          () => new Error('Error al obtener los datos del perfil')
        );
      })
    );
  }

  editUsuario(usuario: Usuario) {
    const headers = this.getAuthHeaders();
    return this.http.put(`${this.baseUrl}/user`, JSON.stringify(usuario), {
      headers,
    });
  }

  deleteUsuario() {
    const headers = this.getAuthHeaders();
    return this.http.delete(`${this.baseUrl}/user`, { headers });
  }

  private getAuthHeaders(): HttpHeaders {
    const token = localStorage.getItem('jwt');

    if (!token) {
      console.error('❌ No hay token en localStorage');
      return new HttpHeaders();
    }

    console.log('✅ Token encontrado:', token);

    let headers = new HttpHeaders();
    headers = headers.set('Authorization', `Bearer ${token}`);
    headers = headers.set('Content-Type', 'application/json');

    return headers;
  }

  // Método para obtener el token JWT almacenado
  getToken(): string | null {
    return localStorage.getItem('jwt');
  }

  // Método para verificar si el usuario está autenticado
  isAuthenticated(): boolean {
    const token = this.getToken();
    if (token) {
      const decodedToken = this.decodeJwt(token);
      if (decodedToken && decodedToken.exp > Date.now() / 1000) {
        return true;
      }
    }
    return false;
  }

  // Método para decodificar el JWT (si es necesario)
  private decodeJwt(token: string): any {
    const payload = token.split('.')[1];
    return JSON.parse(atob(payload));
  }

  public refreshToken() {
    return this.http.post(`${this.baseUrl}/token/refresh/`, {});
  }
}
