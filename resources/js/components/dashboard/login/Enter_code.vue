<template>
  <div class="Enter_code">
    <div class="form-login w-100">
      <div class="row no-gutters ">
        <div class="col-md-6  mx-auto p-md-0 p-5 ">
          <div class="row no-gutters">
            <div class="col-md-6 d-md-flex d-none">
              <div class="login_left p-5 d-flex justify-content-center align-items-center">
                <img :src="images.login_logo" width="80%" />
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="login_right py-5 px-4">
                <h3 class="login_right_title mb-3">
                  Welcome Back
                </h3>
                <form>
                  <div class="form-group pb-5">
                    <label>Verification Code </label>
                    <input type="text" class="form-control" placeholder="Enter Verification Code" />
                  </div>

                  <div class="row no-gutters w-100 text-center pb-3">
                    <router-link to="/login" class="col-5 ">
                      <button type="submit" class="w-100 btn btn-login  my-4 ">
                        Previous
                      </button>
                    </router-link>

                    <button type="submit" class="col-5  btn btn-login  my-4 ml-auto">
                      Next
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Entercode",
  data() {
    return {
      images: {
        btn_login: "dashboard/imgs/btn_login.svg",
        login_logo: "dashboard/imgs/login_logo.svg",
      },
    };
  },
};
</script>
