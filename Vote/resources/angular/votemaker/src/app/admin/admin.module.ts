import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AdminDashboardComponent } from './admin-dashboard/admin-dashboard.component';
import { CreateVoteComponent } from './create-vote/create-vote.component';
import { HistoriqueVoteComponent } from './historique-vote/historique-vote.component';
import { VoteProjectionComponent } from './vote-projection/vote-projection.component';
import { SideBarComponent } from './side-bar/side-bar.component';
import { FormsModule } from '@angular/forms';


@NgModule({
  declarations: [
    AdminDashboardComponent,
    CreateVoteComponent,

    ,
    SideBarComponent
  ],
  imports: [
    CommonModule, FormsModule
  ], exports: [CreateVoteComponent]
})
export class AdminModule { }
