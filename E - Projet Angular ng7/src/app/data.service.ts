import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private http: HttpClient) { }

  secondClick(){
    return console.log('clicked');
  }

  getUsers() {
    return this.http.get('https://reqres.in/api/users')
  }
}
