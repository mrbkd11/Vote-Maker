import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { AuthService } from 'src/app/auth.service';
import { User } from 'src/app/auth/User';
import { VoteService } from 'src/app/vote.service';

@Component({
  selector: 'app-submit-vote',
  templateUrl: './submit-vote.component.html',
  styleUrls: ['./submit-vote.component.css']
})
export class SubmitVoteComponent {
  activeVote: boolean = false;
  question: string | undefined;
  selectedChoice: string | undefined;
  currentUser: any = {};

  constructor(private route: ActivatedRoute, private authService: AuthService, private voteService: VoteService, private router: Router) { }

  ngOnInit(): void {
    // this.authService.currentUser.subscribe((user: User) => {
    //   this.currentUser = user;
    // });
    // this.voteService.getActiveVote().subscribe((vote: { id: any; }) => {
    //   this.activeVote = (vote && vote.id);
    // });
  };

  // onSubmit(form: any): void {
  //   let vote = {
  //     choice: this.selectedChoice,
  //   };
  //   this.voteService.submitVote(vote).subscribe(() => {
  //     this.router.navigate(['/user-dashboard']);
  //   });
  // }
}
