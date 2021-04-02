import { Component, OnInit } from '@angular/core';
import { DataService } from '../data.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  h1Style: boolean = false;

  users: Object;

  constructor(private data: DataService) { }

  ngOnInit() {
    this.data.getUsers().subscribe(my_data => {
        this.users = my_data;
        console.log("On a remonté les data:")
        console.log(this.users);
      }
    );
  }

  firstClick(){
    if (this.h1Style === false){
      this.h1Style = true;
      console.log('Style is now true');
    } else {
      this.h1Style = false;
      console.log('Style is now false');
    }
  }

  secondClick(){
    this.data.secondClick();
  }
}
