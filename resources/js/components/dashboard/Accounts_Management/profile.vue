<template>
  <div>
    <div class="row no-gutters">
      <div class="col-3  pr-5">
        <div class="MyNavbar">
          <navbar></navbar>
        </div>
      </div>
      <div class="col-9 p-0">
        <div class="profile">

          <div class="row no-gutters py-5 pr-5 text-left">
            <div class="col-12 ">
              <div class="head-fixed">
                <div class="min-div px-4 py-3">
                  <h4 class="min-div_title mb-0">
                    Profile
                  </h4>
                  <div class="min-div_list_icon  d-flex">

                    <button type="button" class="btn btn-save  mx-2 px-3" data-toggle="modal" data-target="#saveModal">
                      <img :src="images.save" />
                      Save
                    </button>
                  </div>
                </div>
              </div>
              <div class="min-div px-4 py-5 my-5">
                <div class="d-flex">
                  <h5 class="min-div_title mb-0">
                   {{ this.form.first_name}} {{ this.form.last_name }}
                  </h5>
                </div>
                <form v-on:submit.prevent="updateItem" enctype="multipart/form-data">
                  <div class="min-div_list_item mt-4">
                    <div class="row no-no-gutters ">
                      <div class="col-md-4" style=" height: 250px; ">
                        <label class="placeholder" id="preview" :style="{
                                        'background-image': `url(${imgurl ||
                                            getItemImage() })`
                                    }">
                          <input name="image" type="file" class="file-input" :class="{ 'is-invalid': form.errors.has('image') }" @change="upload_image" />

                          <img :src="images.update_file" width="100px" />
                        </label>
                        <span v-if="errors.image" class="error">{{ errors.image[0] }}</span>
                      </div>
                      <div class="col-md-8">
                        <div class="row no-gutters">
                          <div class="form-group col-md-6 px-2">
                            <p class="form-control" style=" border: none ">
                              {{ this.form.email }}
                            </p>
                          </div>
                          <div class="form-group col-md-6 px-2"></div>
                          <div class="form-group col-md-6 px-2">
                            <input v-model="form.first_name" type="text" class="form-control" :class="{
                                                    'is-invalid': form.errors.has(
                                                        'first_name'
                                                    )
                                                }" placeholder="Enter First Name" name="first_name" />
                            <span v-if="errors.first_name" class="error">{{ errors.first_name[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <input v-model="form.last_name" type="text" class="form-control" :class="{
                                                    'is-invalid': form.errors.has(
                                                        'last_name'
                                                    )
                                                }" placeholder="Enter Last Name" name="last_name" />
                            <span v-if="errors.last_name" class="error">{{ errors.last_name[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <input v-model="form.address" type="text" class="form-control" :class="{
                                                    'is-invalid': form.errors.has(
                                                        'address'
                                                    )
                                                }" placeholder="Enter Address" name="address" />
                            <span v-if="errors.address" class="error">{{ errors.address[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <input v-model="form.phone" type="text" class="form-control" :class="{
                                                    'is-invalid': form.errors.has(
                                                        'phone'
                                                    )
                                                }" placeholder="Enter Phone" name="phone" />
                            <span v-if="errors.phone" class="error">{{ errors.phone[0] }}</span>
                          </div>
                          <h6 class="min-div_title mb-0" style="color:#0071C3; cursor: pointer; " data-toggle="modal" data-target="#changeModal">
                            Change Your Password
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Save-->
                  <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="row no-gutters p-3">
                          <div class="col-3 d-flex justify-content-center align-content-center">
                            <img :src="images.save_modal_icon" />
                          </div>
                          <div class="col-9">
                            <div class="modal-body">
                              <h5 class="modal-title" id="saveModalLabel" style="color: #188F58">
                                Save Confirmation
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              Are you sure you want to save?
                            </div>
                          </div>
                          <div class="col-12 py-3  d-flex justify-content-end align-content-center">
                            <button type="button" class="btn btn-back px-3 mx-2 d-flex align-content-center" data-dismiss="modal">
                              <img class="mr-2" :src="images.go_back" />
                              Go Back
                            </button>
                            <a></a>

                            <button type="submit" :disabled="isDisabled" class="btn btn-delete px-3 mx-2 d-flex align-content-center" style="background-color: #188F58; border: 1px solid #188F58;">
                              <img class="mr-2" :src="images.save_modal" />
                              Save
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
                <!-- Modal Change Password-->
                <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="changeModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form @submit.prevent="changePassword">
                        <div class="row no-gutters p-3">
                          <div class="col-3 d-flex justify-content-center align-content-center">
                            <img :src="images.change_modal_icon" width="100px" height="100px" />
                          </div>
                          <div class="col-9">
                            <div class="modal-body">
                              <h5 class="modal-title mb-3" id="changeModalLabel" style="color: #0071C3">
                                Change Your Password
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>

                              <div class="form-group sh-password">
                                <label>Old Password</label>
                                <input v-model="formchangePass.oldpassword" :type="oldpassword" class="form-control" :class="{ 'is-invalid': form.errors.has('oldpassword') }" placeholder="Enter Confirm Password" name="oldpassword">
                                <span v-if="errors.oldpassword" class="error">{{ errors.oldpassword[0] }}</span>
                                <label class="sh-password_icon" @click="
                                                        showPass = !showPass
                                                    ">
                                  <img :src="
                                                            images.show_password
                                                        " width="22px" @click="show_password" v-show="!showPass" />
                                  <img :src="
                                                            images.hide_password
                                                        " width="22px" @click="show_password" v-show="showPass" />
                                </label>
                              </div>
                              <div class="form-group sh-password">
                                <label>New Password</label>
                                <input v-model="formchangePass.password" :type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Enter Confirm Password" name="password">
                                <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>
                                <label class="sh-password_icon" @click="
                                                        showPass2 = !showPass2
                                                    ">
                                  <img :src="
                                                            images.show_password
                                                        " width="22px" @click="show_password2" v-show="!showPass2" />
                                  <img :src="
                                                            images.hide_password
                                                        " width="22px" @click="show_password2" v-show="showPass2" />
                                </label>
                              </div>
                              <div class="form-group sh-password">
                                <label>New Password
                                  Confirmation</label>
                                <input v-model="formchangePass.password_confirmation" :type="confpassword" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" placeholder="Enter Confirm Password" name="password_confirmation">
                                <span v-if="errors.password_confirmation" class="error">{{ errors.password_confirmation[0] }}</span>
                                <label class="sh-password_icon" @click="
                                                        showPass3 = !showPass3
                                                    ">
                                  <img :src="
                                                            images.show_password
                                                        " width="22px" @click="show_password3" v-show="!showPass3" />
                                  <img :src="
                                                            images.hide_password
                                                        " width="22px" @click="show_password3" v-show="showPass3" />
                                </label>
                              </div>

                            </div>
                          </div>
                          <div class="col-12 py-3  d-flex justify-content-end align-content-center">
                            <button type="button" class="btn btn-back px-3 mx-2 d-flex align-content-center" data-dismiss="modal">
                              <img class="mr-2" :src="images.cancel" />
                              Cancel
                            </button>
                            <button type="submit" :disabled="isDisabled" class="btn btn-delete px-3 mx-2 d-flex align-content-center" style="background-color: #0071C3; border: 1px solid #0071C3;">
                              <img class="mr-2" :src="images.change_modal" />
                              Change
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
        save: "dashboard/imgs/save.svg",
        cancel: "dashboard/imgs/cancel.svg",
        save_modal: "dashboard/imgs/save_modal.svg",
        save_modal_icon: "dashboard/imgs/save_modal_icon.png",
        cancel_modal: "dashboard/imgs/cancel_modal.svg",
        cancel_modal_icon: "dashboard/imgs/cancel_modal_icon.png",
        update_file: "dashboard/imgs/update_file.png",
        go_back: "dashboard/imgs/go_back.svg",
        delete_modal: "dashboard/imgs/delete_modal.svg",
        delete_modal_icon: "dashboard/imgs/delete_modal_icon.png",
        reset_modal: "dashboard/imgs/reset_modal.svg",
        reset_modal_icon: "dashboard/imgs/reset_modal_icon.png",
        change_modal_icon: "dashboard/imgs/change_modal_icon.png",
        change_modal: "dashboard/imgs/change_modal.svg",
        show_password: "dashboard/imgs/show_password.svg",
        hide_password: "dashboard/imgs/hide_password.svg",
      },
      isDisabled: false,
      errors: [],
      imgurl: null,
      password: "",
      password2: "",
      oldpassword: "password",
      password: "password",
      confpassword: "password",
      showPass: false,
      showPass2: false,
      showPass3: false,
      user: null,
      form: new Form({
        id: "",
        first_name: "",
        last_name: "",
        address: "",
        phone: "",
        email: "",
        image: "",
      }),
      formchangePass: new Form({
        oldpassword: "",
        password: "",
        password_confirmation: "",
      }),
    };
  },
  methods: {
    show_password() {
      this.oldpassword = this.oldpassword === "password" ? "text" : "password";
    },
    show_password2() {
      this.password = this.password === "password" ? "text" : "password";
    },
    show_password3() {
      this.confpassword =
        this.confpassword === "password" ? "text" : "password";
    },
    getItemImage() {
      return "images/user/" + this.form.image;
    },

    upload_image(e) {
      this.form.image = e.target.files[0];
      const file = e.target.files[0];
      this.imgurl = URL.createObjectURL(file);
    },

    displayUser() {
      axios.get("auth/init").then((response) => {

        this.form.fill(response.data.user);
        this.form.image = response.data.user.photo.filename;
      });
    },
      getFileName(photo){
          return  photo?.filename
      },
    updateItem() {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("first_name", this.form.first_name);
      formData.append("last_name", this.form.last_name);
      formData.append("address", this.form.address);
      formData.append("phone", this.form.phone);
      formData.append("image", this.form.image);
      formData.append("_method", "put");
      let id = this.form.id;
      axios
        .post("api/updateProfile/" + id, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");

          Toast.fire({
            icon: "success",
            title: "Profile updated in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#saveModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong update profile",
          });
           setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    changePassword() {
         this.isDisabled = true;
      let formData = new FormData();
      formData.append("oldpassword", this.formchangePass.oldpassword);
      formData.append("password", this.formchangePass.password);
      formData.append(
        "password_confirmation",
        this.formchangePass.password_confirmation
      );
      formData.append("_method", "put");
      let id = this.form.id;
      axios
        .post("api/changePassword/" + id, formData)
        .then((res) => {
          this.errors = [];
          $("#changeModal").modal("hide");
           this.$router.push({ path: "/login" });
          Toast.fire({
            icon: "success",
            title: "Change password in successfully",
          });
           setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#changeModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong change password",
          });
           setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
  },
  mounted() {
    this.displayUser();
  },
};
</script>
