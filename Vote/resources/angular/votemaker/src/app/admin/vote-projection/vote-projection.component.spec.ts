import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VoteProjectionComponent } from './vote-projection.component';

describe('VoteProjectionComponent', () => {
  let component: VoteProjectionComponent;
  let fixture: ComponentFixture<VoteProjectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ VoteProjectionComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(VoteProjectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
