import { ChangeDetectorRef, Component } from '@angular/core';

@Component({
  selector: 'app-list-contacto',
  standalone: true,
  imports: [],
  templateUrl: './list-contacto.component.html',
  styleUrl: './list-contacto.component.css',
})
export class ListContactoComponent {
  public contactos: any[] = [];

  constructor(
    private contactosService: ContactoService,
    private dialogo: MatDialog,
    private snackBar: MatSnackBar,
    private cdr: ChangeDetectorRef
  ) {}

  ngOnInit(): void {
    this.obtenerContactos();
  }
}
