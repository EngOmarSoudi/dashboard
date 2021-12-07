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
          <div class="row no-gutters py-5 pr-5 text-left">
            <div class="col-12 ">
              <div class="head-fixed">
                <div class="min-div px-4 py-3">
                  <h4 class="min-div_title mb-0">
                    Accounts Management
                  </h4>

                  <div class="min-div_list_icon  d-flex">

                    <button type="button" class="btn btn-delete-2 d-flex mx-2 px-3" data-toggle="modal" :data-target="'#deleteModal' + user.id">
                      <img :src="images.delete" class="mr-2" />
                      Delete
                    </button>
                    <router-link :to="'/admin/account/edit/'+ user.id">
                      <button type="button" class="btn btn-edit-2 d-flex mx-2 px-3">
                        <img :src="images.edit" class="mr-2" />
                        Edit
                      </button>
                    </router-link>
                  </div>

                </div>
              </div>

              <div class="min-div px-4 py-5 my-5">
                <div class="d-flex">
                  <h5 class="min-div_title mb-0">
                    Account Details
                  </h5>
                </div>

                <div class="min-div_list_item mt-4">
                  <div class="row no-no-gutters ">
                    <div class="col-md-4">
                      <img :src="'images/user/'+getFileName(item.photo)" class="account_details_img" />
<!--                        user.photo.filename-->
                    </div>
                    <div class="col-md-8">
                      <div class="row no-gutters">
                        <div class="form-group col-md-6 px-2">
                          <p class="form-control" style=" border: none ">
                            {{ user.email }}
                          </p>
                        </div>
                        <div class="form-group col-md-6 px-2"></div>
                        <div class="form-group col-md-6 px-2">
                          <p class="form-control" style=" border: none ">
                            {{ user.first_name }}
                          </p>
                        </div>
                        <div class="form-group col-md-6 px-2">
                          <p class="form-control" style=" border: none ">
                            {{ user.last_name }}
                          </p>
                        </div>
                        <div class="form-group col-md-6 px-2">
                          <p class="form-control" style=" border: none ">
                            {{ user.address }}
                          </p>
                        </div>
                        <div class="form-group col-md-6 px-2">
                          <p class="form-control" style=" border: none ">
                            {{ user.phone }}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Delete -->
              <div class="modal fade deleteModal" v-bind:id="['deleteModal' + user.id]" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="row no-gutters p-3">
                      <div class="col-3 d-flex justify-content-center align-content-center">
                        <img :src="images.delete_modal_icon" />
                      </div>
                      <div class="col-9">
                        <div class="modal-body">
                          <h5 class="modal-title" id="deleteModalLabel">
                            Delete Confirmation
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          Are you sure you want to Delete?
                        </div>
                      </div>
                      <div class="col-12 py-3  d-flex justify-content-end align-content-center">
                        <button type="button" class="btn btn-back px-3 mx-2 d-flex align-content-center" data-dismiss="modal">
                          <img class="mr-2" :src="images.go_back" />
                          Go Back
                        </button>
                        <button type="button" @click="deleteItem(user.id)" class="btn btn-delete px-3 mx-2 d-flex align-content-center">
                          <img class="mr-2" :src="images.delete_modal" />
                          Delete
                        </button>
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: {
        edit: "dashboard/imgs/edit.svg",
        delete: "dashboard/imgs/delete_red.svg",
        go_back: "dashboard/imgs/go_back.svg",
        delete_modal: "dashboard/imgs/delete_modal.svg",
        delete_modal_icon: "dashboard/imgs/delete_modal_icon.png",
        reset_modal: "dashboard/imgs/reset_modal.svg",
        reset_modal_icon: "dashboard/imgs/reset_modal_icon.png",
      },
      user: null,
    };
  },
  methods: {

    loadItem() {
      let id = this.$route.params.id;
      axios.get("api/users/" + id).then((response) => {
        this.user = response.data;
      });
    },
    deleteItem(id) {
      axios
        .delete("api/users/" + id)
        .then((res) => {
          $(".deleteModal").modal("hide");
          this.$router.push({ path: "/admin/account" });
          Toast.fire({
            icon: "success",
            title: "User deleted in successfully",
          });
        })
        .catch((err) => {
          $(".deleteModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete user",
          });
        });
    },
      getFileName(photo){
          return  photo?.filename
      }
  },
  mounted() {
    this.loadItem();
  },
};
</script>
