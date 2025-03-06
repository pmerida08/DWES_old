import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Usuario } from '../../models/usuario';
import { UsuarioService } from '../../services/usuario/usuario.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
})
export class LoginComponent implements OnInit {
  usuario: Usuario = { id: 0, nombre: '', email: '', password: '' };

  constructor(private usuarioService: UsuarioService, private router: Router) {}

  ngOnInit(): void {
    const token = localStorage.getItem('jwt');
    if (token) {
      this.router.navigate(['home']);
    }
  }

  onSubmit() {
    console.log('Iniciando sesión', this.usuario);
    this.usuarioService.login(this.usuario).subscribe({
      next: (response) => {
        // console.log('Token recibido:', response.token);
        localStorage.setItem('jwt', response.token);

        this.usuarioService.getUsuario().subscribe({
          next: (userData) => {
            console.log('Datos del usuario:', userData);
            // localStorage.setItem('userId', userData.id);
            // localStorage.setItem('userName', userData.nombre);
          },
          error: (error) => {
            console.error('❌ Error al obtener los datos del usuario:', error);
          },
        });

        this.router.navigate(['home']);
      },
      error: (error) => {
        console.error('❌ Error en la solicitud de inicio de sesión:', error);
      },
    });
  }
}
