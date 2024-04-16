import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HistoriqueVoteComponent } from './historique-vote.component';

describe('HistoriqueVoteComponent', () => {
  let component: HistoriqueVoteComponent;
  let fixture: ComponentFixture<HistoriqueVoteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ HistoriqueVoteComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HistoriqueVoteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
