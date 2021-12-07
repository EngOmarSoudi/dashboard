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
                      Edit a Story
                    </h5>
                  </div>

                  <div class="min-div_list_item mt-4">

                    <div class="row no-no-gutters ">
                      <div class="col-md-6">
                        <label class="placeholder" id="preview" :style="{
                                            'background-image': `url(${imgurl ||  getItemImage() ||
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
                      <!-- Old Content -->
                      <div class="col-8 mx-auto  " v-for="(input, index) in formDetails.inputsContentOld" :key="'A'+ index">
                        <input type="hidden" name="order" v-model="input.orderContent">
                        <div class="form-group ">
                          <div class="d-flex justify-content-end">
                            <div data-toggle="modal" :data-target="'#updateModal' + input.id" class="btn-card_edit ">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <g id="Mask_Group_72" data-name="Mask Group 72" clip-path="url(#clip-path)">
                                  <g id="surface1" transform="translate(0 0)">
                                    <path id="Path_195" data-name="Path 195" d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z" transform="translate(-1.304 -1.304)" fill="#958da7" />
                                  </g>
                                </g>
                              </svg>
                            </div>
                            <div data-toggle="modal" :data-target="'#deleteModal' + input.id" class="btn-card_delete ">
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
                          <p class="rounded p-3 mt-1" style=" background: rgba(185, 221, 204, 0.3); font-size: 1.1rem ">
                            {{input.content}}
                          </p>
                            <div class="text-right">
                                 <label >:البيانات باللغة العربية</label>
                          <p class="rounded p-3 mt-1 text-right" style=" background: rgba(185, 221, 204, 0.3); font-size: 1.1rem ">
                            {{input.content_ar}}
                          </p>
                            </div>
                        </div>
                        <!-- Modal Delete -->
                        <div class="modal fade deleteModal" v-bind:id="['deleteModal' + input.id]" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <form>
                                <input type="hidden" name="" :value="input.id" />
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
                                    <a href="#" class="btn btn-delete px-3 mx-2 d-flex align-content-center" @click="removeTextOld(input.id)">
                                      <img class="mr-2" :src="
                                                                images.delete_modal
                                                            " />
                                      Delete
                                    </a>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <form @submit.prevent="updateTextOld(input)">
                          <div class="modal fade updateModal" v-bind:id="['updateModal' + input.id]" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit story content</h5>
                                </div>

                                <div class="modal-body">

                                  <div class="row no-no-gutters ">
                                    <div class="col-12">
                                      <textarea v-model="input.content" name="content" placeholder="Enter content" rows="7" class="form-control"></textarea>
                                      <span v-if="errors.content" class="error">{{ errors.content[0] }}</span>

                                    </div>
                                            <div class="col-md-12 mt-3 text-right">
                        <label>:البيانات باللغة العربية</label>
                          <textarea v-model="input.content_ar" name="content_ar" placeholder="ادخل المحتوى" rows="7" class="form-control text-right"></textarea>
                                      <span v-if="errors.content_ar" class="error">{{ errors.content_ar[0] }}</span>

                        </div>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light mx-2 px-3" data-dismiss="modal">
                                    <img :src="images.cancel" />
                                    Cancel
                                  </button>
                                  <button type="submit" class="btn btn-save  mx-2 px-3">
                                    <img :src="images.save" />
                                    Save
                                  </button>

                                </div>

                              </div>
                            </div>
                          </div>
                        </form>
                      </div>

                      <!-- New Content -->
                      <div class="col-8 mx-auto  mt-5" v-for="(input, index) in formDetails.inputsContent" :key="'A'+ index">
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

                      <!-- OLd File -->
                      <div class="col-8 mx-auto  mt-2" v-for="(input, index) in formDetails.inputsFilesOld" :key="'B'+ index">
                        <input type="hidden" name="order" v-model="input.orderFile">
                        <div class="my-5">
                          <div class="d-flex justify-content-end">
                            <div data-toggle="modal" :data-target="'#updateFileModal' + input.id" class="btn-card_edit ">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <g id="Mask_Group_72" data-name="Mask Group 72" clip-path="url(#clip-path)">
                                  <g id="surface1" transform="translate(0 0)">
                                    <path id="Path_195" data-name="Path 195" d="M20.684,1.924a2.116,2.116,0,0,0-2.993,0s-.031.029-.07.07L17.61,2,2.3,17.306a.45.45,0,0,0-.112.2L1.32,20.757a.434.434,0,0,0,.419.547.423.423,0,0,0,.112-.015l3.256-.873a.437.437,0,0,0,.2-.114L20.606,5a.087.087,0,0,0,.01-.017l.066-.066A2.113,2.113,0,0,0,20.684,1.924Zm-.615.615a1.249,1.249,0,0,1,0,1.763c-.144.143-.267.267-.372.372L17.935,2.911l.372-.372a1.246,1.246,0,0,1,1.763,0ZM2.872,18.327l1.41,1.41-1.928.518Z" transform="translate(-1.304 -1.304)" fill="#958da7" />
                                  </g>
                                </g>
                              </svg>
                            </div>
                            <div data-toggle="modal" :data-target="'#deleteFileModal' + input.id" class="btn-card_delete ">
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
                            <img :src="'images/' + input.detailsFiles" class="rounded" width="100%" height="100%" style=" object-fit: cover  " />
                          </div>
                        </div>
                        <!-- Modal Delete -->
                        <div class="modal fade deleteFileModal" v-bind:id="['deleteFileModal' + input.id]" tabindex="-1" role="dialog" aria-labelledby="deleteFileModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <form>
                                <input type="hidden" name="" :value="input.id" />
                                <div class="row no-gutters p-3">
                                  <div class="col-3 d-flex justify-content-center align-content-center">
                                    <img :src="
                                                            images.delete_modal_icon
                                                        " />
                                  </div>
                                  <div class="col-9">
                                    <div class="modal-body">
                                      <h5 class="modal-title" id="deleteFileModalLabel">
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
                                    <a href="#" class="btn btn-delete px-3 mx-2 d-flex align-content-center" @click="removeFileOld(input.id)">
                                      <img class="mr-2" :src="
                                                                images.delete_modal
                                                            " />
                                      Delete
                                    </a>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <form @submit.prevent="updateFileOld(input)">
                          <div class="modal fade updateFileModal" v-bind:id="['updateFileModal' + input.id]" tabindex="-1" aria-labelledby="updateFileModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit story file</h5>
                                </div>

                                <div class="modal-body">

                                  <div class="row no-no-gutters ">
                                    <div class="col-12">
                                      <div style=" height: 350px; ">
                                        <label class="placeholder" id="preview" :style="{
                                            'background-image': `url(${formDetails.inputsFilesOld[index].imgProjectDetails
                                                || 'images/' + input.detailsFiles})`
                                        }">
                                          <input name="detailsFiles" type="file" class="file-input" @change="onFileChangeOld(index,$event)" />
                                          <img :src="images.update_file" width="100px" />
                                        </label>
                                        <span v-if="errors.detailsFiles" class="error">{{ errors.detailsFiles[0] }}</span>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light mx-2 px-3" data-dismiss="modal">
                                    <img :src="images.cancel" />
                                    Cancel
                                  </button>
                                  <button type="submit" class="btn btn-save  mx-2 px-3">
                                    <img :src="images.save" />
                                    Save
                                  </button>

                                </div>

                              </div>
                            </div>
                          </div>
                        </form>
                      </div>

                      <!-- New File -->
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
                            <img class="upload_img" :ref="'img'" :src="'images/' + img" />
                            <div class="d-flex py-2 justify-content-end">
                              <button type="button" v-show="form.media" @click="removeFileFromDB(key) || removeFile(key)" class="btn upload_delete"></button>
                            </div>
                          </div>
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
        inputsContentOld: [],
        inputsContent: [],
        inputsFilesOld: [],
        inputsFiles: [],
      }),
    };
  },
  methods: {
    getItemImage() {
      return "images/" + this.form.image;
    },
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
    removeFileFromDB(key) {
      let id = this.$route.params.id;
      let itemId = key;
      axios
        .get("api/deleteStoryFile/" + id + "/StoryFiles/" + itemId)
        .then((res) => {
          $(".deleteModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
        })
        .catch((err) => {
          $(".deleteModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
        });
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
      if (this.form.media) {
        for (let i = 0; i < this.form.media.length; i++) {
          let file = this.form.media[i];
          formData.append("files[" + i + "]", file);
        }
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
      formData.append("_method", "put");
      let id = this.$route.params.id;
      axios
        .post("api/story/" + id, formData)
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
    loadItem() {
      let id = this.$route.params.id;
      axios.get("api/story/" + id).then((response) => {
        this.form.fill(response.data);
        this.form.image = response.data.photo.filename;

        for (let m = 0; m < response.data.story_details.length; m++) {
          this.formDetails.inputsContentOld.push(
            response.data.story_details[m]
          );
        }

        for (let u = 0; u < response.data.story_details_file.length; u++) {
          this.formDetails.inputsFilesOld.push(
            response.data.story_details_file[u]
          );
        }
      });
    },

    // method Modal
    updateTextOld(input) {
      let formData = new FormData();
      formData.append("contentNew", input.content);
       formData.append("contentARNew", input.content_ar);
      formData.append("_method", "put");
      axios
        .post("api/storiesDetails/" + input.id, formData)
        .then((res) => {
          this.errors = [];
          $(".updateModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item updated in successfully",
          });
          console.log(res.data);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          Toast.fire({
            icon: "error",
            title: "Something went wrong update item",
          });
        });
    },
    removeTextOld(id) {
      axios
        .delete("api/storiesDetails/" + id)
        .then((res) => {
          $(".deleteModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
        })
        .catch((err) => {
          $(".deleteModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
        });
    },

    // method Modal File
    onFileChangeOld(index, $event) {
      this.formDetails.inputsFilesOld[index].detailsFiles =
        $event.target.files[0];
      const file = this.formDetails.inputsFilesOld[index].detailsFiles;
      this.formDetails.inputsFilesOld[
        index
      ].imgProjectDetails = URL.createObjectURL(file);
    },
    updateFileOld(input) {
      let formData = new FormData();
      formData.append("detailsFilesNew", input.detailsFiles);
      console.log(input.detailsFiles);
      formData.append("_method", "put");
      axios
        .post("api/storiesDetailsFile/" + input.id, formData)
        .then((res) => {
          this.errors = [];
          $(".updateFileModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item updated in successfully",
          });
          console.log(res.data);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
          Toast.fire({
            icon: "error",
            title: "Something went wrong update item",
          });
        });
    },
    removeFileOld(id) {
      axios
        .delete("api/storiesDetailsFile/" + id)
        .then((res) => {
          $(".deleteFileModal").modal("hide");
          Toast.fire({
            icon: "success",
            title: "Item deleted in successfully",
          });
        })
        .catch((err) => {
          $(".deleteFileModal").modal("hide");
          Toast.fire({
            icon: "error",
            title: "Something went wrong delete item",
          });
        });
    },
  },
  mounted() {
    this.loadItem();
  },
};
</script>
