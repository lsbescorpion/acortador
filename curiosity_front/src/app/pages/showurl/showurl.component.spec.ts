import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowurlComponent } from './showurl.component';

describe('ShowurlComponent', () => {
  let component: ShowurlComponent;
  let fixture: ComponentFixture<ShowurlComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ShowurlComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ShowurlComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
