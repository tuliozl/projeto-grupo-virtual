import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { CustomerModel } from '../models/customer.model';

@Injectable({
  providedIn: 'root'
})
export class CustomersService {

  private url = environment.api

  constructor(private httpClient: HttpClient) { }

  getCustomers(){
    return this.httpClient.get<CustomerModel[]>(`${this.url}/customer`)
  }

  createCustomer(customer: any){
    return this.httpClient.post(`${this.url}/customer`,customer)
  }

  updateCustomer(customer: any){
    return this.httpClient.post(`${this.url}/customer/update`,customer)
  }

  removeCustomer(id: any){
    return this.httpClient.get<CustomerModel[]>(`${this.url}/customer/delete/${id}`)
  }
}
