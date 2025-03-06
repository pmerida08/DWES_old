import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, CommonModule],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})
export class AppComponent {
  title = 'clienteapi-centros';
  isAuthenticated = false;
  
  ngOnInit() {
    this.isLogged();
  }

  logout() {
    localStorage.removeItem('jwt');
    localStorage.removeItem('jwt_expires');
    localStorage.removeItem('user');
    this.isAuthenticated = false;
  }

  isLogged() {
    const jwt = localStorage.getItem('jwt');
    if (jwt) {
      this.isAuthenticated = true;
    }
  }
}
