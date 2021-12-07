<template>
  <div class="row no-gutters">
    <div class="col-3  pr-5">
      <div class="MyNavbar">
        <navbar></navbar>
      </div>
    </div>
    <div class="col-9 p-0">
      <div class="add_iamge">
        <form
          @submit.prevent="creating"
          enctype="multipart/form-data"
        >
          <div class="row no-gutters py-5 pr-5 text-left">
            <div class="col-12 ">
              <div class="head-fixed">
                <div class="min-div px-4 py-3">
                  <h4 class="min-div_title mb-0">
                    Partnership
                  </h4>
                  <div class="min-div_list_icon">

                    <button
                      type="button"
                      class="btn btn-save  mx-2 px-3"
                      data-toggle="modal"
                      data-target="#saveModal"
                    >
                      <img :src="images.save" />
                      Save
                    </button>
                  </div>
                </div>
              </div>

              <div class="min-div px-4 py-4 my-5">
                <div class="d-flex">
                  <h5 class="min-div_title mb-0">
                    Edit a partnership
                  </h5>
                </div>

                <div class="min-div_list_item mt-4">
                  <form>
                    <div class="row no-no-gutters ">
                      <div
                        class="col-md-6"
                        style="height: 350px;"
                      >
                        <label
                          class="placeholder"
                          id="preview"
                          :style="{
                                            'background-image': `url(${imgurl || getItemImage() ||
                                                images.img_upload})`
                                        }"
                        >
                          <input
                            name="image"
                            type="file"
                            class="file-input"
                            :class="{ 'is-invalid': form.errors.has('image') }"
                            @change="upload_image"
                          />
                          <img
                            :src="images.update_file"
                            width="100px"
                          />
                        </label>
                        <span
                          v-if="errors.image"
                          class="error"
                        >{{ errors.image[0] }}</span>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input
                            v-model="form.name"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                            placeholder="Enter Name"
                            name="name"
                          />
                          <span
                            v-if="errors.name"
                            class="error"
                          >{{ errors.name[0] }}</span>
                        </div>
                        <div class="form-group text-right">
                          <label>الاسم باللغة العربية</label>
                          <input
                            v-model="form.name_ar"
                            type="text"
                            class="form-control text-right"
                            :class="{ 'is-invalid': form.errors.has('name_ar') }"
                            placeholder="الاسم باللغة العربية"
                            name="name_ar"
                          />
                          <span
                            v-if="errors.name_ar"
                            class="error"
                          >{{ errors.name_ar[0] }}</span>
                        </div>

                        <div class="form-group">
                          <label>Type Company</label>
                          <input
                            v-model="form.type_company"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('type_company') }"
                            placeholder="Enter type company"
                            name="type_company"
                          />
                          <span
                            v-if="errors.type_company"
                            class="error"
                          >{{ errors.type_company[0] }}</span>
                        </div>
                        <div class="form-group text-right">
                          <label>نوع الشركة</label>
                          <input
                            v-model="form.type_company_ar"
                            type="text"
                            class="form-control text-right"
                            :class="{ 'is-invalid': form.errors.has('type_company_ar') }"
                            placeholder="ادخل نوع الشركة"
                            name="type_company_ar"
                          />
                          <span
                            v-if="errors.type_company_ar"
                            class="error"
                          >{{ errors.type_company_ar[0] }}</span>
                        </div>
                        <div class="form-group">
                          <label>Website</label>
                          <input
                            v-model="form.url"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('url') }"
                            placeholder="Enter URL"
                            name="url"
                          />
                          <span
                            v-if="errors.url"
                            class="error"
                          >{{ errors.url[0] }}</span>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Modal Save-->
                <div
                  class="modal fade"
                  id="saveModal"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="saveModalLabel"
                  aria-hidden="true"
                >
                  <div
                    class="modal-dialog"
                    role="document"
                  >
                    <div class="modal-content">
                      <div class="row no-gutters p-3">
                        <div class="col-3 d-flex justify-content-center align-content-center">
                          <img :src="images.save_modal_icon" />
                        </div>
                        <div class="col-9">
                          <div class="modal-body">
                            <h5
                              class="modal-title"
                              id="saveModalLabel"
                              style="color: #188F58"
                            >
                              Save Confirmation
                            </h5>
                            <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                            Are you sure you want to save?
                          </div>
                        </div>
                        <div class="col-12 py-3  d-flex justify-content-end align-content-center">
                          <button
                            type="button"
                            class="btn btn-back px-3 mx-2 d-flex align-content-center"
                            data-dismiss="modal"
                          >
                            <img
                              class="mr-2"
                              :src="images.go_back"
                            />
                            Go Back
                          </button>
                          <button
                            type="submit"
                            :disabled="isDisabled"
                            class="btn btn-delete px-3 mx-2 d-flex align-content-center"
                            style="background-color: #188F58; border: 1px solid #188F58;"
                          >
                            <img
                              class="mr-2"
                              :src="images.save_modal"
                            />
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
      errors: [],
      isDisabled: false,
      form: new Form({
        id: "",
        name: "",
        name_ar: "",
        type_company: "",
        type_company_ar: "",
        url: "",
        image: "",
      }),
    };
  },

  methods: {
    getItemImage() {
      return "images/" + this.form.image;
    },
    upload_image(e) {
      this.form.image = e.target.files[0];
      const file = e.target.files[0];
      this.imgurl = URL.createObjectURL(file);
    },
    creating() {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("name", this.form.name);
      formData.append("name_ar", this.form.name_ar);
      formData.append("type_company", this.form.type_company);
      formData.append("type_company_ar", this.form.type_company_ar);
      formData.append("url", this.form.url);
      formData.append("image", this.form.image);
      formData.append("_method", "put");
      let id = this.$route.params.id;
      axios
        .post("api/partnership/" + id, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          this.$router.push({ path: "/admin/partnership/" });
          Toast.fire({
            icon: "success",
            title: "Item created in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#saveModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong creating Item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    loadItem() {
      let id = this.$route.params.id;
      axios.get("api/partnership/" + id).then((response) => {
        this.form.fill(response.data);
        this.form.image = response.data.photo.filename;
      });
    },
  },
  mounted() {
    this.loadItem();
  },
};
</script>
