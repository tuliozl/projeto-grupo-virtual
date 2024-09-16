import { Routes } from '@angular/router';
import { CustomersComponent } from './customers/customers.component';
import { HomeComponent } from './home/home.component';
import { CompaniesComponent } from './companies/companies.component';

export const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'customers', component: CustomersComponent},
    {path: 'companies', component: CompaniesComponent},
];
