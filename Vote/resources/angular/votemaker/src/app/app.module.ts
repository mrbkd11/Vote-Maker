import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';
import { SideBarComponent } from './admin/side-bar/side-bar.component';
import { VoteProjectionComponent } from './admin/vote-projection/vote-projection.component';
import { HistoriqueVoteComponent } from './admin/historique-vote/historique-vote.component';
import { CreateVoteComponent } from './admin/create-vote/create-vote.component';
import { AdminDashboardComponent } from './admin/admin-dashboard/admin-dashboard.component';
import { SubmitVoteComponent } from './user/submit-vote/submit-vote.component';
import { UserDashboardComponent } from './user/user-dashboard/user-dashboard.component';
import { LoginComponent } from './auth/login/login.component';
import { RegisterComponent } from './auth/register/register.component';
import { EmailverificationComponent } from './auth/emailverification/emailverification.component';
@NgModule({
  declarations: [
    AppComponent, AdminDashboardComponent,
    CreateVoteComponent,
    HistoriqueVoteComponent,
    VoteProjectionComponent,
    SideBarComponent, UserDashboardComponent,
    SubmitVoteComponent, LoginComponent,
    RegisterComponent,
    EmailverificationComponent,


  ],
  imports: [
    BrowserModule,
    AppRoutingModule, FormsModule, HttpClientModule, ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
