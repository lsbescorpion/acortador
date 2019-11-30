import { TestBed, inject } from '@angular/core/testing';

import { UrlsService } from './urls.service';

describe('UrlsService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UrlsService]
    });
  });

  it('should be created', inject([UrlsService], (service: UrlsService) => {
    expect(service).toBeTruthy();
  }));
});
