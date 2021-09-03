<template>
    <div>
         <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Employee
                        <router-link :to="{name: 'EmployeesIndex'}" class="btn btn-info btn-sm float-right">Back</router-link>
                        

                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="">
                            
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Last Name</label>
    
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="lastname" value="" required autocomplete="country_code" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">First Name</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="firstname" value="" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Middle Name</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="middlename" value="" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Address</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="address" value="" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Department </label>
    
                                <div class="col-md-6">
                                  <select class="form-control" name="department_id" id="">
                                      <option value="">1</option>
                                  </select>
                                   
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Country </label>
                              <div class="col-md-6">
                                    <select class="form-control" name="country_id" id="">
                                        <option value="">1</option>
                                     </select>
                              </div>
                                                
                                   
                                
                            </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">State </label>
    
                                <div class="col-md-6">
                                    <select class="form-control" name="state_id" id="">
                                      <option value="">1</option>
                                  </select>
    
                                   
                                </div>
                            </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">City </label>
    
                                <div class="col-md-6">
                                   <select class="form-control" name="city_id" id="">
                                      <option value="">1</option>
                                  </select>
    
                                   
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Zip Code</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="zip_code" value="" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Birth Date</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="birthdate" value="" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Date Hired</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control" name="date_hired" value="" required autocomplete="name" autofocus>
    
                                   
                                </div>
                            </div>
                           
                           
    
                           

                          
    
                           
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Employee
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

}
</script>

<style>

</style>