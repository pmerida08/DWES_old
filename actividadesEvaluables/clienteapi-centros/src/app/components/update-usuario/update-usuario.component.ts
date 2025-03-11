import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { UsuarioService } from '../../services/usuario/usuario.service';
import { Usuario } from '../../models/usuario';

@Component({
  selector: 'app-update-usuario',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './update-usuario.component.html',
  styleUrl: './update-usuario.component.css'
})
export class UpdateUsuarioComponent {
  usuario: Usuario = { id: 1, nombre: '', email: '', password: '' };

  constructor(private usuarioService: UsuarioService, private router: Router) {}

  ngOnInit(): void {
    this.getUsuario();
  }

  getUsuario(): void {
    this.usuarioService.getUsuario().subscribe({
      next: (response) => {
        // Assign the response directly, not response.body
        this.usuario = response[0];
        console.log('Usuario data loaded:', this.usuario);
      },
      error: (err) => {
        console.error('Error al obtener los datos del usuario', err);
      }
    });
  }

  editarUsuario(): void {
    this.usuarioService.editUsuario(this.usuario).subscribe({
      next: (response) => {
        console.log('Usuario actualizado:', response);
        this.router.navigate(['/']);
      },
      error: (err) => {
        console.error('Error al actualizar el usuario', err);
      }
    });
  }
}
