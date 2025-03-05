import { Component, OnInit } from '@angular/core';
import { UsuarioService } from '../../services/usuario/usuario.service';
import { Usuario } from '../../models/usuario';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-registro',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './registro.component.html',
  styleUrl: './registro.component.css',
})
export class RegistroComponent implements OnInit {
  usuario: Usuario = { id: 1, nombre: '', email: '', password: '' };

  constructor(private usuarioService: UsuarioService, private router: Router) {}

  ngOnInit(): void {
    let token = localStorage.getItem('jwt');
    if (token) {
      this.router.navigate(['/login']);
    }
  }

  onSubmit() {
    console.log('Agregando usuario', this.usuario);
    this.usuarioService.createUsuario(this.usuario).subscribe(() => {
      this.router.navigate(['navigate']);
    });
  }
}
