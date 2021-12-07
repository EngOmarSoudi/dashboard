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
                      Our Beneficiaries
                    </h4>
                    <div class="min-div_list_icon">
                      <button type="button" class="btn btn-save  mx-2 px-3" data-toggle="modal" data-target="#saveModal">
                        <img :src="images.save" />
                        Save
                      </button>
                    </div>
                  </div>
                </div>

                <div class="min-div px-5 py-4 my-5">
                  <div class="d-flex">
                    <h5 class="min-div_title mb-0">
                      Add New Beneficiary
                    </h5>
                  </div>

                  <div class="min-div_list_item mt-4">

                    <div class="row no-no-gutters ">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Amount</label>
                          <input type="text" class="form-control" placeholder="Enter Amount" v-model="form.amount" :class="{ 'is-invalid': form.errors.has('amount') }" name="amount" />
                          <span v-if="errors.amount" class="error">{{ errors.amount[0] }}</span>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Beneficiary Type</label>
                          <input type="text" class="form-control" placeholder="Enter Beneficiary Type" v-model="form.type" :class="{ 'is-invalid': form.errors.has('type') }" name="type" />
                          <span v-if="errors.type" class="error">{{ errors.type[0] }}</span>
                        </div>
                        <div class="mt-3 text-right">
                               <label>:البيانات باللغة العربية</label>
                          <div class="form-group">
                                <label>نوع المستفيد</label>
                                <input type="text" class="form-control text-right" placeholder="ادخل نوع المستفيد" v-model="form.type_ar" :class="{ 'is-invalid': form.errors.has('type_ar') }" name="type_ar" />
                                <span v-if="errors.type_ar" class="error">{{ errors.type_ar[0] }}</span>
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
        go_back: "dashboard/imgs/go_back.svg",
        save_modal: "dashboard/imgs/save_modal.svg",
        save_modal_icon: "dashboard/imgs/save_modal_icon.png",
        cancel_modal: "dashboard/imgs/cancel_modal.svg",
        cancel_modal_icon: "dashboard/imgs/cancel_modal_icon.png",
      },
      errors: [],
      isDisabled: false,
      form: new Form({
        id: "",
        amount: "",
        type: "",
         type_ar: "",
      }),
    };
  },
  methods: {
    creating() {
      this.isDisabled = true;
      let formData = new FormData();
      formData.append("amount", this.form.amount);
      formData.append("type", this.form.type);
       formData.append("type_ar", this.form.type_ar);

      axios
        .post("api/beneficiary", formData)
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          this.$router.push({ path: "/admin/our-beneficiaries/" });
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
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
