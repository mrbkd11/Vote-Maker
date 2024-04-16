import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Vote } from 'src/app/admin/Vote';
import { AuthService } from 'src/app/auth.service';
import { User } from 'src/app/auth/User';
import { VoteService } from 'src/app/vote.service';

@Component({
  selector: 'app-user-dashboard',
  templateUrl: './user-dashboard.component.html',
  styleUrls: ['./user-dashboard.component.css']
})
export class UserDashboardComponent implements OnInit {

  activeVote: Vote | undefined;
  currentUser: User | undefined;
  constructor(
    public authService: AuthService,
    private actRoute: ActivatedRoute,
    public router: Router
    , private voteservice: VoteService

  ) {
    let id = this.actRoute.snapshot.paramMap.get('id');
    this.authService.getUserProfile(id).subscribe((res) => {
      this.currentUser = res.msg;
    });
  }

  ngOnInit() {
    // Get the current user's data
    console.log(this.currentUser);

    // Get the currently active vote
    this.voteservice.getActiveVote().subscribe(vote => {
      this.activeVote = vote;
    });
  }

  goToSubmitVote() {
    // Navigate to the submit-vote component
    this.router.navigate(['/submit-vote']);
  }
  logout() {
    this.authService.doLogout()
  }

}

