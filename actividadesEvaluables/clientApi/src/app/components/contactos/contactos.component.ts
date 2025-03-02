import { Component, OnInit } from '@angular/core';
import { Contacto } from '../../models/contacto';
import { ContactoService } from '../../services/contacto.service';

@Component({
  selector: 'app-contactos',
  standalone: true,
  imports: [],
  templateUrl: './contactos.component.html',
  styleUrl: './contactos.component.css',
})
export class ContactosComponent implements OnInit {
  contactos: Contacto[] = [];

  constructor(private contactosService: ContactoService) {}
  ngOnInit(): void {
    this.obtenerContactos();
  }

  obtenerContactos(): void {
    this.contactosService.getContactos().subscribe((data) => {
      this.contactos = data;
    });
  }
}
