<template>
  <div class="row no-gutters">
    <div class="col-3  pr-5">
      <div class="MyNavbar">
        <navbar></navbar>
      </div>
    </div>
    <div class="col-9 p-0">
      <div class="our_team">
        <div class="row no-gutters py-5 pr-5 text-left">
          <div class="col-12 ">
            <div class="head-fixed">
              <div class="min-div px-4 py-3">
                <h4 class="min-div_title mb-0">
                  Prtnership
                </h4>
                <div class="min-div_list_icon">
                  <img :src="images.search" class="btn" v-on:click="SearchShowing = !SearchShowing" />
                  <router-link to="/admin/partnership/create">
                    <img :src="images.icon_add" class="btn" v-b-popover.hover.top="'Add a partnership'" />
                  </router-link>
                </div>
              </div>
            </div>

            <div class="head-fixed" id="search" v-show="SearchShowing">
              <div class="min-div px-4 py-3 d-flex">
                <input type="text" v-model="search" class="form-control w-100" placeholder="Search" />
                <button type="button" class="btn close_search ml-3" v-on:click="SearchShowing = !SearchShowing"></button>
              </div>
            </div>
            <div class="min-div px-4 py-3 my-5">
              <h5 class="min-div_title mb-0">
                All partnership
              </h5>
              <div class="min-div_list_item mt-4">
                <div class=" row no-gutters my-4">
                  <div class="col-md-3 p-2" v-for="(item, i) in filteredList" :key="i">
                    <img class="min-div_list_item_img " :src="'images/'+ item.photo.filename" />
                    <div class="card-body px-0  py-2 " style=" position: relative;">
                      <p class="min-div_list_item_title mb-0">
                        {{ item.name }}
                      </p>
                      <p class="min-div_list_item_title mb-0" style="color:#066632">
                        {{ item.type_company }}
                      </p>
                      <div class="d-flex justify-content-end" style=" position: absolute; top: 8px; right: 8px;">
                        <div class="btn-card_edit " style=" width:25px; height:25px">
                          <router-link :to="
                                                    '/admin/partnership/edit/' +
                                                        item.id
                                                ">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                              <g id="Mask_Group_72" data-name="Mask Group 72" clip-path="url(#clip-path)">
                                <g id="surface1" transform="translate(0 0)">
                                  <path id="Path_195" data-name="Path 195" d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z" transform="translate(-1.304 -1.304)" fill="#958da7" />
                                </g>
                              </g>
                            </svg>
                          </router-link>
                        </div>

                        <div class="btn-card_delete " style=" width:25px; height:25px" data-toggle="modal" :data-target="
                                                '#deleteModal' + item.id
                                            ">
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
                                <button type="button" :disabled="isDisabled" class="btn btn-delete px-3 mx-2 d-flex align-content-center" @click="deleteUser(item.id)">
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
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: {
        search: "dashboard/imgs/search.svg",
        icon_add: "dashboard/imgs/icon_add.svg",
        show_img: "dashboard/imgs/fixing.svg",
        hide_img: "dashboard/imgs/not_fixing.svg",
        go_back: "dashboard/imgs/go_back.svg",
        delete_modal: "dashboard/imgs/delete_modal.svg",
        delete_modal_icon: "dashboard/imgs/delete_modal_icon.png",
      },
      search: "",
      SearchShowing: false,
      isDisabled: false,
      partnership: [],
    };
  },
  methods: {
    displayItems() {
      axios.get("api/partnership").then((response) => {
        this.partnership = response.data;
      });
    },
    deleteUser(id) {
      this.isDisabled = true;
      setTimeout(() => this.displayItems(), 2000);
      axios
        .delete("api/partnership/" + id)
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
  },
  created() {
    this.displayItems();
  },
  computed: {
    filteredList() {
      if (this.search) {
        return this.partnership.filter((item) => {
          return item.name.startsWith(this.search);
        });
      } else {
        return this.partnership;
      }
    },
  },
};
</script>
