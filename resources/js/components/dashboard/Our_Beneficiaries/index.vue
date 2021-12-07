<template>
  <div>
    <div class="row no-gutters">
      <div class="col-3  pr-5">
        <div class="MyNavbar">
          <navbar></navbar>
        </div>
      </div>
      <div class="col-9 p-0">
        <div class="our_beneficiaries">
          <div class="row no-gutters py-5 pr-5 text-left">
            <div class="col-12 ">
              <div class="head-fixed">
                <div class="min-div px-4 py-3">
                  <h4 class="min-div_title mb-0">
                    Our Beneficiaries
                  </h4>
                  <div class="min-div_list_icon">
                    <img :src="images.search" class="btn" v-on:click="SearchShowing = !SearchShowing" />
                    <router-link to="/admin/our-beneficiaries/create">
                      <img :src="images.icon_add" class="btn" v-b-popover.hover.top="'Add a Beneficiary'" />
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
                  Our Beneficiaries
                </h5>
                <div class="min-div_list_item mt-4">
                  <div class="table-responsive">
                    <table class="table table-striped ">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col" style="border-radius: 8px 0 0 0"></th>
                          <th scope="col" class="px-4">Amount</th>
                          <th scope="col" class="px-4">
                            Beneficiaries type
                          </th>
                          <th scope="col" class="px-4" style="border-radius: 0 8px 0 0">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <draggable v-model="OurBeneficiaries" :element="'tbody'">
                        <tr v-for="(item, i) in filteredList" :key="i">
                          <th>
                            <div scope="row" class="btn-card_move_item mx-3">
                              <svg id="Component_19_3" data-name="Component 19 – 3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <rect id="Rectangle_906" data-name="Rectangle 906" width="20" height="20" rx="5" fill="#c9c5d2" opacity="0" />
                                <g id="Mask_Group_193" data-name="Mask Group 193" transform="translate(-13804 -7122.327)" clip-path="url(#clip-path)">
                                  <g id="surface1" transform="translate(13803.134 7121.458)">
                                    <path id="Path_2307" data-name="Path 2307" d="M10.859.869,8.1,3.62a.442.442,0,1,0,.625.625l1.711-1.7V6.52H1.3V8.258H20.428V6.52H11.3V2.54l1.711,1.7a.442.442,0,1,0,.625-.625L10.873.869l-.007.007ZM1.3,10v1.739H20.428V10Zm0,3.477v1.739h9.124a.013.013,0,0,1,0,.007V19.2l-1.711-1.7a.442.442,0,0,0-.625.625l2.764,2.75.007-.007.007.007,2.764-2.75a.442.442,0,0,0-.625-.625L11.3,19.2v-3.98a.013.013,0,0,1,0-.007h9.124V13.474Z" fill="#958da7" />
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </th>
                          <td class="px-4">{{ item.amount }}</td>
                          <td class="px-4">
                              {{ item.type }}
                                <hr class="w-100"  />

                             <div class="text-right">
                              <label>:البيانات باللغة العربية</label> <br>
                                 {{ item.type_ar }}
                             </div>
                          </td>
                          <td class="px-4">
                            <div class="d-flex justify-content-start">
                              <div class="btn-card_edit mx-3">
                                <router-link :to="
                                                        '/admin/our-beneficiaries/edit/' +
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

                              <div class="btn-card_delete mx-3" data-toggle="modal" :data-target="
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
                          </td>
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
                                      <button type="button" :disabled="isDisabled" class="btn btn-delete px-3 mx-2 d-flex align-content-center" @click="deleteItem(item.id)">
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
                        </tr>
                      </draggable>
                    </table>
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
        search: '' ,
      SearchShowing: false,
      OurBeneficiaries: [],
      isDisabled: false,
    };
  },
  methods: {
    displayItems() {
      axios.get("api/beneficiary").then((response) => {
        this.OurBeneficiaries = response.data;
      });
    },
    deleteItem(id) {
      this.isDisabled = true;
      setTimeout(() => this.displayItems(), 2000);
      axios
        .delete("api/beneficiary/" + id)
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
    if(this.search){
      return this.OurBeneficiaries.filter((item)=>{
        return item.type.startsWith(this.search);
      })
      }else{
        return this.OurBeneficiaries;
      }
    }
  }
};
</script>
