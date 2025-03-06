import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InstalacionCentroCivComponent } from './instalacion-centro-civ.component';

describe('InstalacionCentroCivComponent', () => {
  let component: InstalacionCentroCivComponent;
  let fixture: ComponentFixture<InstalacionCentroCivComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [InstalacionCentroCivComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(InstalacionCentroCivComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
