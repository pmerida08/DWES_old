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
      this.router.navigate(['/home']);
    }
  }

  onSubmit() {
    console.log('Iniciando sesión', this.usuario);
    this.usuarioService.login(this.usuario).subscribe({
      next: (response) => {

        console.log('Respuesta:', response);
        
        const now = new Date().getTime();
        const expire = now + 3600000;
        localStorage.setItem('jwt_expires', expire.toString());
        localStorage.setItem('jwt', response.jwt);
        localStorage.setItem('user', response.user);
        console.log('jwt: ', response.jwt);
        this.router.navigate(['home']);
      },
      error: (error) => {
        console.error('❌ Error en la solicitud de inicio de sesión:', error);
      },
    });
  }
}
