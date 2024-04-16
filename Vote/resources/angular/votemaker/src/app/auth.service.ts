
import { Injectable } from '@angular/core';

import { Observable, of, throwError } from 'rxjs';
import { catchError, map, switchMap } from 'rxjs/operators';
import {
  HttpClient,
  HttpHeaders,
  HttpErrorResponse,
} from '@angular/common/http';
import { Router } from '@angular/router';
import { User } from './auth/User';
import { Userr } from './auth/login/Userr';
@Injectable({
  providedIn: 'root',
})
export class AuthService {
  endpoint: string = 'http://localhost:8000/api';
  headers = new HttpHeaders().set('Content-Type', 'application/json');
  currentUser = {};
  constructor(private http: HttpClient, public router: Router) { }
  // Sign-up
  signUp(user: any): Observable<any> {
    let api = `${this.endpoint}/register`;
    return this.http.post(api, user).pipe(catchError(this.handleError));
  }
  // Sign-in
  // signIn(user: User) {
  //   return this.http
  //     .post<any>(`${this.endpoint}/login`, user)
  //     .subscribe((res: any) => {
  //       localStorage.setItem('access_token', res.token);
  //       this.getUserProfile(res._id).subscribe((res) => {
  //         this.currentUser = res;
  //         this.router.navigate(['user-profile/' + res.msg._id]);
  //       });
  //     });
  // }
  // signIn(user: Userr): Observable<any> {
  //   return this.http.post<any>(`${this.endpoint}/login`, user)
  //     .pipe(
  //       map((res: any) => {
  //         localStorage.setItem('access_token', res.token);
  //         this.getUserProfile(res.user.id).subscribe((res) => {
  //           this.currentUser = res;
  //           this.router.navigate(['admin/dashboard' + res.msg._id]);
  //         });
  //       }),
  //       catchError(this.handleError)
  //     );
  // }
  signIn(user: Userr): Observable<any> {
    return this.http.post<any>(`${this.endpoint}/login`, user).pipe(
      switchMap((res: any) => {
        localStorage.setItem('access_token', res.token);
        return this.getUserProfile(res.user.id).pipe(
          map((userProfile: any) => {
            this.currentUser = userProfile;
            return userProfile;
          })
        );
      }),
      catchError(this.handleError)
    );
  }


  getToken() {
    return localStorage.getItem('access_token');
  }
  get isLoggedIn(): boolean {
    let authToken = localStorage.getItem('access_token');
    return authToken !== null ? true : false;
  }
  doLogout() {
    let removeToken = localStorage.removeItem('access_token');
    if (removeToken == null) {
      this.router.navigate(['login']);
    }
  }
  // User profile
  getUserProfile(id: any): Observable<any> {
    let api = `${this.endpoint}/user/${id}`;
    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${this.getToken()}`
    });
    return this.http.get(api, { headers: headers }).pipe(
      map((res) => {
        return res || {};
      }),
      catchError(this.handleError)
    );
  }
  // getUserProfile(id: any): Observable<any> {
  //   let api = `${this.endpoint}/user/${id}`;
  //   return this.http.get(api, { headers: this.headers }).pipe(
  //     map((res) => {
  //       return res || {};
  //     }),
  //     catchError(this.handleError)
  //   );
  // }
  // Error
  handleError(error: HttpErrorResponse) {
    let msg = '';
    if (error.error instanceof ErrorEvent) {
      // client-side error
      msg = error.error.message;
    } else {
      // server-side error
      msg = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    return throwError(msg);
  }
}
