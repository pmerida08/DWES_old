import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { Usuario } from '../../models/usuario';
import { UsuarioService } from '../../services/usuario/usuario.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-usuario',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './usuario.component.html',
  styleUrls: ['./usuario.component.css'],  // Ajusta el nombre del archivo CSS
})
export class UsuarioComponent implements OnInit {
  usuario: Usuario = { id: 1, nombre: '', email: '', password: '' };
  loading: boolean = true; // Para mostrar un indicador de carga

  constructor(private usuarioService: UsuarioService, private router: Router) {}

  ngOnInit(): void {
    this.getUsuario();  // Llamamos a la función en el ciclo de vida ngOnInit
  }

  // Función que obtiene el usuario desde el servicio
  getUsuario(): void {
    this.usuarioService.getUsuario().subscribe({
      next: (response) => {
        // Suponiendo que el usuario viene en response.body, ajusta si es diferente
        this.usuario = response.body;  
        this.loading = false;  // Desactivar el indicador de carga cuando los datos estén listos
      },
      error: (err) => {
        console.error('Error al obtener los datos del usuario', err);
        this.loading = false;  // También desactivamos el indicador de carga en caso de error
        // Aquí podrías redirigir a una página de error o mostrar un mensaje
        this.router.navigate(['/error']);  // Redirigir a una página de error si lo deseas
      }
    });
  }

  tokenRefresh() {
    this.usuarioService.refreshToken().subscribe({
      next: (response) => {
        console.log('Token actualizado:', response);
        // localStorage.setItem('jwt', response);
      },
      error: (error) => {
        console.error('❌ Error al renovar el token:', error);
      },
    });
  }
}
