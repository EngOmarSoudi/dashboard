<template>
  <div>
    <div class="row no-gutters">
      <div class="col-3  pr-5">
        <div class="MyNavbar">
          <navbar></navbar>
        </div>
      </div>
      <div class="col-9 p-0">
        <div class="add_project">
          <form @submit.prevent="creating" enctype="multipart/form-data">
            <div class="row no-gutters py-5 pr-5 text-left">
              <div class="col-12 ">
                <div class="head-fixed">
                  <div class="min-div px-4 py-3">
                    <h4 class="min-div_title mb-0">
                      Sections
                    </h4>
                    <div class="min-div_list_icon">
                      <button type="button" class="btn btn-save  mx-2 px-3" data-toggle="modal" data-target="#saveModal">
                        <img :src="images.save" />
                        Save
                      </button>
                    </div>
                  </div>
                </div>

                <div class="min-div px-4 py-4 my-5">
                  <div class="d-flex">
                    <h5 class="min-div_title mb-0">
                      Add a section
                    </h5>
                  </div>

                  <div class="min-div_list_item mt-4">

                    <div class="row no-no-gutters ">
                      <div class="col-md-6">
                        <label class="placeholder" id="preview" :style="{
                                            'background-image': `url(${imgurl ||
                                                images.img_upload})`
                                        }">
                          <input name="image" type="file" class="file-input" :class="{ 'is-invalid': form.errors.has('image') }" @change="upload_image" />
                          <img :src="images.update_file" width="100px" />
                        </label>
                        <span v-if="errors.image" class="error">{{ errors.image[0] }}</span>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Title</label>
                          <input v-model="form.title" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Enter title" name="title" />
                          <span v-if="errors.title" class="error">{{ errors.title[0] }}</span>
                        </div>
                        <div class="form-group">
                          <label>Details</label>
                          <textarea v-model="form.details" class="form-control" rows="7" placeholder="Enter details" name="details"></textarea>
                          <span v-if="errors.details" class="error">{{ errors.details[0] }}</span>
                        </div>
                      </div>
                        <div class="col-md-12 mt-3 text-right">
                        <label>:البيانات باللغة العربية</label>
                          <div class="form-group ">
                            <label>العنوان</label>
                            <input v-model="form.title_ar" type="text" class="form-control text-right" :class="{ 'is-invalid': form.errors.has('title_ar') }" placeholder="ادخل العنوان" name="title_ar" />

                            <span v-if="errors.title_ar" class="error">{{ errors.title_ar[0] }}</span>

                          </div>
                          <div class="form-group">
                            <label>الوصف</label>
                            <textarea v-model="form.details_ar" class="form-control text-right" :class="{ 'is-invalid': form.errors.has('details_ar') }" rows="7" placeholder="ادخل الوصف" name="details_ar"></textarea>
                            <span v-if="errors.details_ar" class="error">{{ errors.details_ar[0] }}</span>
                          </div>
                        </div>
                    </div>

                  </div>

                  <!-- Modal Save-->
                  <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      >
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
      text: "",
      images: {
        save: "dashboard/imgs/save.svg",
        cancel: "dashboard/imgs/cancel.svg",
        update_file: "dashboard/imgs/update_file.png",
        go_back: "dashboard/imgs/go_back.svg",
        save_modal: "dashboard/imgs/save_modal.svg",
        save_modal_icon: "dashboard/imgs/save_modal_icon.png",
        cancel_modal: "dashboard/imgs/cancel_modal.svg",
        cancel_modal_icon: "dashboard/imgs/cancel_modal_icon.png",
        add_text: "dashboard/imgs/add_text.png",
        add_img: "dashboard/imgs/add_img.png",
        add_file: "dashboard/imgs/add_file.png",
        delete_modal: "dashboard/imgs/delete_modal.svg",
        delete_modal_icon: "dashboard/imgs/delete_modal_icon.png",
        img_upload: "dashboard/imgs/img_dashboard.png",
        icon_add: "dashboard/imgs/icon_add.svg",
      },
      errors: [],
      imgurl: null,
      isDisabled: false,
      form: new Form({
        id: "",
        title: "",
        details: "",
        title_ar: "",
        details_ar: "",
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
      formData.append("title", this.form.title);
      formData.append("details", this.form.details);
      formData.append("title_ar", this.form.title_ar);
      formData.append("details_ar", this.form.details_ar);
      formData.append("image", this.form.image);
      const config = {
        "Content-Type": "multipart/form-data",
      };
      axios
        .post("api/sections", formData)
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          this.$router.push({ path: "/admin/sections" });
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
  },
};
</script>
