import EmployeeIndex from './components/employees/index'
import EmployeeIndex from './components/employees/create'
import EmployeeIndex from './components/employees/edit'

export const routes = [
    {
        path: '/employees',
        name: 'EmployeesIndex',
        component: EmployeeIndex
    },

    {
        path: '/employees/create',
        name: 'EmployeesCreate',
        component: EmployeesCreate
    },
    {
        path: '/employees/:id',
        name: 'EmployeesEdit',
        component: EmployeesEdit
    }
];