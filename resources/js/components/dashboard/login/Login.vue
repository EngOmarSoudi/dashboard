<template>
  <div class="login">
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
              <div class="login_right py-5 px-4 h-100 d-flex justify-content-center align-items-center">
                 <div class="d-block w-100">
                      <h3 class="login_right_title mb-3 text-center">
                  Welcome Back
                </h3>
                <form @submit.prevent="login">
                  <div class="form-group ">
                    <label>Email </label>
                    <input type="email" name="email" v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Enter email" />
                    <span v-if="errors.email" class="error">{{ errors.email[0] }}</span>
                  </div>
                  <div class="form-group sh-password">
                    <label>Password</label>
                    <input :type="passwordFieldType" v-model="form.password" name="password" class="form-control " :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Enter Password" />
                    <label class="sh-password_icon" @click="showPass = !showPass">
                      <img :src="images.show_password" width="22px" @click="show_password" v-show="!showPass" />
                      <img :src="images.hide_password" width="22px" @click="show_password" v-show="showPass" />
                    </label>
                  </div>
                  <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>
                  <div class="forget_password text-center">
                    <router-link to="/enter_email">
                      <a>Forget Your Password?</a>
                    </router-link>
                  </div>
                  <div class="w-100 text-center">
                    <button type="submit" class="btn btn-login w-50 my-4">
                      <img class="mr-2" :src="images.btn_login" />
                      Login
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: {
        btn_login: "dashboard/imgs/btn_login.svg",
        login_logo: "dashboard/imgs/login_logo.png",
        show_password: "dashboard/imgs/show_password.svg",
        hide_password: "dashboard/imgs/hide_password.svg",
      },
      errors: [],
      password: "",
      passwordFieldType: "password",
      showPass: false,
      form: new Form({
        email: "",
        password: "",
      }),
    };
  },
  methods: {
    show_password() {
      this.passwordFieldType =
        this.passwordFieldType === "password" ? "text" : "password";
    },
    login() {

      let formData = new FormData();
      formData.append("email", this.form.email);
      formData.append("password", this.form.password);

      axios
        .post("auth/login", formData)
        .then((res) => {
          this.errors = [];

          Toast.fire({
            icon: "success",
            title: "Signed in successfully",
          });
            this.$router.push({ path: "/admin" });
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          Toast.fire({
            icon: "error",
            title: "Email or password is not correct",
          });
        });
    },
  },
};
</script>
