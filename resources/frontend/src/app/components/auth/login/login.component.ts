import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { SnotifyService } from 'ng-snotify';
import { TokenService } from 'src/app/services/token.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  form: any = {
    email: null,
    password: null
  };

  constructor(
    private auth: AuthService,
    private token: TokenService,
    private notify: SnotifyService,
    private router: Router
  ) { }

  ngOnInit(): void {
  }

  public onSubmit() {
    this.auth.login(this.form.email, this.form.password).subscribe( (response) => {
      this.notify.success("Signed in successfully");
      this.token.saveToken(response.access_token);
      this.router.navigateByUrl('/home');
    }, (error) => {
      if (error.status == 401) {
        this.notify.error("Password or email incorrect");
      } else {
        this.notify.error("Error during authentication");
      }
    })
  }

}
