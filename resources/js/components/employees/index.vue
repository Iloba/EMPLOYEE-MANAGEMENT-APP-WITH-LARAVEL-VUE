<template>
   <div class="">
       <h2 class="mb-5">Employees</h2>
       <div class="container ">
           <div v-if="showMessage">
                <div class="alert alert-success"> {{message}} </div>
           </div>
          
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
                                            <router-link :to="{name: 'EmployeesEdit', params: {id: employee.id}}" class="btn btn-info btn-sm">Edit</router-link>
                                            <button class="btn btn-danger btn-sm" @click="deleteEmployee(employee.id)">Delete</button>
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
           employees: [],
           showMessage: false,
           message: ''
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
       },
       deleteEmployee(id){
           axios.delete("/api/employees/" + id)
           .then(res => {
               this.showMessage = true;
               this.message = res.data
              this.getEmployees();
           });
       }
   }
}

</script>

<style>

</style>