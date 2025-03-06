import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ActividadesCentroCivComponent } from './actividades-centro-civ.component';

describe('ActividadesCentroCivComponent', () => {
  let component: ActividadesCentroCivComponent;
  let fixture: ComponentFixture<ActividadesCentroCivComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ActividadesCentroCivComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ActividadesCentroCivComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
