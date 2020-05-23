import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';



@Injectable({
  providedIn: 'root'
})
export class LoginService {

  api = 'localhost:8000/api';

  constructor(private http: HttpClient) { }

  login(model: any) {
    return this.http.post(this.api+"/login",model).pipe(
      map((Response:any)=> {
        const user = Response;
        localStorage.setItem('token',user.token);
      })
    )
  }
}
