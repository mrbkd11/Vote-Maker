import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Vote } from './admin/Vote';
import { VoteReview } from './admin/VoteReview';

@Injectable({
  providedIn: 'root'
})
export class VoteService {

  constructor(private http: HttpClient) { }



  //creating the vote

  private createApi = 'http://localhost:8000/api/vote';
  private votereviewapi = 'http://localhost:8000/api/historique';

  private apiUrl = 'http://localhost:8000/api/votetimer';
  createVote(voteData: Vote): Observable<any> {
    return this.http.post(this.createApi, voteData);
  }

  //getVote
  getActiveVote(): Observable<Vote> {
    return this.http.get<Vote>(this.apiUrl);
  }
  //showVoteHistory

  getVoteReviews(): Observable<VoteReview[]> {
    return this.http.get<VoteReview[]>(this.votereviewapi);
  }
  submitVote(voteId: number, response: string): Observable<any> {
    const url = `http://localhost:8000/api/result`;
    const body = {
      response: response
    };
    return this.http.post<any>(url, body);
  }
}
