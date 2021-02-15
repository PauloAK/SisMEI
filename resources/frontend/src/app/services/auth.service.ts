import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Config } from '../helpers/config';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private config : Config = new Config;
  constructor(
    private http: HttpClient
  ) { }

  login(email: string, password: string): Observable<any> {
    return this.http.post(this.config.getApiUrl() + 'auth/login', {
      email,
      password
    }, httpOptions);
  }

  register(username: string, email: string, password: string): Observable<any> {
    return this.http.post(this.config.getApiUrl() + 'auth/register', {
      username,
      email,
      password
    }, httpOptions);
  }
}