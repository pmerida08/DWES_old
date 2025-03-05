import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'clienteapi-centros';
  isAuthenticaded = false;

  logout() {
    localStorage.removeItem('jwt');
    localStorage.removeItem('jwt_expires');
    localStorage.removeItem('user');
    this.isAuthenticaded = false;

  }
}
