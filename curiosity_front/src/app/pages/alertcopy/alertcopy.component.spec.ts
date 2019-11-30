import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AlertcopyComponent } from './alertcopy.component';

describe('AlertcopyComponent', () => {
  let component: AlertcopyComponent;
  let fixture: ComponentFixture<AlertcopyComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AlertcopyComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AlertcopyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
