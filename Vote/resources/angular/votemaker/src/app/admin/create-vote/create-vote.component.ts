import { Component, OnInit } from '@angular/core';
import { VoteService } from 'src/app/vote.service';
import { Vote } from '../Vote';
import { Router } from '@angular/router';




@Component({
  selector: 'app-create-vote',
  templateUrl: './create-vote.component.html',
  styleUrls: ['./create-vote.component.css']
})
export class CreateVoteComponent implements OnInit {
  vote: Vote = {
    question: '',
  };

  constructor(private voteService: VoteService, private router: Router) { }
  ngOnInit(): void {
    throw new Error('Method not implemented.');
  }

  onSubmit(): void {
    this.voteService.createVote(this.vote).subscribe(() => {
      // handle success
      this.router.navigate(['/admin/voteprojection']);
    }, (error) => {
      // handle error
    });
  }
}
