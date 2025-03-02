import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Contacto } from '../models/contacto';

@Injectable({
  providedIn: 'root',
})
export class ContactoService {
  apiURL = environment.apiURL;
  constructor(private http: HttpClient) {}

  getContactos(): Observable<Contacto[]> {
    return this.http.get<Contacto[]>(`${this.apiURL}/contactos/`);
  }

  addContacto(contacto: Contacto) {
    return this.http.post(`${this.apiURL}/contactos/`, contacto);
  }

  deleteContacto(id: number) {
    return this.http.delete(`${this.apiURL}/contactos/${id}`);
  }
}
