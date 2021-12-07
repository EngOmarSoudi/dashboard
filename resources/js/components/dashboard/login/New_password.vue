<template>
  <div class="New_password">
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
                  <div class="form-group sh-password">
                    <label>Password</label>
                    <input :type="passwordFieldType" v-model="password" class="form-control " placeholder="Enter Password" />
                    <label class="sh-password_icon" @click="showPass = !showPass">
                      <img :src="images.show_password" width="22px" @click="show_password" v-show="!showPass" />
                      <img :src="images.hide_password" width="22px" @click="show_password" v-show="showPass" />
                    </label>
                  </div>
                  <div class="form-group sh-password">
                    <label>Password Confirmation</label>
                    <input :type="passwordFieldType2" v-model="password2" class="form-control " placeholder="Enter Password" />
                    <label class="sh-password_icon" @click="showPass2 = !showPass2">
                      <img :src="images.show_password" width="22px" @click="show_password2" v-show="!showPass2" />
                      <img :src="images.hide_password" width="22px" @click="show_password2" v-show="showPass2" />
                    </label>
                  </div>

                  <div class="w-100 text-center">
                    <button type="submit" class="btn btn-login w-50 my-4">
                      Save
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
  name: "Newpassword",
  data() {
    return {
      images: {
        btn_login: "dashboard/imgs/btn_login.svg",
        login_logo: "dashboard/imgs/login_logo.svg",
        show_password: "dashboard/imgs/show_password.svg",
        hide_password: "dashboard/imgs/hide_password.svg",
      },
      password: "",
      password2: "",
      passwordFieldType: "password",
      passwordFieldType2: "password",
      showPass: false,
      showPass2: false,
    };
  },
  methods: {
    show_password() {
      this.passwordFieldType =
        this.passwordFieldType === "password" ? "text" : "password";
    },
    show_password2() {
      this.passwordFieldType2 =
        this.passwordFieldType2 === "password" ? "text" : "password";
    },
  },
};
</script>
