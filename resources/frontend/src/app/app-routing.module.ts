import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './components/auth/login/login.component';
import { RegisterComponent } from './components/auth/register/register.component';
import { HomeComponent } from './components/app/home/home.component';
import { AuthGuard } from './guards/auth.guard';
import { CheckAuthGuard } from './guards/check-auth.guard';
import { AppLayoutComponent } from './components/layouts/app-layout/app-layout.component';
import { AuthLayoutComponent } from './components/layouts/auth-layout/auth-layout.component';

const routes: Routes = [
  { path: "", redirectTo: 'home', pathMatch: 'full' },
  {
    path: "",
    canActivate: [ CheckAuthGuard ],
    component: AuthLayoutComponent,
    children: [
      { path: 'login', component: LoginComponent },
      { path: 'register', component: RegisterComponent },
    ]
  },
  {
    path: "",
    canActivate: [ AuthGuard ],
    component: AppLayoutComponent,
    children: [
      { path: 'home', component: HomeComponent },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, { useHash: true })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
