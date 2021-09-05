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
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Department ID</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                               </thead>
                               <tbody>
                                    <tr>
                                        <td>Hello</td>
                                        <td>Hello</td>
                                        <td>Hello</td>
                                        <td>Hello</td>
                                        <td>Hello</td>
                                        <td>Hello</td>
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
        return{
            countries: [],
            states: [],
            departments: [],
            cities: []
        };
    },
    created(){
        this.getCountries()
    },
    methods:{
        getCountries(){
            axios.get("/api/employees/countries")
            .then(res => {
                this.countries = res.data;
            }).catch(error => {
                console.log(console.error);
            });
        }
    } 
}

</script>

<style>

</style>