import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NuevaReservasComponent } from './nueva-reservas.component';

describe('NuevaReservasComponent', () => {
  let component: NuevaReservasComponent;
  let fixture: ComponentFixture<NuevaReservasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NuevaReservasComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(NuevaReservasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
