import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CancelarInscripcionComponent } from './cancelar-inscripcion.component';

describe('CancelarInscripcionComponent', () => {
  let component: CancelarInscripcionComponent;
  let fixture: ComponentFixture<CancelarInscripcionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CancelarInscripcionComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CancelarInscripcionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
