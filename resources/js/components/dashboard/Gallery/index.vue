<template>
  <div>
    <div class="row no-gutters">
      <div class="col-3  pr-5">
        <div class="MyNavbar">
          <navbar></navbar>
        </div>
      </div>
      <div class="col-9 p-0">
        <div class="gallery">
          <div class="row no-gutters py-5 pr-5 text-left">
            <div class="col-12 ">
              <div class="head-fixed">
                <div class="min-div px-4 py-3">
                  <h4 class="min-div_title mb-0">
                    Gallery
                  </h4>
                  <div class="min-div_list_icon d-flex justify-content-center align-items-center">
                    <img :src="images.search" class="btn" v-on:click="SearchShowing = !SearchShowing" />
                    <img :src="images.add_file" class="btn pr-0" @click="addfile()" />
                    <label for="file" class="ml-2 mb-0"></label>
                  </div>
                </div>
              </div>

              <div class="head-fixed" id="search" v-show="SearchShowing">
                <div class="min-div px-4 py-3 d-flex">
                   <input type="text" v-model="search" class="form-control w-100" placeholder="Search" />

                  <button type="button" class="btn close_search ml-3" v-on:click="SearchShowing = !SearchShowing"></button>
                </div>
              </div>

              <div class="min-div px-4 pt-3 pb-5 my-5">

                <div class="d-flex ">
                  <h5 class="min-div_title mb-0 ">
                    Gallery
                  </h5>
                </div>

                <div>
                  <div>
                    <div class="min-div_list_item mt-4">
                      <div class=" row no-gutters my-4" >
                        <div class=" col-md-3 upload px-3 my-4" v-for="(item, key) in filteredList" :key="key">
                          <img class="upload_img" :src="'images/'+item.file"/>
                          <div class="py-2">
                            <p class="text-left mb-1">
                              {{ item.title }}
                            </p>
                             <hr class="w-100 my-0" />
                             <p class="text-right mb-1">
                                 {{ item.title_ar }}
                             </p>
                             </div>
                             <div class="d-flex">
                            <div class="btn-card_edit ml-auto" @click="editdata(item)">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <g id="Mask_Group_72" data-name="Mask Group 72" clip-path="url(#clip-path)">
                                  <g id="surface1" transform="translate(0 0)">
                                    <path id="Path_195" data-name="Path 195" d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z" transform="translate(-1.304 -1.304)" fill="#958da7" />
                                  </g>
                                </g>
                              </svg>

                            </div>
                            <div class="btn-card_delete mx-3" data-toggle="modal" :data-target="'#deleteModal' + item.id">
                              <svg id="Delete_sm_" data-name="Delete (sm)" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <rect id="Rectangle_649" data-name="Rectangle 649" width="9" height="9" rx="4.5" transform="translate(5.238 5.238)" fill="#f2c0b6" opacity="0" />
                                <g id="Mask_Group_70" data-name="Mask Group 70" clip-path="url(#clip-path)">
                                  <g id="surface1" transform="translate(2.168 0)">
                                    <path id="Path_193" data-name="Path 193" d="M10.649,1.3a1.311,1.311,0,0,0-1.3,1.3v.87H5a.435.435,0,1,0,0,.87h.435V20a1.307,1.307,0,0,0,1.3,1.3h11.3a1.307,1.307,0,0,0,1.3-1.3V4.348h.435a.435.435,0,1,0,0-.87H15.432v-.87a1.311,1.311,0,0,0-1.3-1.3Zm0,.87h3.478a.433.433,0,0,1,.435.435v.87H10.214v-.87A.433.433,0,0,1,10.649,2.174ZM9.345,9.13a.435.435,0,0,1,.307.127l2.736,2.736,2.736-2.736a.435.435,0,0,1,.615.615L13,12.609l2.736,2.736a.435.435,0,1,1-.615.615l-2.736-2.736L9.652,15.96a.435.435,0,1,1-.615-.615l2.736-2.736L9.037,9.873a.435.435,0,0,1,.307-.742Z" transform="translate(-4.556 -1.304)" fill="#958da7" />
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          <!-- Modal Delete -->
                          <div class="modal fade deleteModal" v-bind:id="['deleteModal' + item.id]" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form>
                                  <input type="hidden" name="" :value="item.id" />
                                  <div class="row no-gutters p-3">
                                    <div class="col-3 d-flex justify-content-center align-content-center">
                                      <img :src="
                                                            images.delete_modal_icon
                                                        " />
                                    </div>
                                    <div class="col-9">
                                      <div class="modal-body">
                                        <h5 class="modal-title" id="deleteModalLabel">
                                          Delete Confirmation
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        Are you sure you want to
                                        Delete?
                                      </div>
                                    </div>
                                    <div class="col-12 py-3  d-flex justify-content-end align-content-center">
                                      <button type="button" class="btn btn-back px-3 mx-2 d-flex align-content-center" data-dismiss="modal">
                                        <img class="mr-2" :src="
                                                                images.go_back
                                                            " />
                                        Go Back
                                      </button>
                                      <button type="button" :disabled="isDisabled" class="btn btn-delete px-3 mx-2 d-flex align-content-center" @click="deletefile(item.id)">
                                        <img class="mr-2" :src="
                                                                images.delete_modal
                                                            " />
                                        Delete
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

            <form @submit.prevent="editfile ? updateing() : creating()">

              <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 v-show="!editfile" class="modal-title" id="exampleModalLabel">Create file</h5>
                      <h5 v-show="editfile" class="modal-title" id="exampleModalLabel">Edit file</h5>
                    </div>

                    <div class="modal-body">
                      <div class="row w-100 py-3 mx-0">
                        <div class="col-md-12">
                          <label v-show="!editfile" class="placeholder" id="preview" :style="{height: '280px'
                                            ,'background-image': `url(${ form.imgurl ||
                                                images.img_upload  })`
                                        }">
                            <input name="file" type="file" class="file-input" :class="{ 'is-invalid': form.errors.has('file') }" @change="upload_image" />
                            <img :src="images.update_file" width="100px" />
                          </label>
                           <label v-show="editfile" class="placeholder" id="preview" :style="{height: '280px'
                                            ,'background-image': `url(${ form.imgurl ||
                                                  getItemfile()  })`
                                        }">
                            <input name="file" type="file" class="file-input" :class="{ 'is-invalid': form.errors.has('file') }" @change="upload_image" />
                            <img :src="images.update_file" width="100px" />
                          </label>
                          <span v-if="errors.file" class="error">{{ errors.file[0] }}</span>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>File title (optional)</label>
                            <input v-model="form.title" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Enter File title" name="title" />
                            <span v-if="errors.title" class="error">{{ errors.title[0] }}</span>
                          </div>
                            <div class="mt-3 text-right">
                               <label>:البيانات باللغة العربية</label>
                          <div class="form-group">
                                <label> (اختياري) عنوان الملف</label>
                                <input type="text" class="form-control text-right" placeholder="ادخل  عنوان الملف" v-model="form.title_ar" :class="{ 'is-invalid': form.errors.has('title_ar') }" name="title_ar" />
                                <span v-if="errors.title_ar" class="error">{{ errors.title_ar[0] }}</span>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light mx-2 px-3" data-dismiss="modal">
                        <img :src="images.cancel" />
                        Cancel
                      </button>
                      <button type="button" class="btn btn-save  mx-2 px-3" data-toggle="modal" data-target="#saveModal">
                        <img :src="images.save" />
                        Save
                      </button>

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
            </form>
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
      editfile: false,
      images: {
        search: "dashboard/imgs/search.svg",
        icon_add: "dashboard/imgs/icon_add.svg",
        show_img: "dashboard/imgs/fixing.svg",
        hide_img: "dashboard/imgs/not_fixing.svg",
        go_back: "dashboard/imgs/go_back.svg",
        delete_modal: "dashboard/imgs/delete_modal.svg",
        delete_modal_icon: "dashboard/imgs/delete_modal_icon.png",
        video: "dashboard/imgs/video11.mp4",
        add_file: "dashboard/imgs/icon_add.svg",
        img_upload: "dashboard/imgs/img_dashboard.png",
        update_file: "dashboard/imgs/update_file.png",
        save_modal_icon: "dashboard/imgs/save_modal_icon.png",
      },
      search: "",
      errors: [],
      isDisabled: false,
      SearchShowing: false,
      gallery: [],
      form: new Form({
        imgurl: null,
        id: "",
        title: "",
        title_ar: "",
        file: ""
      }),
    };
  },

  methods: {
    getItemfile() {
      return "images/" + this.form.file;
    },
    upload_image(e) {
      this.form.file = e.target.files[0];
      const file = e.target.files[0];
      this.form.imgurl = URL.createObjectURL(file);
    },
    editdata(item) {
      this.editfile = true;
      this.form.reset();
      $("#createModal").modal("show");
      this.form.fill(item);
      this.form.file = item.file;
    },
    addfile() {
      this.editfile = false;
      this.form.reset();
      $("#createModal").modal("show");
    },
    creating() {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("title", this.form.title);
      formData.append("title_ar", this.form.title_ar);
      formData.append("file", this.form.file);
      axios
        .post("api/gallery", formData)
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          $("#createModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item created in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
          setTimeout(() => this.displayItems(), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#saveModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong creating Item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
          setTimeout(() => this.displayItems(), 2000);
        });
    },
    updateing(id) {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("title", this.form.title);
      formData.append("title_ar", this.form.title_ar);
      formData.append("file", this.form.file);
      formData.append("_method", "put");
      axios
        .post("api/gallery/" + this.form.id, formData)
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          $("#createModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item updated in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
          setTimeout(() => this.displayItems(), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#saveModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong update item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    deletefile(id) {
      this.isDisabled = true;
      setTimeout(() => this.displayItems(), 2000);
      axios
        .delete("api/gallery/" + id)
        .then((res) => {
          $(".deleteModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          $(".deleteModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    displayItems() {
      axios.get("api/gallery").then((response) => {
        this.gallery = response.data;
        this.form.image = response.data.file;
      });
    },
  },
  created() {
    this.displayItems();
  },
  computed: {
    filteredList() {
      if (this.search) {
        return this.gallery.filter((item) => {
          return item.title.startsWith(this.search);
        });
      } else {
        return this.gallery;
      }
    },
  },
};
</script>
