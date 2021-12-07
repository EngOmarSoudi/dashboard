<template>
  <div>
    <div class="row no-gutters">
      <div class="col-3  pr-5">
        <div class="MyNavbar">
          <navbar></navbar>
        </div>
      </div>
      <div class="col-9 p-0">
        <div class="about_us">
          <div class="row no-gutters py-5 pr-5 text-left">
            <div class="col-12 ">
              <div class="head-fixed">
                <div class="min-div px-4 py-3">
                  <h4 class="min-div_title mb-0">
                    Subsections
                  </h4>
                  <div class="min-div_list_icon">
                    <button
                      type="button"
                      class="btn btn-save ml-auto px-3"
                      @click="NewModel()"
                    >
                      Add a subsection
                    </button>
                  </div>
                </div>
              </div>

              <div class="min-div px-4 py-3 my-5">
                <div class="d-flex">
                  <h5 class="min-div_title mb-0">
                    Subsections
                  </h5>
                  <router-link
                    to="/admin/subsections/create"
                    class="btn btn-save ml-auto px-3"
                    v-if="subsections.length"
                  >
                    Add a new product
                  </router-link>
                </div>
                <form @submit.prevent="
                                        editmodal ? updateing() : creating()
                                    ">
                  <div
                    class="modal fade"
                    id="createModal"
                    tabindex="-1"
                    aria-labelledby="createModalLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5
                            v-show="!editmodal"
                            class="modal-title"
                            id="exampleModalLabel"
                          >
                            Add a new subsection
                          </h5>
                          <h5
                            v-show="editmodal"
                            class="modal-title"
                            id="exampleModalLabel"
                          >
                            Edit a subsection
                          </h5>
                        </div>

                        <div class="modal-body">
                          <div class="row no-no-gutters ">
                            <div
                              class="col-12"
                              style=" display: contents "
                            >
                              <div class="form-group  w-50 px-3">
                                <label>Section</label>
                                <select
                                  class="form-control"
                                  v-model="form.section_id"
                                  :class="{ 'is-invalid': form.errors.has('section_id_id') }"
                                >
                                  <option
                                    v-for="item in sections"
                                    :key="item.id"
                                    :value="item.id"
                                  >{{item.title}}</option>
                                </select>
                                <span
                                  v-if="errors.section_id_id"
                                  class="error"
                                >{{ errors.section_id_id[0] }}</span>
                              </div>
                              <div class="form-group w-50 px-3">
                                <label>Title</label>
                                <input
                                  v-model="
                                                                        form.title
                                                                    "
                                  type="text"
                                  class="form-control"
                                  :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'title'
                                                                        )
                                                                    }"
                                  placeholder="Enter title"
                                  name="title"
                                />
                                <span
                                  v-if="
                                                                        errors.title
                                                                    "
                                  class="error"
                                >{{
                                                                        errors
                                                                            .title[0]
                                                                    }}</span>
                              </div>
                              <div class="form-group w-50 px-3">
                                <label>العنوان</label>
                                <input
                                  v-model="
                                                                        form.title_ar
                                                                    "
                                  type="text"
                                  class="form-control"
                                  :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'title_ar'
                                                                        )
                                                                    }"
                                  placeholder="ادخل العنوان"
                                  name="title_ar"
                                />
                                <span
                                  v-if="
                                                                        errors.title_ar
                                                                    "
                                  class="error"
                                >{{
                                                                        errors
                                                                            .title_ar[0]
                                                                    }}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button
                            type="button"
                            class="btn btn-light mx-2 px-3"
                            data-dismiss="modal"
                          >
                            <img :src="images.cancel" />
                            Cancel
                          </button>
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
                            <img :src="
                                                                images.save_modal_icon
                                                            " />
                          </div>
                          <div class="col-9">
                            <div class="modal-body">
                              <h5
                                class="modal-title"
                                id="saveModalLabel"
                                style="color: #188F58"
                              >
                                Save
                                Confirmation
                              </h5>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                              >
                                <span aria-hidden="true">&times;</span>
                              </button>
                              Are you sure you
                              want to save?
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
                                :src="
                                                                    images.go_back
                                                                "
                              />
                              Go Back
                            </button>
                            <button
                              type="submit"
                              :disabled="
                                                                isDisabled
                                                            "
                              class="btn btn-delete px-3 mx-2 d-flex align-content-center"
                              style="background-color: #188F58; border: 1px solid #188F58;"
                            >
                              <img
                                class="mr-2"
                                :src="
                                                                    images.save_modal
                                                                "
                              />
                              Save
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <div
                  class="min-div_list_item mt-4"
                  style="background-color: #D0F5D9;padding: 10px 20px;border-radius: 8px;"
                  v-for="(item, index) in subsections"
                  :key="index"
                  v-if="item.sub_section_id == null"
                >
                  <div class="d-flex">
                    <div class="d-block">
                      <p class="mb-0"> Section name: {{item.section.title}} </p>
<!--                      <p class="mb-0"> Sectionsub name: {{item.subsections.title}} </p>-->
                      <h4 class="min-div_list_item_title font-weight-bold">
                        {{ item.title }}
                      </h4>
                      <h4 class="min-div_list_item_title font-weight-bold">
                        {{ item.title_ar }}
                      </h4>
                    </div>
                    <div class="d-flex ml-auto">
                      <button
                        type="button"
                        class="btn btn-save ml-auto px-3"
                        @click="NewSubSectionModel(item.id)"
                        style="height: 40px;"
                      >
                        Add a subsection
                      </button>
                      <div class="btn-card_edit mx-3">

                        <button
                          type="button"
                          class="btn float-right px-3"
                          @click="EditModel(item)"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="20"
                            height="20"
                            viewBox="0 0 20 20"
                          >
                            <g
                              id="Mask_Group_72"
                              data-name="Mask Group 72"
                              clip-path="url(#clip-path)"
                            >
                              <g
                                id="surface1"
                                transform="translate(0 0)"
                              >
                                <path
                                  id="Path_195"
                                  data-name="Path 195"
                                  d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z"
                                  transform="translate(-1.304 -1.304)"
                                  fill="#958da7"
                                />
                              </g>
                            </g>
                          </svg>
                        </button>
                      </div>
                      <div
                        class="btn-card_delete mx-0"
                        data-toggle="modal"
                        :data-target="
                                                            '#deletecategoryModal' + item.id
                                                        "
                      >
                        <svg
                          id="Delete_sm_"
                          data-name="Delete (sm)"
                          xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink"
                          width="20"
                          height="20"
                          viewBox="0 0 20 20"
                        >
                          <rect
                            id="Rectangle_649"
                            data-name="Rectangle 649"
                            width="9"
                            height="9"
                            rx="4.5"
                            transform="translate(5.238 5.238)"
                            fill="#f2c0b6"
                            opacity="0"
                          />
                          <g
                            id="Mask_Group_70"
                            data-name="Mask Group 70"
                            clip-path="url(#clip-path)"
                          >
                            <g
                              id="surface1"
                              transform="translate(2.168 0)"
                            >
                              <path
                                id="Path_193"
                                data-name="Path 193"
                                d="M10.649,1.3a1.311,1.311,0,0,0-1.3,1.3v.87H5a.435.435,0,1,0,0,.87h.435V20a1.307,1.307,0,0,0,1.3,1.3h11.3a1.307,1.307,0,0,0,1.3-1.3V4.348h.435a.435.435,0,1,0,0-.87H15.432v-.87a1.311,1.311,0,0,0-1.3-1.3Zm0,.87h3.478a.433.433,0,0,1,.435.435v.87H10.214v-.87A.433.433,0,0,1,10.649,2.174ZM9.345,9.13a.435.435,0,0,1,.307.127l2.736,2.736,2.736-2.736a.435.435,0,0,1,.615.615L13,12.609l2.736,2.736a.435.435,0,1,1-.615.615l-2.736-2.736L9.652,15.96a.435.435,0,1,1-.615-.615l2.736-2.736L9.037,9.873a.435.435,0,0,1,.307-.742Z"
                                transform="translate(-4.556 -1.304)"
                                fill="#958da7"
                              />
                            </g>
                          </g>
                        </svg>
                      </div>
                    </div>

                  </div>
                  <form @submit.prevent="
                                        editFormSubmodal ? FormSubUpdateing() : FormSubCreating()
                                    ">
                    <div
                      class="modal fade"
                      id="createFormSubModal"
                      tabindex="-1"
                      aria-labelledby="createModalLabel"
                      aria-hidden="true"
                    >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5
                              v-show="!editFormSubmodal"
                              class="modal-title"
                              id="exampleModalLabel"
                            >
                              Add a new subsection
                            </h5>
                            <h5
                              v-show="editFormSubmodal"
                              class="modal-title"
                              id="exampleModalLabel"
                            >
                              Edit a subsection
                            </h5>
                          </div>

                          <div class="modal-body">
                            <div class="row no-no-gutters ">
                              <div
                                class="col-12"
                                style=" display: contents "
                              >
                                <input
                                  type="hidden"
                                  name="sub_section_id"
                                  v-model="formSub.sub_section_id"
                                >
                                <div class="form-group w-50 px-3">
                                  <label>Title</label>
                                  <input
                                    v-model="
                                                                        formSub.title
                                                                    "
                                    type="text"
                                    class="form-control"
                                    :class="{
                                                                        'is-invalid': formSub.errors.has(
                                                                            'title'
                                                                        )
                                                                    }"
                                    placeholder="Enter title"
                                    name="title"
                                  />
                                  <span
                                    v-if="
                                                                        errors.title
                                                                    "
                                    class="error"
                                  >{{
                                                                        errors
                                                                            .title[0]
                                                                    }}</span>
                                </div>
                                <div class="form-group w-50 px-3">
                                  <label>العنوان</label>
                                  <input
                                    v-model="
                                                                        formSub.title_ar
                                                                    "
                                    type="text"
                                    class="form-control"
                                    :class="{
                                                                        'is-invalid': formSub.errors.has(
                                                                            'title_ar'
                                                                        )
                                                                    }"
                                    placeholder="ادخل العنوان"
                                    name="title_ar"
                                  />
                                  <span
                                    v-if="
                                                                        errors.title_ar
                                                                    "
                                    class="error"
                                  >{{
                                                                        errors
                                                                            .title_ar[0]
                                                                    }}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-light mx-2 px-3"
                              data-dismiss="modal"
                            >
                              <img :src="images.cancel" />
                              Cancel
                            </button>
                            <button
                              type="button"
                              class="btn btn-save  mx-2 px-3"
                              data-toggle="modal"
                              data-target="#saveSubModal"
                            >
                              <img :src="images.save" />
                              Save
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Save-->
                    <div
                      class="modal fade"
                      id="saveSubModal"
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
                              <img :src="
                                                                images.save_modal_icon
                                                            " />
                            </div>
                            <div class="col-9">
                              <div class="modal-body">
                                <h5
                                  class="modal-title"
                                  id="saveModalLabel"
                                  style="color: #188F58"
                                >
                                  Save
                                  Confirmation
                                </h5>
                                <button
                                  type="button"
                                  class="close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                >
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                Are you sure you
                                want to save?
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
                                  :src="
                                                                    images.go_back
                                                                "
                                />
                                Go Back
                              </button>
                              <button
                                type="submit"
                                :disabled="
                                                                isDisabled
                                                            "
                                class="btn btn-delete px-3 mx-2 d-flex align-content-center"
                                style="background-color: #188F58; border: 1px solid #188F58;"
                              >
                                <img
                                  class="mr-2"
                                  :src="
                                                                    images.save_modal
                                                                "
                                />
                                Save
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Modal Delete category-->
                  <div
                    class="modal fade deletecategoryModal"
                    v-bind:id="[
                                                        'deletecategoryModal' + item.id
                                                    ]"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="deleteModalLabel"
                    aria-hidden="true"
                  >
                    <div
                      class="modal-dialog"
                      role="document"
                    >
                      <div class="modal-content">
                        <form>
                          <input
                            type="hidden"
                            name=""
                            :value="item.id"
                          />
                          <div class="row no-gutters p-3">
                            <div class="col-3 d-flex justify-content-center align-content-center">
                              <img :src="
                                                                                images.delete_modal_icon
                                                                            " />
                            </div>
                            <div class="col-9">
                              <div class="modal-body">
                                <h5
                                  class="modal-title"
                                  id="deleteModalLabel"
                                >
                                  Delete
                                  Confirmation
                                </h5>
                                <button
                                  type="button"
                                  class="close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                >
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                Are you sure
                                you want to
                                Delete?
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
                                  :src="
                                                                                    images.go_back
                                                                                "
                                />
                                Go Back
                              </button>
                              <button
                                type="buttton"
                                :disabled="
                                                                                isDisabled
                                                                            "
                                class="btn btn-delete px-3 mx-2 d-flex align-content-center"
                                @click="
                                                                                deleteCategoryItem(
                                                                                    item.id
                                                                                )
                                                                            "
                              >
                                <img
                                  class="mr-2"
                                  :src="
                                                                                    images.delete_modal
                                                                                "
                                />
                                Delete
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <b-tabs
                    content-class="mt-3"
                    class="mt-3"
                  >
                    <b-tab
                      title="Products"
                      active
                    >
                      <div
                        class=" row no-gutters my-4 "
                        v-for="(product, i) in products"
                        :key="i"
                        v-if="product.sub_section_id == item.id"
                      >
                        <img
                          class="min-div_list_item_img col-md-3"
                          :src="
                                                'images/' + product.photo.filename
                                            "
                        />
                        <div class="card-body col-md-9 py-2 px-4 position-relative">
                          <h4 class="min-div_list_item_title">
                            {{ product.title }}
                          </h4>
                          <p class="min-div_list_item_text">
                            {{ product.content }}
                          </p>
                          <div class="text-right pb-4">
                            <hr class="w-100" />
                            <label>:البيانات باللغة
                              العربية</label>
                            <h4 class="min-div_list_item_title">
                              {{ product.title_ar }}
                            </h4>
                            <p class="min-div_list_item_text">
                              {{ product.content_ar }}
                            </p>
                          </div>
                          <div
                            class="d-flex justify-content-end"
                            style="position: absolute; bottom: 8px; right: 0 "
                          >
                            <div class="btn-card_edit mx-3">
                              <router-link :to="
                                                            '/admin/subsections/edit/' +
                                                                product.id
                                                        ">
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  width="20"
                                  height="20"
                                  viewBox="0 0 20 20"
                                >
                                  <g
                                    id="Mask_Group_72"
                                    data-name="Mask Group 72"
                                    clip-path="url(#clip-path)"
                                  >
                                    <g
                                      id="surface1"
                                      transform="translate(0 0)"
                                    >
                                      <path
                                        id="Path_195"
                                        data-name="Path 195"
                                        d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z"
                                        transform="translate(-1.304 -1.304)"
                                        fill="#958da7"
                                      />
                                    </g>
                                  </g>
                                </svg>
                              </router-link>
                            </div>
                            <div
                              class="btn-card_delete mx-3"
                              data-toggle="modal"
                              :data-target="
                                                        '#deleteModal' + product.id
                                                    "
                            >
                              <svg
                                id="Delete_sm_"
                                data-name="Delete (sm)"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                              >
                                <rect
                                  id="Rectangle_649"
                                  data-name="Rectangle 649"
                                  width="9"
                                  height="9"
                                  rx="4.5"
                                  transform="translate(5.238 5.238)"
                                  fill="#f2c0b6"
                                  opacity="0"
                                />
                                <g
                                  id="Mask_Group_70"
                                  data-name="Mask Group 70"
                                  clip-path="url(#clip-path)"
                                >
                                  <g
                                    id="surface1"
                                    transform="translate(2.168 0)"
                                  >
                                    <path
                                      id="Path_193"
                                      data-name="Path 193"
                                      d="M10.649,1.3a1.311,1.311,0,0,0-1.3,1.3v.87H5a.435.435,0,1,0,0,.87h.435V20a1.307,1.307,0,0,0,1.3,1.3h11.3a1.307,1.307,0,0,0,1.3-1.3V4.348h.435a.435.435,0,1,0,0-.87H15.432v-.87a1.311,1.311,0,0,0-1.3-1.3Zm0,.87h3.478a.433.433,0,0,1,.435.435v.87H10.214v-.87A.433.433,0,0,1,10.649,2.174ZM9.345,9.13a.435.435,0,0,1,.307.127l2.736,2.736,2.736-2.736a.435.435,0,0,1,.615.615L13,12.609l2.736,2.736a.435.435,0,1,1-.615.615l-2.736-2.736L9.652,15.96a.435.435,0,1,1-.615-.615l2.736-2.736L9.037,9.873a.435.435,0,0,1,.307-.742Z"
                                      transform="translate(-4.556 -1.304)"
                                      fill="#958da7"
                                    />
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>
                          <hr
                            class="w-100"
                            style="position: absolute; bottom: -15px; right: 0 "
                          />
                        </div>
                        <!-- Modal Delete -->
                        <div
                          class="modal fade deleteModal"
                          v-bind:id="[
                                                'deleteModal' + product.id
                                            ]"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="deleteModalLabel"
                          aria-hidden="true"
                        >
                          <div
                            class="modal-dialog"
                            role="document"
                          >
                            <div class="modal-content">
                              <form>
                                <input
                                  type="hidden"
                                  name=""
                                  :value="product.id"
                                />
                                <div class="row no-gutters p-3">
                                  <div class="col-3 d-flex justify-content-center align-content-center">
                                    <img :src="
                                                                        images.delete_modal_icon
                                                                    " />
                                  </div>
                                  <div class="col-9">
                                    <div class="modal-body">
                                      <h5
                                        class="modal-title"
                                        id="deleteModalLabel"
                                      >
                                        Delete
                                        Confirmation
                                      </h5>
                                      <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                      >
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      Are you sure
                                      you want to
                                      Delete?
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
                                        :src="
                                                                            images.go_back
                                                                        "
                                      />
                                      Go Back
                                    </button>
                                    <button
                                      type="buttton"
                                      :disabled="
                                                                        isDisabled
                                                                    "
                                      class="btn btn-delete px-3 mx-2 d-flex align-content-center"
                                      @click="
                                                                        deleteItem(
                                                                            product.id
                                                                        )
                                                                    "
                                    >
                                      <img
                                        class="mr-2"
                                        :src="
                                                                            images.delete_modal
                                                                        "
                                      />
                                      Delete
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </b-tab>
                    <b-tab title="Sub Sections SUB">
                      <div
                        class="min-div_list_item mt-4"
                        style="background-color: white;padding: 10px 20px;border-radius: 8px;"
                        v-for="(it, index) in subsectionssub"
                        :key="index"
                      >
<!--                        product.sub_section_id == item.id-->


                        <div class="d-flex">
                          <div class="d-block">
                            <h5 class="min-div_list_item_title font-weight-bold">
                              {{ it.title }}
                            </h5>
                            <h5 class="min-div_list_item_title font-weight-bold">
                              {{ it.title_ar }}
                            </h5>
                          </div>
                          <div class="d-flex ml-auto">
                            <div class="btn-card_edit mx-3">
                              <button
                                type="button"
                                class="btn float-right px-3"
                                @click="EditSubSectionModel(it)"
                              >
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  width="20"
                                  height="20"
                                  viewBox="0 0 20 20"
                                >
                                  <g
                                    id="Mask_Group_72"
                                    data-name="Mask Group 72"
                                    clip-path="url(#clip-path)"
                                  >
                                    <g
                                      id="surface1"
                                      transform="translate(0 0)"
                                    >
                                      <path
                                        id="Path_195"
                                        data-name="Path 195"
                                        d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z"
                                        transform="translate(-1.304 -1.304)"
                                        fill="#958da7"
                                      />
                                    </g>
                                  </g>
                                </svg>
                              </button>
                            </div>
                            <div
                              class="btn-card_delete mx-0"
                              data-toggle="modal"
                              :data-target="
                                                            '#deleteSubSectionSubModal' + it.id
                                                        "
                            >
                              <svg
                                id="Delete_sm_"
                                data-name="Delete (sm)"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                              >
                                <rect
                                  id="Rectangle_649"
                                  data-name="Rectangle 649"
                                  width="9"
                                  height="9"
                                  rx="4.5"
                                  transform="translate(5.238 5.238)"
                                  fill="#f2c0b6"
                                  opacity="0"
                                />
                                <g
                                  id="Mask_Group_70"
                                  data-name="Mask Group 70"
                                  clip-path="url(#clip-path)"
                                >
                                  <g
                                    id="surface1"
                                    transform="translate(2.168 0)"
                                  >
                                    <path
                                      id="Path_193"
                                      data-name="Path 193"
                                      d="M10.649,1.3a1.311,1.311,0,0,0-1.3,1.3v.87H5a.435.435,0,1,0,0,.87h.435V20a1.307,1.307,0,0,0,1.3,1.3h11.3a1.307,1.307,0,0,0,1.3-1.3V4.348h.435a.435.435,0,1,0,0-.87H15.432v-.87a1.311,1.311,0,0,0-1.3-1.3Zm0,.87h3.478a.433.433,0,0,1,.435.435v.87H10.214v-.87A.433.433,0,0,1,10.649,2.174ZM9.345,9.13a.435.435,0,0,1,.307.127l2.736,2.736,2.736-2.736a.435.435,0,0,1,.615.615L13,12.609l2.736,2.736a.435.435,0,1,1-.615.615l-2.736-2.736L9.652,15.96a.435.435,0,1,1-.615-.615l2.736-2.736L9.037,9.873a.435.435,0,0,1,.307-.742Z"
                                      transform="translate(-4.556 -1.304)"
                                      fill="#958da7"
                                    />
                                  </g>
                                </g>
                              </svg>
                            </div>
                          </div>

                        </div>

                        <!-- Modal Delete category-->
                        <div
                          class="modal fade deleteSubSectionSubModal"
                          v-bind:id="[
                                                        'deleteSubSectionSubModal' + it.id
                                                    ]"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="deleteModalLabel"
                          aria-hidden="true"
                        >
                          <div
                            class="modal-dialog"
                            role="document"
                          >
                            <div class="modal-content">
                              <form>
                                <input
                                  type="hidden"
                                  name=""
                                  :value="it.id"
                                />
                                <div class="row no-gutters p-3">
                                  <div class="col-3 d-flex justify-content-center align-content-center">
                                    <img :src="
                                                                                images.delete_modal_icon
                                                                            " />
                                  </div>
                                  <div class="col-9">
                                    <div class="modal-body">
                                      <h5
                                        class="modal-title"
                                        id="deleteModalLabel"
                                      >
                                        Delete
                                        Confirmation
                                      </h5>
                                      <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                      >
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      Are you sure
                                      you want to
                                      Delete?
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
                                        :src="
                                                                                    images.go_back
                                                                                "
                                      />
                                      Go Back
                                    </button>
                                    <button
                                      type="buttton"
                                      :disabled="
                                                                                isDisabled
                                                                            "
                                      class="btn btn-delete px-3 mx-2 d-flex align-content-center"
                                      @click="
                                                                                deleteSubSectionSub(
                                                                                    it.id
                                                                                )
                                                                            "
                                    >
                                      <img
                                        class="mr-2"
                                        :src="
                                                                                    images.delete_modal
                                                                                "
                                      />
                                      Delete
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div
                          class=" row no-gutters my-4 "
                          v-for="(SSproduct, i) in products"
                          :key="i"
                          v-if="SSproduct.sub_section_id == it.id"
                        >
                          <img
                            class="min-div_list_item_img col-md-3"
                            :src="
                                                'images/' + SSproduct.photo.filename
                                            "
                          />
                          <div class="card-body col-md-9 py-2 px-4 position-relative">
                            <h4 class="min-div_list_item_title">
                              {{ SSproduct.title }}
                            </h4>
                            <p class="min-div_list_item_text">
                              {{ SSproduct.content }}
                            </p>
                            <div class="text-right pb-4">
                              <hr class="w-100" />
                              <label>:البيانات باللغة
                                العربية</label>
                              <h4 class="min-div_list_item_title">
                                {{ SSproduct.title_ar }}
                              </h4>
                              <p class="min-div_list_item_text">
                                {{ SSproduct.content_ar }}
                              </p>
                            </div>
                            <div
                              class="d-flex justify-content-end"
                              style="position: absolute; bottom: 8px; right: 0 "
                            >
                              <div class="btn-card_edit mx-3">
                                <router-link :to="
                                                            '/admin/subsections/edit/' +
                                                                SSproduct.id
                                                        ">
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 20 20"
                                  >
                                    <g
                                      id="Mask_Group_72"
                                      data-name="Mask Group 72"
                                      clip-path="url(#clip-path)"
                                    >
                                      <g
                                        id="surface1"
                                        transform="translate(0 0)"
                                      >
                                        <path
                                          id="Path_195"
                                          data-name="Path 195"
                                          d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z"
                                          transform="translate(-1.304 -1.304)"
                                          fill="#958da7"
                                        />
                                      </g>
                                    </g>
                                  </svg>
                                </router-link>
                              </div>
                              <div
                                class="btn-card_delete mx-3"
                                data-toggle="modal"
                                :data-target="
                                                        '#deleteSSproductModal' + SSproduct.id
                                                    "
                              >
                                <svg
                                  id="Delete_sm_"
                                  data-name="Delete (sm)"
                                  xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  width="20"
                                  height="20"
                                  viewBox="0 0 20 20"
                                >
                                  <rect
                                    id="Rectangle_649"
                                    data-name="Rectangle 649"
                                    width="9"
                                    height="9"
                                    rx="4.5"
                                    transform="translate(5.238 5.238)"
                                    fill="#f2c0b6"
                                    opacity="0"
                                  />
                                  <g
                                    id="Mask_Group_70"
                                    data-name="Mask Group 70"
                                    clip-path="url(#clip-path)"
                                  >
                                    <g
                                      id="surface1"
                                      transform="translate(2.168 0)"
                                    >
                                      <path
                                        id="Path_193"
                                        data-name="Path 193"
                                        d="M10.649,1.3a1.311,1.311,0,0,0-1.3,1.3v.87H5a.435.435,0,1,0,0,.87h.435V20a1.307,1.307,0,0,0,1.3,1.3h11.3a1.307,1.307,0,0,0,1.3-1.3V4.348h.435a.435.435,0,1,0,0-.87H15.432v-.87a1.311,1.311,0,0,0-1.3-1.3Zm0,.87h3.478a.433.433,0,0,1,.435.435v.87H10.214v-.87A.433.433,0,0,1,10.649,2.174ZM9.345,9.13a.435.435,0,0,1,.307.127l2.736,2.736,2.736-2.736a.435.435,0,0,1,.615.615L13,12.609l2.736,2.736a.435.435,0,1,1-.615.615l-2.736-2.736L9.652,15.96a.435.435,0,1,1-.615-.615l2.736-2.736L9.037,9.873a.435.435,0,0,1,.307-.742Z"
                                        transform="translate(-4.556 -1.304)"
                                        fill="#958da7"
                                      />
                                    </g>
                                  </g>
                                </svg>
                              </div>
                            </div>
                            <hr
                              class="w-100"
                              style="position: absolute; bottom: -15px; right: 0 "
                            />
                          </div>
                          <!-- Modal Delete -->
                          <div
                            class="modal fade deleteSSproductModal"
                            v-bind:id="[
                                                'deleteSSproductModal' + SSproduct.id
                                            ]"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="deleteModalLabel"
                            aria-hidden="true"
                          >
                            <div
                              class="modal-dialog"
                              role="document"
                            >
                              <div class="modal-content">
                                <form>
                                  <input
                                    type="hidden"
                                    name=""
                                    :value="SSproduct.id"
                                  />
                                  <div class="row no-gutters p-3">
                                    <div class="col-3 d-flex justify-content-center align-content-center">
                                      <img :src="
                                                                        images.delete_modal_icon
                                                                    " />
                                    </div>
                                    <div class="col-9">
                                      <div class="modal-body">
                                        <h5
                                          class="modal-title"
                                          id="deleteModalLabel"
                                        >
                                          Delete
                                          Confirmation
                                        </h5>
                                        <button
                                          type="button"
                                          class="close"
                                          data-dismiss="modal"
                                          aria-label="Close"
                                        >
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        Are you sure
                                        you want to
                                        Delete?
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
                                          :src="
                                                                            images.go_back
                                                                        "
                                        />
                                        Go Back
                                      </button>
                                      <button
                                        type="buttton"
                                        :disabled="
                                                                        isDisabled
                                                                    "
                                        class="btn btn-delete px-3 mx-2 d-flex align-content-center"
                                        @click="
                                                                        deleteItem(
                                                                            SSproduct.id
                                                                        )
                                                                    "
                                      >
                                        <img
                                          class="mr-2"
                                          :src="
                                                                            images.delete_modal
                                                                        "
                                        />
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
                    </b-tab>
                  </b-tabs>
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
        show_img: "dashboard/imgs/show_img.svg",
        hide_img: "dashboard/imgs/hide_password.svg",
        go_back: "dashboard/imgs/go_back.svg",
        delete_modal: "dashboard/imgs/delete_modal.svg",
        delete_modal_icon: "dashboard/imgs/delete_modal_icon.png",
        save_modal_icon: "dashboard/imgs/save_modal_icon.png",
      },
      editmodal: false,
      editFormSubmodal: false,
      formSub: new Form({
        id: "",
        sub_section_id: "",
        title: "",
        title_ar: "",
      }),
      search: "",
      SearchShowing: false,
      isDisabled: false,
      subsections: [],
      subsectionssub: [],
      products: [],
      errors: [],
      sections: [],
      form: new Form({
        id: "",
        section_id: "",
        title: "",
        title_ar: "",
      }),
    };
  },
  methods: {
    displaySections() {
      axios.get("api/sections").then((response) => {
          console.log(response.data)
        this.sections = response.data;
      });
    },
    EditModel(item) {
      this.editmodal = true;
      this.form.reset();
      $("#createModal").modal("show");
      this.form.fill(item);
    },
    NewModel() {
      this.editmodal = false;
      this.form.reset();
      $("#createModal").modal("show");
    },
    NewSubSectionModel(id) {
      this.editFormSubmodal = false;
      this.formSub.reset();
      this.formSub.sub_section_id = id;
      $("#createFormSubModal").modal("show");
    },
    EditSubSectionModel(item) {
      this.editFormSubmodal = true;
      this.formSub.reset();
      $("#createFormSubModal").modal("show");
      this.formSub.fill(item);
    },
    creating() {
      this.isDisabled = true;
      setTimeout(() => this.displayCategoriesItems(), 2000);
      let formData = new FormData();
      formData.append("section_id", this.form.section_id);
      formData.append("title", this.form.title);
      formData.append("title_ar", this.form.title_ar);
      axios
        .post("api/subsections", formData)
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          $("#createModal").modal("hide");
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
    updateing(id) {
      this.isDisabled = true;
      setTimeout(() => this.displayCategoriesItems(), 2000);
      let formData = new FormData();
      formData.append("section_id", this.form.section_id);
      formData.append("title", this.form.title);
      formData.append("title_ar", this.form.title_ar);
      formData.append("_method", "put");
      axios
        .post("api/subsections/" + this.form.id, formData)
        .then((res) => {
          this.errors = [];
          $("#saveModal").modal("hide");
          $("#createModal").modal("hide");
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

    FormSubCreating() {
      this.isDisabled = true;
      setTimeout(() => this.displayCategoriesItems(), 2000);
      let formData = new FormData();
      formData.append("sub_section_id", this.formSub.sub_section_id);
      formData.append("title", this.formSub.title);
      formData.append("title_ar", this.formSub.title_ar);
      axios
        .post("api/subsectionssub", formData)
        .then((res) => {
          this.errors = [];
          $("#saveSubModal").modal("hide");
          $("#createFormSubModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item created in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#saveSubModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong creating Item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    FormSubUpdateing(id) {
      this.isDisabled = true;
      setTimeout(() => this.displayCategoriesItems(), 2000);
      let formData = new FormData();
      formData.append("sub_section_id", this.formSub.sub_section_id);
      formData.append("title", this.formSub.title);
      formData.append("title_ar", this.formSub.title_ar);
      formData.append("_method", "put");
      axios
        .post("api/subsectionssub/" + this.formSub.id, formData)
        .then((res) => {
          this.errors = [];
          $("#saveSubModal").modal("hide");
          $("#createFormSubModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item updated in successfully",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          $("#saveSubModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong update item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    displayCategoriesItems() {
      axios.get("api/subsections").then((response) => {
        this.subsections = response.data;
      });
    },
    displayCategoriessubItems() {
      axios.get("api/subsectionssub").then((response) => {
        this.subsectionssub = response.data;
        // console.log('res ',response)
      });
    },
    displayItems() {
      axios.get("api/products").then((response) => {
        this.products = response.data;
      });
    },
    deleteCategoryItem(id) {
      this.isDisabled = true;
      axios
        .delete("api/subsections/" + id)
        .then((res) => {
          $(".deletecategoryModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
          setTimeout(() => this.displayCategoriesItems(), 2000);
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          $(".deletecategoryModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    deleteItem(id) {
      this.isDisabled = true;
      axios
        .delete("api/products/" + id)
        .then((res) => {
          $(".deleteModal").modal("hide");
          $(".deleteSSproductModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
          setTimeout(() => this.displayItems(), 2000);
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          $(".deleteModal").modal("hide");
          $(".deleteSSproductModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
    deleteSubSectionSub(id) {
      this.isDisabled = true;
      axios
        .delete("api/subsectionssub/" + id)
        .then((res) => {
          $(".deleteSubSectionSubModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
          setTimeout(() => this.displayCategoriesItems(), 2000);
          setTimeout(() => (this.isDisabled = false), 2000);
        })
        .catch((err) => {
          $(".deleteSubSectionSubModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
          setTimeout(() => (this.isDisabled = false), 2000);
        });
    },
  },
  created() {
    this.displayCategoriesItems();
    this.displayCategoriessubItems();
    this.displayItems();
    this.displaySections();
    this.displaySectionssub();
  },
  computed: {
    filteredList() {
      if (this.search) {
        return this.Sections.filter((item) => {
          return item.title.startsWith(this.search);
        });
      } else {
        return this.Sections;
      }
    },
  },
};
</script>
