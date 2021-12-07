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
                     Success Stories
                  </h4>

                  <div class="min-div_list_icon  d-flex">

                    <button type="button" class="btn btn-delete-2 d-flex mx-2 px-3" data-toggle="modal" :data-target="'#deleteStory' + story.id">
                      <img :src="images.delete" class="mr-2" />
                      Delete
                    </button>
                    <router-link :to="'/admin/stories/edit/'+ story.id">
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
                    Story Details
                  </h5>
                </div>

                <div class="min-div_list_item mt-4">
                  <div class="row no-no-gutters ">
                    <div class="col-md-4">
                      <img :src="'images/'+ story.photo.filename" class="account_details_img" style="height: auto;" />
                    </div>
                    <div class="col-md-8">
                      <div class="row no-gutters">
                        <div class="form-group col-md-12 px-2">
                          <h3 style=" border: none ">
                            {{ story.title }}
                          </h3>
                        </div>
                        <div class="form-group col-md-12 px-2">
                          <p style=" border: none ">
                            {{ story.leadingParagraph	 }}
                          </p>
                        </div>

                      </div>
                             <div class="text-right pb-5">
                             <hr class="w-100"  />
                             <label>:البيانات باللغة العربية</label>
                           <h4 class="min-div_list_item_title">
                        {{ story.title_ar }}
                      </h4>
                      <p class="min-div_list_item_text">
                        {{ story.leadingParagraph_ar }}
                      </p>
                       </div>
                    </div>
                  </div>
                  <div class="col-12 mt-5 pb-5">
                    <div class="d-flex align-items-center">
                      <p class="append_div_text mr-2">
                        Story  details
                      </p>
                      <label class="append_div_label" style="width: 85%;"></label>

                    </div>
                    <div class="row no-no-gutters">

                      <div class="col-md-12" v-for="(item, i) in orderstoryDetails " :key="i">
                        <div class="form-group col-md-8 mx-auto px-2">
                          <p style=" border: none " v-if="item.content">
                            {{ item.content }}
                          </p>
                           <p class="text-right" style=" border: none " v-if="item.content_ar">
                                {{ item.content_ar }}
                             </p>

                          <img :src="'images/'+ item.detailsFiles" class="account_details_img" v-if="item.detailsFiles" />
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-12 mt-5 pb-5">
                    <div class="d-flex align-items-center">
                      <p class="append_div_text mr-2">
                        Media
                      </p>
                      <label class="append_div_label" style="width: 100%;"></label>
                    </div>
                    <div class="row no-no-gutters">
                      <div class="col-md-4 my-2" v-for="(img, index) in story.media" :key="'C' +index">
                        <img :src="'images/'+ img" class="account_details_img" />
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- Modal Delete story-->
              <div class="modal fade deleteStory" v-bind:id="['deleteStory' + story.id]" tabindex="-1" role="dialog" aria-labelledby="deleteStoryLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <input type="hidden" name="" :value="story.id" />
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
                        <a href="#" class="btn btn-delete px-3 mx-2 d-flex align-content-center" @click="deleteStory(story.id)">
                          <img class="mr-2" :src="
                                                                images.delete_modal
                                                            " />
                          Delete
                        </a>
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
        add_file: "dashboard/imgs/add_file.png",
      },
      story: null,
      activities: [],
      storyDetails: [],
    };
  },

  methods: {
    loadItem() {
      let id = this.$route.params.id;
      axios.get("api/story/" + id).then((response) => {
        this.story = response.data;
      });
    },

    loadstoryDetails() {
      let id = this.$route.params.id;
      axios.get("api/story/" + id).then((response) => {
        this.storyDetails = response.data.story_details.concat(
          response.data.story_details_file
        );
      });
    },
    deleteStory(id) {
      axios
        .delete("api/story/" + id)
        .then((res) => {
          $(".deleteStory").modal("hide");
          this.$router.push({ path: "/admin/stories" });
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
        })
        .catch((err) => {
          $(".deleteStory").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
        });
    },

  },
  computed: {
    orderstoryDetails() {
      return this.storyDetails.sort((a, b) => (a.order > b.order ? 1 : -1));
    },
  },
  mounted() {
    this.loadItem();
    this.loadstoryDetails();

  },
};
</script>
