import { TestBed, async, inject } from '@angular/core/testing';

import { AuthGuards } from './auth.guard';

describe('AuthGuards', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [AuthGuards]
    });
  });

  it('should ...', inject([AuthGuards], (guard: AuthGuards) => {
    expect(guard).toBeTruthy();
  }));
});
