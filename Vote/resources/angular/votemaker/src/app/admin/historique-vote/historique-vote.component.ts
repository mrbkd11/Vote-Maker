import { Component } from '@angular/core';
import { VoteService } from 'src/app/vote.service';
import { VoteReview } from '../VoteReview';

@Component({
  selector: 'app-historique-vote',
  templateUrl: './historique-vote.component.html',
  styleUrls: ['./historique-vote.component.css']
})
export class HistoriqueVoteComponent {
  voteReviews: VoteReview[] = [];
  constructor(private voteService: VoteService) { }
  ngOnInit(): void {
    this.voteService.getVoteReviews().subscribe(
      (voteReviews: VoteReview[]) => {
        this.voteReviews = voteReviews;
      },
      (error) => {
        console.log(error);
      }
    );
  }
}
