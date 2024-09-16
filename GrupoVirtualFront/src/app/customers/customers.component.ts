import { Component } from '@angular/core';
import { CustomerModel } from '../models/customer.model';
import { CustomersService } from '../services/customers.service';
import { CommonModule, NgFor } from '@angular/common';
import { Observable } from 'rxjs';
import { FormsModule } from '@angular/forms';


@Component({
  selector: 'app-customers',
  standalone: true,
  imports: [
    NgFor,
    FormsModule,
    CommonModule
  ],
  templateUrl: './customers.component.html',
  styleUrl: './customers.component.css'
})
export class CustomersComponent {

  customers = new Observable<CustomerModel[]>()

  name = ''
  email = ''
  password = ''
  id:any = ''

  constructor(private customerServices: CustomersService){
    this.getCustomers()
  } 

  getCustomers(){
    this.reset()
    this.customers = this.customerServices.getCustomers()
  }

  editCustomer(id:any){
    let self = this
    this.customers
    .subscribe(customers => {
        let customer = customers.filter((c) => c.id == id)[0]
        self.name = customer.name
        self.email = customer.email
        self.password = customer.password
        self.id = customer.id
    })
  }

  removeCustomer(id:any){
    if(confirm("Deseja remover o usuário?")) {
      this.customerServices.removeCustomer(id)
      .subscribe(() => this.getCustomers())
    }
  }

  reset(){
    this.name = ''
    this.email = ''
    this.password = ''
    this.id = ''
  }

  saveCustomer(){
    if(this.id)
      this.customerServices.updateCustomer({id: this.id, name: this.name, email: this.email, password: this.password})
      .subscribe(() => this.getCustomers())
    else
      this.customerServices.createCustomer({name: this.name, email: this.email, password: this.password})
      .subscribe(() => this.getCustomers())

  }


}
