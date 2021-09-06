<template>
   <div class="">
       <h2 class="mb-5">Employees</h2>
       <div class="container ">
           <div class="col-md-12">
               <div class="card ">
                   <div class="card-header">
                       <div class="">
                           <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary float-right">Add Employee</router-link>
                       </div>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table">
                               <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Department ID</th>
                                        <th>Edit</th>
                                    </tr>
                               </thead>
                               <tbody>
                                    <tr v-for="employee in employees" :key="employee.id" >
                                        <td>{{employee.id}}</td>
                                        <td>{{employee.lastname}}</td>
                                        <td>{{employee.firstname}}</td>
                                        <td>{{employee.address}}</td>
                                        <td>{{employee.department.name}}</td>
                                        <td>
                                            <router-link :to="{name: 'EmployeesEdit', params: {id: employee.id}}" class="btn btn-info">Edit</router-link>
                                        </td>
                                    </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>   
   </div>
</template>

<script>
export default {
   data(){
       return {
           employees: []
       }
   },
   created(){
       this.getEmployees();
   },
   methods: {
       getEmployees(){
           axios.get("/api/employees")
           .then(res => {
               this.employees = res.data.data;
           }).catch(error => {
               console.log(error)
           })
       }
   }
}

</script>

<style>

</style>