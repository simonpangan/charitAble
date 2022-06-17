<template>
      <div class="py-4">
         <div class="container">
            <div class="row">
               <!-- Main Content -->
               <aside class="col-md-4">
                  <div class="mb-3 border rounded bg-white profile-box text-center w-10">
                     <div class="p-4 d-flex align-items-center">
                        <h6 class="m-0">Create Programs</h6>
                     </div>
                  </div>
                  <div class="border rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Program Header</h6>
                        <p class="mb-0 mt-0 small">Tell about yourself in two sentences.
                        </p>
                     </div>
                     <div class="box-body">
                        <div class="p-3 border-bottom">
                           <div class="form-group mb-4">
                              
                           </div>
                           <div class="form-group mb-0">
                              
                           </div>
                        </div>
                        <div class="overflow-hidden text-center p-3">
                           <a class="font-weight-bold btn btn-light rounded p-3 d-block" href="#"> SAVE </a>
                        </div>
                     </div>
                  </div>
               </aside>
               <main class="col-md-8">
                  <div class="border rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Edit Basic Info</h6>
                        <p class="mb-0 mt-0 small">Lorem ipsum dolor sit amet, consecteturs.
                        </p>
                     </div>
                     <div class="box-body p-3">
                        <form class="js-validate" novalidate="novalidate">
                           <div class="row">
                              <!-- Input -->
                              <div class="col-sm-6 mb-2">
                                 <div class="js-form-message">
                                    <label id="nameLabel" class="form-label">
                                    Program Name
                                    <span class="text-danger">*</span>
                                    </label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="name" value="Gurdeep Osahan" placeholder="Enter your name" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                       <small class="form-text text-muted">Displayed on your public profile, notifications and other places.</small>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Input -->
                              <!-- Input -->
                              <div class="col-sm-6 mb-2">
                                 <div class="js-form-message">
                                    <label id="usernameLabel" class="form-label">
                                    Program Type
                                    <span class="text-danger">*</span>
                                    </label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="username" value="iamosahan" placeholder="Enter your username" aria-label="Enter your username" required="" aria-describedby="usernameLabel" data-msg="Please enter your username." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                 </div>
                              </div>
                              <!-- End Input -->
                           </div>
                          
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                <label class="mb-1">Program Description</label>                                    <span class="text-danger">*</span>
                                    <span class="text-danger">*</span>
                                <div class="position-relative">
                                    <textarea class="form-control" rows="4" name="text" placeholder="Enter Bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor :)</textarea>
                                </div>
                            </div>
                            </div>
                           <div class="row">
                          
                              <div class="col-sm-12 mb-2">
                                 <div class="js-form-message">
                                    <label id="locationLabel" class="form-label">
                                    Location
                                    <span class="text-danger">*</span>
                                    </label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="location" value="Ludhiana, Punjab" placeholder="Enter your location" aria-label="Enter your location" required="" aria-describedby="locationLabel" data-msg="Please enter your location." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                 </div>
                              </div>
                              <!-- End Input -->
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="border rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Goal
                        </h6>
                        <p class="mb-0 mt-0 small">Tell about your work, job, and other experiences.
                        </p>
                     </div>
                     <div class="box-body px-3 pt-3 pb-0">
                        <div class="row">
                           <div class="col-sm-6 mb-4">
                              <label id="FROM" class="form-label">Goal</label>                                    <span class="text-danger">*</span>

                              <!-- Input -->
                              <div class="input-group">
                                 <input type="text" class="form-control" placeholder="From" aria-label="FROM" aria-describedby="FROM">
                              </div>
                                 <a class="d-inline-block u-text-muted" href="#">
                            <span class="mr-1">+</span>
                            Add Goal
                        </a>
                              <!-- End Input -->
                           </div>
                           <div class="col-sm-6 mb-4">
                              <label id="TO" class="form-label">Date of Expected Completion</label>

                              <!-- Input -->
                              <div class="input-group">
                                 <input type="text" class="form-control" placeholder="TO" aria-label="TO" aria-describedby="TO">
                              </div>
                              <!-- End Input -->
                           </div>
                        </div>
                     
                     </div>
                  </div>
                  <div class="border rounded bg-white mb-3">
                     <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Program Donation Details</h6>
                        <p class="mb-0 mt-0 small">Lorem ipsum dolor sit amet, consecteturs.
                        </p>
                     </div>
                     <div class="box-body p-3">
                        <form class="js-validate" novalidate="novalidate">
                           <div class="row">
                              <!-- Input -->
                              <div class="col-sm-12 mb-2">
                                 <div class="js-form-message">
                                    <label id="nameLabel" class="form-label">
                                    Total Donation Goal
                                    <span class="text-danger">*</span>
                                    </label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="name" value="Gurdeep Osahan" placeholder="Enter your name" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                       <small class="form-text text-muted">Displayed on your public profile, notifications and other places.</small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                            <div class="col-sm-6 mb-4">
                                <label id="FROM" class="form-label">Add Program Expenses</label>
                                <!-- Input -->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="From" aria-label="FROM" aria-describedby="FROM">
                                </div>
                                    <a class="d-inline-block u-text-muted" href="#">
                                    <span class="mr-1">+</span>
                                    Add Program Expenses
                                    </a>
                                <!-- End Input -->
                            </div>
                           <div class="col-sm-6 mb-4">
                              <label id="TO" class="form-label">Amount</label>
                              <!-- Input -->
                              <div class="input-group">
                                 <input type="text" class="form-control" placeholder="TO" aria-label="TO" aria-describedby="TO">
                              </div>
                              <!-- End Input -->
                           </div>
                        </div>
                        </form>
                     </div>
                  </div>
                  <div class="mb-3 text-right">
                     <a class="font-weight-bold btn btn-link rounded p-3" href="#"> &nbsp;&nbsp;&nbsp;&nbsp; Cancel &nbsp;&nbsp;&nbsp;&nbsp; </a>
                     <a class="font-weight-bold btn btn-primary rounded p-3" href="#"> &nbsp;&nbsp;&nbsp;&nbsp;  Sava Chenges &nbsp;&nbsp;&nbsp;&nbsp; </a>
                  </div>
               </main>
            </div>
         </div>
      </div>
</template>

<script>
export default {

}
</script>

TEll me about yourself
