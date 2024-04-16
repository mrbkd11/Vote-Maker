import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/auth.service';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  LogoUrl: string = "assets/images/SJE_black.png";

  signinForm: FormGroup;


  ngOnInit(): void {

  }



  constructor(
    public fb: FormBuilder,
    public authService: AuthService,
    public router: Router
  ) {
    this.signinForm = this.fb.group({
      email: [''],
      password: [''],
    });
  }
  loginUser() {
    this.authService.signIn(this.signinForm.value).subscribe(
      (userProfile) => {
        console.log(userProfile); // add this line
        this.router.navigate(['user-profile', userProfile.id]);
      },
      (error) => {
        console.log(error);
      }
    );
  }


}



