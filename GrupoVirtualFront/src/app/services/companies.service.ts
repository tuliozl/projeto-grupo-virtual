import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { CompanyModel } from '../models/company.model';

@Injectable({
  providedIn: 'root'
})
export class CompaniesService {

  private url = environment.api

  constructor(private httpClient: HttpClient) { }

  getCompanies(){
    return this.httpClient.get<CompanyModel[]>(`${this.url}/company`)
  }

  checkCnpj(cnpj:string){
    return this.httpClient.get<CompanyModel[]>(`${this.url}/company/check-cnpj/${cnpj}`)
  }

  createCompany(company: any){
    return this.httpClient.post(`${this.url}/company`,company)
  }

  updateCompany(company: any){
    return this.httpClient.post(`${this.url}/company/update`,company)
  }

  removeCompany(id: any){
    return this.httpClient.get<CompanyModel[]>(`${this.url}/company/delete/${id}`)
  }

  exportData(){
    window.location.href = `${this.url}/company/export`
  }

}
