import { Component, OnInit } from '@angular/core';
import { Vote } from '../Vote';
import { VoteService } from 'src/app/vote.service';

@Component({
  selector: 'app-vote-projection',
  templateUrl: './vote-projection.component.html',
  styleUrls: ['./vote-projection.component.css']
})
export class VoteProjectionComponent implements OnInit {
  activeVote: Vote | undefined;
  errorMessage: string = '';
  constructor(private _voteService: VoteService) { }


  ngOnInit(): void {
    this._voteService.getActiveVote().subscribe(
      (response: any) => {
        this.activeVote = response.activevote;
        // start the timer here
      },
      (error: any) => {
        this.errorMessage = error;
        // handle error
      }
    );
  }
}
