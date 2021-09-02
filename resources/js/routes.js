import EmployeesIndex from './components/employees/index'
import EmployeesCreate from './components/employees/create'
import EmployeesEdit from './components/employees/edit'

export const routes = [
    {
        path: '/employees',
        name: 'EmployeesIndex',
        component: EmployeesIndex
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