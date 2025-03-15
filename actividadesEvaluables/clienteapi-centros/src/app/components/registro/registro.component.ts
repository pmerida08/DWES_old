import { Component, OnInit } from '@angular/core';
import { UsuarioService } from '../../services/usuario/usuario.service';
import { Usuario } from '../../models/usuario';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-registro',
  standalone: true,
  imports: [FormsModule, CommonModule],
  templateUrl: './registro.component.html',
  styleUrl: './registro.component.css',
})
export class RegistroComponent implements OnInit {
  usuario: Usuario = { id: 1, nombre: '', email: '', password: '' };
  confirmPassword: string = ''; // Campo para "Repetir Contraseña"

  constructor(private usuarioService: UsuarioService, private router: Router) {}

  ngOnInit(): void {
    let token = localStorage.getItem('jwt');
    if (token) {
      this.router.navigate(['/login']);
    }
  }

  onSubmit() {
    if (this.usuario.password !== this.confirmPassword) {
      alert('Las contraseñas no coinciden. Por favor, intente nuevamente.');
      return;
    }

    if (this.usuario.nombre === '' || this.usuario.email === '' || this.usuario.password === '') {
      alert('Por favor, complete todos los campos.');
      return;
    }

    console.log('Agregando usuario', this.usuario);
    this.usuarioService.createUsuario(this.usuario).subscribe(() => {
      this.router.navigate(['navigate']);
    });
  }
}
