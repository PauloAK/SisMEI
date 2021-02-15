import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-app-layout',
  templateUrl: './app-layout.component.html',
  styleUrls: ['./app-layout.component.scss']
})
export class AppLayoutComponent implements OnInit {

  public menu =  [
    {
      title: 'Home',
      icon: 'home-outline',
      link: '/home',
      home: true,
    },
    {
      title: 'Jobs',
      icon: 'settings-2-outline',
      link: '/jobs',
    },
    {
      title: 'Customers',
      icon: 'people-outline',
      link: '/customers',
    }
  ];

  constructor() { }

  ngOnInit(): void {
  }

}
