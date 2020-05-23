import { TokenPayload, AuthenticationService } from './../../authentication.service';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators, FormGroup } from '@angular/forms';
import { LoginService } from '../../services/login.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  
  credentials: TokenPayload = {
    id: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    
  }

  constructor( private auth: AuthenticationService, private router: Router) { }

  login() {
    this.auth.login(this.credentials).subscribe(
      () => {
        this.router.navigateByUrl('/profile')
      },
      err => {
        console.error(err)
      }
    )
  }

  ngOnInit(): void {}
 
}
