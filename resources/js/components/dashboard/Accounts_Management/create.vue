<template>
  <div>
    <div class="row no-gutters">
      <div class="col-3  pr-5">
        <div class="MyNavbar">
          <navbar></navbar>
        </div>
      </div>
      <div class="col-9 p-0">
        <div class="add_iamge">
          <form @submit.prevent="creating" enctype="multipart/form-data">
            <div class="row no-gutters py-5 pr-5 text-left">
              <div class="col-12 ">
                <div class="head-fixed">
                  <div class="min-div px-4 py-3">
                    <h4 class="min-div_title mb-0">
                      Accounts Management
                    </h4>
                    <div class="min-div_list_icon">
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
                      Add a Account
                    </h5>
                  </div>

                  <div class="min-div_list_item mt-4">

                    <div class="row no-no-gutters ">
                      <div class="col-md-4">
                        <label class="placeholder" id="preview" :style="{'background-image': `url(${imgurl || images.img_upload})`}" style=" height: 250px; ">

                          <input name="image" type="file" class="file-input" :class="{ 'is-invalid': form.errors.has('image') }" @change="upload_image">

                          <img :src="images.update_file" width="100px" />
                        </label>
                        <span v-if="errors.image" class="error">{{ errors.image[0] }}</span>
                      </div>
                      <div class="col-md-8">
                        <div class="row no-gutters">
                          <div class="form-group col-md-6 px-2">
                            <label>Email</label>
                            <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Enter Email" name="email">
                            <span v-if="errors.email" class="error">{{ errors.email[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2"></div>
                          <div class="form-group col-md-6 px-2">
                            <label>First Name</label>
                            <input v-model="form.first_name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }" placeholder="Enter First Name" name="first_name">
                            <span v-if="errors.first_name" class="error">{{ errors.first_name[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <label>Last Name</label>
                            <input v-model="form.last_name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }" placeholder="Enter Last Name" name="last_name">
                            <span v-if="errors.last_name" class="error">{{ errors.last_name[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <label>Address</label>
                            <input v-model="form.address" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('address') }" placeholder="Enter Address" name="address">
                            <span v-if="errors.address" class="error">{{ errors.address[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <label>Phone</label>
                            <input v-model="form.phone" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }" placeholder="Enter Phone" name="phone">
                            <span v-if="errors.phone" class="error">{{ errors.phone[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <label>Password</label>
                            <input v-model="form.password" type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Enter Password" name="password">
                            <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>
                          </div>
                          <div class="form-group col-md-6 px-2">
                            <label>Confirm Password</label>
                            <input v-model="form.password_confirmation" type="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" placeholder="Enter Confirm Password" name="password_confirmation">
                            <span v-if="errors.password_confirmation" class="error">{{ errors.password_confirmation[0] }}</span>
                          </div>
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
                            <button type="submit" :disabled="isDisabled" class="btn btn-delete px-3 mx-2 d-flex align-content-center" style="background-color: #188F58; border: 1px solid #188F58;">
                              <img class="mr-2" :src="images.save_modal" />
                              Save
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
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
        update_file: "dashboard/imgs/update_file.png",
        go_back: "dashboard/imgs/go_back.svg",
        save_modal: "dashboard/imgs/save_modal.svg",
        save_modal_icon: "dashboard/imgs/save_modal_icon.png",
        cancel_modal: "dashboard/imgs/cancel_modal.svg",
        cancel_modal_icon: "dashboard/imgs/cancel_modal_icon.png",
        img_upload: "dashboard/imgs/img_dashboard.png",
      },
      imgurl: null,
      isDisabled: false,
      errors: [],
      form: new Form({
        id: "",
        first_name: "",
        last_name: "",
        address: "",
        phone: "",
        email: "",
        password: "",
        password_confirmation: "",
        image: "",
      }),
    };
  },

  methods: {
    upload_image(e) {
      this.form.image = e.target.files[0];
      const file = e.target.files[0];
      this.imgurl = URL.createObjectURL(file);
    },
    creating() {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("first_name", this.form.first_name);
      formData.append("last_name", this.form.last_name);
      formData.append("address", this.form.address);
      formData.append("phone", this.form.phone);
      formData.append("email", this.form.email);
      formData.append("password", this.form.password);
      formData.append("password_confirmation", this.form.password_confirmation);
      formData.append("image", this.form.image);

      axios
        .post("api/users", formData)
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          this.$router.push({ path: "/admin/account" });
          Toast.fire({
            icon: "success",
            title: "User created in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#saveModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong creating user",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
