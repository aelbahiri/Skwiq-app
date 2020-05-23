import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SignupService {

  api = 'localhost:8000/api';

  constructor( private http: HttpClient) { }

  register(model: any){
    /* let headers = new HttpHeaders({}) */
    return this.http.post(this.api+"/register",model);
  }
}
