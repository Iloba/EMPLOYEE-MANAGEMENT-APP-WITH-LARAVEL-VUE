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
                      <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-2">
                                                <input type="text" class="form-control" v-model.lazy="search" name="search" id="inlineFormInputGroup" placeholder="Search">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="input-group-text btn btn-info"><i class="fa fa-search"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="department_id" v-model="selectedDepartments">
                                            <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </form>
                        </div>
                        
                        <div class="col-md-6">
                            <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-primary float-right">Add Employee</router-link>
                        </div>
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
           departments: [],
           showMessage: false,
           message: '',
           search: null,
           selectedDepartments: null 
       }
   },
   watch:{
       search(){
           this.getEmployees();
       },
       selectedDepartments(){
           this.getEmployees();
       }
   },
   created(){
       this.getEmployees();
        this.getDepartments();
   },
   methods: {
        getEmployees(){
           axios.get("/api/employees", {
               params:{
                   search: this.search,
                   department_id: this.selectedDepartments
               }
           })
           .then(res => {
               this.employees = res.data.data;
           }).catch(error => {
               console.log(error)
           })
       },
       getDepartments(){
            axios.get("/api/employees/departments")
           .then(res => {
               this.departments = res.data;
           }).catch(error => {
               console.log(error)
           })
       },
       deleteEmployee(id){
           axios.delete("/api/employees/" + id)
           .then(res => {
               //Set Show mesage to true
               this.showMessage = true;

               //Set Message to Response data
               this.message = res.data

               //Display New list of Employyes
              this.getEmployees();
           });
       }
   }
}

</script>

<style>

</style>