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
          <form
            @submit.prevent="creating"
            enctype="multipart/form-data"
          >
            <div class="row no-gutters py-5 pr-5 text-left">
              <div class="col-12 ">
                <div class="head-fixed">
                  <div class="min-div px-4 py-3">
                    <h4 class="min-div_title mb-0">
                      Branches
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
                      Edit a branch
                    </h5>
                  </div>

                  <div class="min-div_list_item mt-4">
                    <form>
                      <div class="row no-no-gutters ">
                        <div class="col-md-6">
                          <div class="form-group w-100">
                            <GmapMap
                              :center="{
                                                            lat: form.lat,
                                                            lng: form.lng
                                                        }"
                              :zoom="7"
                              map-type-id="terrain"
                              style="width: 100%; height: 300px"
                            >
                              <GmapMarker
                                :position="
                                                                markers.position
                                                            "
                                :clickable="true"
                                :draggable="true"
                                @click="
                                                                center =
                                                                    markers.position
                                                            "
                                @dragend="
                                                                updateCoordinates(
                                                                    $event.latLng
                                                                )
                                                            "
                                :icon="markers.icon"
                              />
                            </GmapMap>
                          </div>
                          <span
                            v-if="errors.image"
                            class="error"
                          >{{ errors.image[0] }}</span>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group px-3">
                            <label>Branch Name</label>
                            <input
                              v-model="
                                                                        form.name
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'name'
                                                                        )
                                                                    }"
                              placeholder="Enter main address"
                              name="name"
                            />
                            <span
                              v-if="
                                                                        errors.name
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .name[0]
                                                                    }}</span>
                          </div>
                          <div class="form-group px-3">
                            <label>اسم الفرع </label>
                            <input
                              v-model="
                                                                        form.name_ar
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'name_ar'
                                                                        )
                                                                    }"
                              placeholder="ادخل اسم الفرع"
                              name="name_ar"
                            />
                            <span
                              v-if="
                                                                        errors.name_ar
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .name_ar[0]
                                                                    }}</span>
                          </div>
                          <div class="form-group px-3">
                            <label>Main
                              address</label>
                            <input
                              v-model="
                                                                        form.main_address
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'main_address'
                                                                        )
                                                                    }"
                              placeholder="Enter main address"
                              name="main_address"
                            />
                            <span
                              v-if="
                                                                        errors.main_address
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .main_address[0]
                                                                    }}</span>
                          </div>
                          <div class="form-group px-3">
                            <label>العنوان</label>
                            <input
                              v-model="
                                                                        form.main_address_ar
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'main_address_ar'
                                                                        )
                                                                    }"
                              placeholder="ادخل العنوان"
                              name="main_address_ar"
                            />
                            <span
                              v-if="
                                                                        errors.main_address_ar
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .main_address_ar[0]
                                                                    }}</span>
                          </div>
                          <div class="form-group px-3">
                            <label>Branch
                              manager</label>
                            <input
                              v-model="
                                                                        form.branch_manager
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'branch_manager'
                                                                        )
                                                                    }"
                              placeholder="Enter branch manager"
                              name="branch_manager"
                            />
                            <span
                              v-if="
                                                                        errors.branch_manager
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .branch_manager[0]
                                                                    }}</span>
                          </div>

                          <div class="form-group px-3">
                            <label>Email</label>
                            <input
                              v-model="
                                                                        form.email
                                                                    "
                              type="email"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'email'
                                                                        )
                                                                    }"
                              placeholder="Enter email"
                              name="email"
                            />
                            <span
                              v-if="
                                                                        errors.email
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .email[0]
                                                                    }}</span>
                          </div>
                          <div class="form-group px-3">
                            <label>Telephone</label>
                            <input
                              v-model="
                                                                        form.telephone
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'telephone'
                                                                        )
                                                                    }"
                              placeholder="Enter telephone"
                              name="telephone"
                            />
                            <span
                              v-if="
                                                                        errors.telephone
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .telephone[0]
                                                                    }}</span>
                          </div>

                          <div class="form-group px-3">
                            <label>Phone
                              number</label>
                            <input
                              v-model="
                                                                        form.phone
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'phone'
                                                                        )
                                                                    }"
                              placeholder="Enter phone"
                              name="phone"
                            />
                            <span
                              v-if="
                                                                        errors.phone
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .phone[0]
                                                                    }}</span>
                          </div>
                          <div class="form-group px-3">
                            <label>Fax</label>
                            <input
                              v-model="
                                                                        form.fax
                                                                    "
                              type="text"
                              class="form-control"
                              :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'fax'
                                                                        )
                                                                    }"
                              placeholder="Enter fax"
                              name="fax"
                            />
                            <span
                              v-if="
                                                                        errors.fax
                                                                    "
                              class="error"
                            >{{
                                                                        errors
                                                                            .fax[0]
                                                                    }}</span>
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
      markers: [],
      form: new Form({
        id: "",
        name: "",
        name_ar: "",
        email: "",
        telephone: "",
        phone: "",
        fax: "",
        main_address: "",
        main_address_ar: "",
        branch_manager: "",
        lat: null,
        lng: null,
      }),
    };
  },

  methods: {
    initialize() {
      var formLat = this.form.lat;
      var formLng = this.form.lng;
      this.markers = {
        position: {
          lat: formLat,
          lng: formLng,
        },
        icon: {
          url: "website/imgs/map.svg",
          scaledSize: this.google && new google.maps.Size(28, 28),
          labelOrigin: this.google && new google.maps.Point(16, -10),
        },
        title: "title",
      };
    },
    updateCoordinates(location) {
      this.form.lat = location.lat();
      this.form.lng = location.lng();
    },
    creating() {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("name", this.form.name);
      formData.append("name_ar", this.form.name_ar);
      formData.append("email", this.form.email);
      formData.append("telephone", this.form.telephone);
      formData.append("phone", this.form.phone);
      formData.append("fax", this.form.fax);
      formData.append("main_address", this.form.main_address);
      formData.append("main_address_ar", this.form.main_address_ar);
      formData.append("branch_manager", this.form.branch_manager);
      formData.append("lat", this.form.lat);
      formData.append("lng", this.form.lng);
      formData.append("_method", "put");
      let id = this.$route.params.id;
      axios
        .post("api/branches/" + id, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          this.$router.push({ path: "/admin/branches/" });
          Toast.fire({
            icon: "success",
            title: "Item updated in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
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
    loadItem() {
      let id = this.$route.params.id;
      axios.get("api/branches/" + id).then((response) => {
        this.form.fill(response.data);
      });
    },
  },
  mounted() {
    this.loadItem();
    setTimeout(() => {
      this.initialize();
    }, 2000);
  },
};
</script>
