import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AgregarContactoComponent } from './agregar-contacto.component';

describe('AgregarContactoComponent', () => {
  let component: AgregarContactoComponent;
  let fixture: ComponentFixture<AgregarContactoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AgregarContactoComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(AgregarContactoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
