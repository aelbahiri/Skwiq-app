import { TokenPayload, AuthenticationService } from './../../authentication.service';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

  credentials: TokenPayload = {
    id: '',
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  }

  constructor(private auth: AuthenticationService, private router: Router) { }

  register() {
    this.auth.register(this.credentials).subscribe(
      () => {
        this.router.navigateByUrl('/profile')
      },
      err => {
        console.error(err)
      }
    )
    
  }

  ngOnInit(): void {
  }

}
