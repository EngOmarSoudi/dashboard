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
                      Success Stories
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
                      Add a Story
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
                          <label>Leading Paragraph</label>
                          <textarea v-model="form.leadingParagraph" class="form-control" rows="7" placeholder="Enter Leading Paragraph" name="leadingParagraph"></textarea>
                          <span v-if="errors.leadingParagraph" class="error">{{ errors.leadingParagraph[0] }}</span>
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
                            <label> الفقرة الرئيسية</label>
                            <textarea v-model="form.leadingParagraph_ar" class="form-control text-right" :class="{ 'is-invalid': form.errors.has('leadingParagraph_ar') }" rows="7" placeholder="ادخل الفقرة الرئيسية" name="leadingParagraph_ar"></textarea>
                            <span v-if="errors.leadingParagraph_ar" class="error">{{ errors.leadingParagraph_ar[0] }}</span>
                          </div>
                        </div>
                      <div class="col-12 text-left  my-3">
                        <div class="form-group mb-0">
                          <label>Content (optional)</label>
                        </div>
                      </div>
                      <div class="col-8 mx-auto " v-for="(input, index) in formDetails.inputsContent" :key="'A'+ index">

                        <input type="hidden" name="order" v-model="input.orderContent">
                        <div class="form-group ">
                          <div class="d-flex justify-content-end">
                            <div @click="removeText(index)" class="btn-card_delete ml-auto" v-show="index || (!index && formDetails.inputsContent.length > 1)">
                              <svg id="Delete_sm_" data-name="Delete (sm)" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="40" viewBox="0 0 20 25">
                                <rect id="Rectangle_649" data-name="Rectangle 649" width="9" height="9" rx="4.5" transform="translate(5.238 5.238)" fill="#f2c0b6" opacity="0" />
                                <g id="Mask_Group_70" data-name="Mask Group 70" clip-path="url(#clip-path)">
                                  <g id="surface1" transform="translate(2.168 0)">
                                    <path id="Path_193" data-name="Path 193" d="M10.649,1.3a1.311,1.311,0,0,0-1.3,1.3v.87H5a.435.435,0,1,0,0,.87h.435V20a1.307,1.307,0,0,0,1.3,1.3h11.3a1.307,1.307,0,0,0,1.3-1.3V4.348h.435a.435.435,0,1,0,0-.87H15.432v-.87a1.311,1.311,0,0,0-1.3-1.3Zm0,.87h3.478a.433.433,0,0,1,.435.435v.87H10.214v-.87A.433.433,0,0,1,10.649,2.174ZM9.345,9.13a.435.435,0,0,1,.307.127l2.736,2.736,2.736-2.736a.435.435,0,0,1,.615.615L13,12.609l2.736,2.736a.435.435,0,1,1-.615.615l-2.736-2.736L9.652,15.96a.435.435,0,1,1-.615-.615l2.736-2.736L9.037,9.873a.435.435,0,0,1,.307-.742Z" transform="translate(-4.556 -1.304)" fill="#958da7" />
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          <textarea v-model="input.content" name="content[]" ref="content" placeholder="Enter content" rows="7" class="form-control"></textarea>
                          <span v-if="errors.content" class="error">{{ errors.content[0] }}</span>
                                 <div class=" mt-3 text-right">
                        <label>:البيانات باللغة العربية</label>
                          <div class="form-group ">
                               <textarea v-model="input.content_ar" name="content_ar[]" ref="content_ar" placeholder="ادخل المحتوى" rows="7" class="form-control text-right"></textarea>
                          <span v-if="errors.content_ar" class="error">{{ errors.content_ar[0] }}</span>
                        </div>
                        </div>
                        </div>

                      </div>

                      <div class="col-8 mx-auto  mt-2" v-for="(input, index) in formDetails.inputsFiles" :key="'B'+ index">
                        <input type="hidden" name="order" v-model="input.orderFile">
                        <div class="my-5">
                          <div class="d-flex justify-content-end">
                            <div @click="removeImage(index)" class="btn-card_delete ml-auto" v-show="index || (!index && formDetails.inputsFiles.length > 1)">
                              <svg id="Delete_sm_" data-name="Delete (sm)" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="40" viewBox="0 0 20 25">
                                <rect id="Rectangle_649" data-name="Rectangle 649" width="9" height="9" rx="4.5" transform="translate(5.238 5.238)" fill="#f2c0b6" opacity="0" />
                                <g id="Mask_Group_70" data-name="Mask Group 70" clip-path="url(#clip-path)">
                                  <g id="surface1" transform="translate(2.168 0)">
                                    <path id="Path_193" data-name="Path 193" d="M10.649,1.3a1.311,1.311,0,0,0-1.3,1.3v.87H5a.435.435,0,1,0,0,.87h.435V20a1.307,1.307,0,0,0,1.3,1.3h11.3a1.307,1.307,0,0,0,1.3-1.3V4.348h.435a.435.435,0,1,0,0-.87H15.432v-.87a1.311,1.311,0,0,0-1.3-1.3Zm0,.87h3.478a.433.433,0,0,1,.435.435v.87H10.214v-.87A.433.433,0,0,1,10.649,2.174ZM9.345,9.13a.435.435,0,0,1,.307.127l2.736,2.736,2.736-2.736a.435.435,0,0,1,.615.615L13,12.609l2.736,2.736a.435.435,0,1,1-.615.615l-2.736-2.736L9.652,15.96a.435.435,0,1,1-.615-.615l2.736-2.736L9.037,9.873a.435.435,0,0,1,.307-.742Z" transform="translate(-4.556 -1.304)" fill="#958da7" />
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          <div style=" height: 350px; ">
                            <label class="placeholder" id="preview" :style="{
                                            'background-image': `url(${formDetails.inputsFiles[index].imgProjectDetails ||
                                                images.img_upload})`
                                        }">
                              <input name="detailsFiles[]" ref="detailsFiles" type="file" class="file-input" @change="onFileChange(index,$event)" />
                              <img :src="images.update_file" width="100px" />
                            </label>
                            <span v-if="errors.detailsFiles" class="error">{{ errors.detailsFiles[0] }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-6  mt-5" @click="addText(index)">
                        <div class="append_div w-100 btn">
                          <div class="append_div_img d-block">
                            <img :src="images.add_text" alt="" />
                            <p class="append_div_text">
                              Add Text
                            </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-6  mt-5" @click="addImage(index)">
                        <div class="append_div w-100 btn">
                          <div class="append_div_img d-block">
                            <img :src="images.add_img" alt="" />
                            <p class="append_div_text">
                              Add an Image
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mt-5 pb-5">
                        <div class="d-flex align-items-center">
                          <p class="append_div_text mr-2">
                            Media Files
                          </p>
                          <label class="append_div_label"></label>
                          <input type="file" id="file" name="media" ref="files" @change="FilesAdd" multiple />
                          <label for="file" class="ml-2"></label>

                        </div>
                        <span v-if="errors.media" class="error">{{ errors.media[0] }}</span>
                        <div class="row no-gutters ">
                          <div class=" col-md-3 upload px-3 my-4" v-for="(img, key) in form.media" :key="key">

                            <img class="upload_img" :ref="'img'" />
                            <div class="d-flex py-2 justify-content-end">
                              <button type="button" v-show="form.media" @click="removeFile(key)" class="btn upload_delete"></button>
                            </div>
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
      isDisabled: false,
      imgurl: null,
      form: new Form({
        id: "",
        title: "",
        leadingParagraph: "",
        title_ar: "",
        leadingParagraph_ar: "",
        ispinned: 0,
        image: "",
        media: [],
      }),
      formDetails: new Form({
        id: "",
        inputsContent: [],
        inputsFiles: [],
      }),
    };
  },
  methods: {
    onFileChange(index, $event) {
      this.formDetails.inputsFiles[index].detailsFiles = $event.target.files[0];
      const file = this.formDetails.inputsFiles[index].detailsFiles;
      this.formDetails.inputsFiles[
        index
      ].imgProjectDetails = URL.createObjectURL(file);
    },
    upload_image(e) {
      this.form.image = e.target.files[0];
      const file = e.target.files[0];
      this.imgurl = URL.createObjectURL(file);
    },
    FilesAdd(e) {
      var selectedFiles = e.target.files;
      for (let i = 0; i < selectedFiles.length; i++) {
        this.form.media.push(selectedFiles[i]);
      }

      for (let i = 0; i < this.form.media.length; i++) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.$refs.img[i].src = reader.result;
        };
        reader.readAsDataURL(this.form.media[i]);
      }
    },
    removeFile(key) {
      this.form.media.splice(key, 1);
      this.MYFILES.splice(key, 1);

      if (!this.form.media.length) {
        this.$refs.img.value = "";
      }
    },
    creating() {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("title", this.form.title);
      formData.append("leadingParagraph", this.form.leadingParagraph);
      formData.append("title_ar", this.form.title_ar);
      formData.append("leadingParagraph_ar", this.form.leadingParagraph_ar);
      formData.append("ispinned", this.form.ispinned);
      formData.append("image", this.form.image);
      for (let i = 0; i < this.form.media.length; i++) {
        let file = this.form.media[i];
        formData.append("files[" + i + "]", file);
      }
      for (let x = 0; x < this.formDetails.inputsContent.length; x++) {
        formData.append(
          "content[" + x + "]",
          this.formDetails.inputsContent[x].content
        );
      }
       for (let x = 0; x < this.formDetails.inputsContent.length; x++) {
        formData.append(
          "content_ar[" + x + "]",
          this.formDetails.inputsContent[x].content_ar
        );
      }
      for (let x = 0; x < this.formDetails.inputsContent.length; x++) {
        formData.append(
          "orderContent[" + x + "]",
          this.formDetails.inputsContent[x].orderContent
        );
      }

      for (let x = 0; x < this.formDetails.inputsFiles.length; x++) {
        formData.append(
          "detailsFiles[" + x + "]",
          this.formDetails.inputsFiles[x].detailsFiles
        );
      }
      for (let x = 0; x < this.formDetails.inputsFiles.length; x++) {
        formData.append(
          "orderFile[" + x + "]",
          this.formDetails.inputsFiles[x].orderFile
        );
      }

      const config = {
        "Content-Type": "multipart/form-data",
      };
      axios
        .post("api/story", formData)
        .then((res) => {
          this.errors = [];
          this.$refs.files.value = "";
          this.form.media = [];
          $("#saveModal").modal("hide");
          this.$router.push({ path: "/admin/stories" });
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
    addText(index) {
      let arrayLength =
        this.formDetails.inputsContent.length +
        this.formDetails.inputsFiles.length;
      let neworder = (arrayLength += 1);
      this.formDetails.inputsContent.push({
        content: "",
        content_ar: "",
        orderContent: neworder,
      });
    },
    removeText(index) {
      this.formDetails.inputsContent.splice(index, 1);
    },
    addImage(index) {
      let arrayLength =
        this.formDetails.inputsContent.length +
        this.formDetails.inputsFiles.length;
      let neworder = (arrayLength += 1);
      this.formDetails.inputsFiles.push({
        detailsFiles: "",
        imgProjectDetails: null,
        orderFile: neworder,
      });
    },
    removeImage(index) {
      this.formDetails.inputsFiles.splice(index, 1);
    },
  },
};
</script>
