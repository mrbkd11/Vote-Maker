import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CreateVoteComponent } from './admin/create-vote/create-vote.component';
import { SideBarComponent } from './admin/side-bar/side-bar.component';
import { VoteProjectionComponent } from './admin/vote-projection/vote-projection.component';
import { HistoriqueVoteComponent } from './admin/historique-vote/historique-vote.component';
import { LoginComponent } from './auth/login/login.component';
import { RegisterComponent } from './auth/register/register.component';
import { UserDashboardComponent } from './user/user-dashboard/user-dashboard.component';
import { AuthGuard } from './auth.guard';
import { SubmitVoteComponent } from './user/submit-vote/submit-vote.component';

const routes: Routes = [
  { path: 'admin/createvote', component: CreateVoteComponent },
  { path: 'admin/dashboard', component: SideBarComponent },
  { path: 'admin/voteprojection', component: VoteProjectionComponent },
  { path: 'admin/historique', component: HistoriqueVoteComponent },
  { path: 'login', component: LoginComponent },
  { path: 'Registration', component: RegisterComponent },
  { path: 'user-profile/:id', component: UserDashboardComponent, canActivate: [AuthGuard] },
  { path: 'submit-vote', component: SubmitVoteComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
