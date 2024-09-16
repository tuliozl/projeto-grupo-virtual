import { CommonModule, NgFor } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Observable } from 'rxjs';
import { CompanyModel } from '../models/company.model';
import { CompaniesService } from '../services/companies.service';

@Component({
  selector: 'app-companies',
  standalone: true,
  imports: [
    NgFor,
    FormsModule,
    CommonModule
  ],
  templateUrl: './companies.component.html',
  styleUrl: './companies.component.css'
})
export class CompaniesComponent {

  companies = new Observable<CompanyModel[]>()

  name = ''
  cnpj = ''
  image = ''
  created_at = ''
  newImage:any = ''
  id:any = ''

  printView = false

  constructor(private companyService: CompaniesService){
    this.getCompanies()
  }

  getCompanies(){
    this.companies = this.companyService.getCompanies()
  }

  editCompany(id:any){
    let self = this
    this.companies
    .subscribe(companies => {
        let company = companies.filter((c) => c.id == id)[0]
        self.name = company.name
        self.cnpj = company.cnpj
        self.image = company.image
        self.id = company.id
    })
  }

  viewCompany(object:any){
    this.name = object.name
    this.cnpj = object.cnpj
    this.image = object.image
    this.created_at = object.created_at
    this.printView = true
  }

  exitPrintView(){
    this.name = ''
    this.cnpj = ''
    this.image = ''
    this.created_at = ''
    this.printView = false
  }

  savecompany(){
    if(this.id)
      this.companyService.createCompany({id: this.id, name: this.name, cnpj: this.cnpj, image: this.newImage ? this.newImage : this.image})
      .subscribe(() => this.getCompanies())
    else
      this.companyService.updateCompany({name: this.name, cnpj: this.cnpj, image: this.newImage ? this.newImage : this.image})
      .subscribe(() => this.getCompanies())
  }

  checkCnpj(){
    let self = this
    this.companyService.checkCnpj(this.cnpj)
    .subscribe(data => {
      if(data.length && !self.id){
        self.cnpj = ''
        alert('O CNPJ informado já está cadastrado!')
      }
    })

  }
  reset(){
    this.name = ''
    this.cnpj = ''
    this.image = ''
    this.newImage = ''
    this.id = ''
  }

  onFileSelected(event:any) {

    const file:File = event.target.files[0];
    this.newImage = file
  }

  removeCompany(id:any){
    if(confirm("Deseja remover a empresa?")) {
      this.companyService.removeCompany(id)
      .subscribe(() => this.getCompanies())
    }
  }

  exportData(){
    this.companyService.exportData()
  }

}
