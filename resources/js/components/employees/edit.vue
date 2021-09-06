<template>
    <div>
         <div class="container">
            <div v-if="showMessage">
                <div class="alert alert-success">
                    {{message}}
                </div>
            </div>
        <div class="row justify-content-center">
          
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update Employee
                        <router-link :to="{name: 'EmployeesIndex'}" class="btn btn-info btn-sm float-right">Back</router-link>
                        

                    </div>
    
                    <div class="card-body">
                        <form @submit.prevent="updateEmployee">
                            
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right" >Last Name</label>
    
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="lastname" v-model="form.last_name"  required autocomplete="country_code" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">First Name</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="firstname"  v-model="form.first_name" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Middle Name</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="middlename" value="" v-model="form.middle_name" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Address</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="address" value="" v-model="form.address" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                            
                             <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Country </label>
                              <div class="col-md-6">
                                    <select class="form-control" name="country_id" id="" v-model="form.country_id" @change="getStates()">
                                        <option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
                                     </select>
                              </div>

                            </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">State </label>
    
                                <div class="col-md-6">
                                    <select class="form-control" name="state_id"  v-model="form.state_id" @change="getCities()">
                                      <option v-for="state in states" :key="state.id" :value="state.id" >{{state.name}}</option>
                                  </select>
    
                                   
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">City </label>
    
                                <div class="col-md-6">
                                   <select class="form-control" name="city_id" v-model="form.city_id">
                                      <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
                                  </select>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Department </label>
    
                                <div class="col-md-6">
                                  <select class="form-control" name="department_id" v-model="form.department_id">
                                      <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
                                  </select>
                                   
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Zip Code</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="zipcode" v-model="form.zip_code"  required autofocus>
    
                                   
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Birth Date</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="birthdate" v-model="form.birthdate" value="" required autofocus>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Date Hired</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="date_hired" v-model="form.date_hired" value="" required autofocus>
    
                                   
                                </div>
                            </div>
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update {{form.last_name}}
                                    </button>
                                </div>
                            </div>
                        </form>
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
            cities: [],
            message: '',
            showMessage: false,
            
            form:{
                last_name: '',
                first_name: '',
                middle_name: '',
                address: '',
                country_id: '',
                state_id: '',
                department_id: '',
                city_id: '',
                zip_code: '',
                birthdate: '',
                date_hired: ''
            }
        };
    },
    created(){
        this.getCountries(),
        this.getDepartments(),
        this.getEmployee()
    },
    methods:{
        getEmployee(){
             axios.get("/api/employees/" + this.$route.params.id)
            .then(res => {
                this.form = res.data.data;
                this.getStates();
                this.getCities();
            }).catch(error => {
                console.log(console.error);
            });
        },
        getCountries(){
            axios.get("/api/employees/countries")
            .then(res => {
                this.countries = res.data;
            }).catch(error => {
                console.log(console.error);
            });
        },
        getStates(){
             axios.get("/api/employees/"+ this.form.country_id + "/states")
            .then(res => {
                this.states = res.data;
            }).catch(error => {
                console.log(console.error);
            });
        },
         getCities(){
             axios.get("/api/employees/"+ this.form.state_id + "/cities")
            .then(res => {
                this.cities = res.data;
            }).catch(error => {
                console.log(console.error);
            });
        },
        getDepartments(){
            axios.get("/api/employees/departments")
            .then(res => {
                this.departments = res.data;
            }).catch(error => {
               console.log(console.error); 
            });
        },
        updateEmployee(){
            axios.put("/api/employees/" + this.$route.params.id, {
                 'lastname': this.form.last_name,
                'firstname': this.form.first_name,
                'middlename': this.form.middle_name,
                'address': this.form.address,
                'country_id': this.form.country_id,
                'state_id': this.form.state_id,
                'city_id': this.form.city_id,
                'department_id': this.form.department_id,
                'birthdate': this.form.birthdate,
                'date_hired': this.form.date_hired,
                'zipcode': this.form.zip_code,
            }).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.$router.push({'name': 'EmployeesIndex'});
            }).catch(error => {
                console.log(console.error);
            });
        }
    } 
}

</script>

<style>

</style>