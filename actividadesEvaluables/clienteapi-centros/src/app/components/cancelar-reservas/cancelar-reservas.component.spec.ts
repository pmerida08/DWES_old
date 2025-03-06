import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CancelarReservasComponent } from './cancelar-reservas.component';

describe('CancelarReservasComponent', () => {
  let component: CancelarReservasComponent;
  let fixture: ComponentFixture<CancelarReservasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CancelarReservasComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CancelarReservasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
