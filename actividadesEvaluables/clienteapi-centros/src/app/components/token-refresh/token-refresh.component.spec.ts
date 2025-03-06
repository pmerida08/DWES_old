import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TokenRefreshComponent } from './token-refresh.component';

describe('TokenRefreshComponent', () => {
  let component: TokenRefreshComponent;
  let fixture: ComponentFixture<TokenRefreshComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TokenRefreshComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(TokenRefreshComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
