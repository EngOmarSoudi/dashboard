<template>
    <div>
        <div class="row no-gutters">
            <div class="col-3  pr-5">
                <div class="MyNavbar">
                    <navbar></navbar>
                </div>
            </div>
            <div class="col-9 p-0">
                <div class="our_letter">
                    <div class="row no-gutters py-5 pr-5 text-left">
                        <div class="col-12 ">
                            <div class="head-fixed">
                                <div class="min-div px-4 py-3">
                                    <h4 class="min-div_title mb-0">
                                        Contact Information
                                    </h4>
                                </div>
                            </div>

                            <div class="min-div px-4 py-4 my-5">
                                <div class="d-flex">
                                    <h5 class="min-div_title mb-0">
                                        Contact Information
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn btn-save ml-auto px-3"
                                        @click="NewModel()"
                                        v-if="!contact_information.length"
                                    >
                                        Add contact information
                                    </button>
                                </div>
                                <div
                                    v-for="(item, i) in contact_information"
                                    :key="i"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-save float-right px-4"
                                        @click="EditModel(item)"
                                    >
                                        Edit contact information
                                    </button>

                                    <div class="minm mt-4">
                                        <div class="row no-no-gutters ">
                                            <div
                                                class="col-12"
                                                style=" display: contents "
                                            >
                                                <div
                                                    class="form-group w-50 px-3"
                                                >
                                                    <label
                                                        class="font-weight-bold"
                                                        >Facebook link</label
                                                    >
                                                    <p
                                                        class="mt-3"
                                                        style=" font-size: 1rem "
                                                    >
                                                        {{ item.facebook_url }}
                                                    </p>
                                                </div>

                                                <div
                                                    class="form-group w-50 px-3"
                                                >
                                                    <label
                                                        class="font-weight-bold"
                                                        >Twitter link</label
                                                    >
                                                    <p
                                                        class="mt-3"
                                                        style=" font-size: 1rem "
                                                    >
                                                        {{ item.twitter_url }}
                                                    </p>
                                                </div>

                                                <div
                                                    class="form-group w-50 px-3"
                                                >
                                                    <label
                                                        class="font-weight-bold"
                                                        >Instagram link</label
                                                    >
                                                    <p
                                                        class="mt-3"
                                                        style=" font-size: 1rem "
                                                    >
                                                        {{ item.instagram_url }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form
                                    @submit.prevent="
                                        editmodal ? updateing() : creating()
                                    "
                                >
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
                                                        Add contact information
                                                    </h5>
                                                    <h5
                                                        v-show="editmodal"
                                                        class="modal-title"
                                                        id="exampleModalLabel"
                                                    >
                                                        Edit contact information
                                                    </h5>
                                                </div>

                                                <div class="modal-body">
                                                    <div
                                                        class="row no-no-gutters "
                                                    >
                                                        <div
                                                            class="col-12"
                                                            style=" display: contents "
                                                        >
                                                            <div
                                                                class="form-group w-50 px-3"
                                                            >
                                                                <label
                                                                    >Facebook
                                                                    link</label
                                                                >
                                                                <input
                                                                    v-model="
                                                                        form.facebook_url
                                                                    "
                                                                    type="text"
                                                                    class="form-control"
                                                                    :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'facebook_url'
                                                                        )
                                                                    }"
                                                                    placeholder="Enter facebook link"
                                                                    name="facebook_url"
                                                                />
                                                                <span
                                                                    v-if="
                                                                        errors.facebook_url
                                                                    "
                                                                    class="error"
                                                                    >{{
                                                                        errors
                                                                            .facebook_url[0]
                                                                    }}</span
                                                                >
                                                            </div>

                                                            <div
                                                                class="form-group w-50 px-3"
                                                            >
                                                                <label
                                                                    >Twitter
                                                                    link</label
                                                                >
                                                                <input
                                                                    v-model="
                                                                        form.twitter_url
                                                                    "
                                                                    type="text"
                                                                    class="form-control"
                                                                    :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'twitter_url'
                                                                        )
                                                                    }"
                                                                    placeholder="Enter twitter link"
                                                                    name="twitter_url"
                                                                />
                                                                <span
                                                                    v-if="
                                                                        errors.twitter_url
                                                                    "
                                                                    class="error"
                                                                    >{{
                                                                        errors
                                                                            .twitter_url[0]
                                                                    }}</span
                                                                >
                                                            </div>

                                                            <div
                                                                class="form-group w-50 px-3"
                                                            >
                                                                <label
                                                                    >Instagram
                                                                    link</label
                                                                >
                                                                <input
                                                                    v-model="
                                                                        form.instagram_url
                                                                    "
                                                                    type="text"
                                                                    class="form-control"
                                                                    :class="{
                                                                        'is-invalid': form.errors.has(
                                                                            'instagram_url'
                                                                        )
                                                                    }"
                                                                    placeholder="Enter instagram link"
                                                                    name="instagram_url"
                                                                />
                                                                <span
                                                                    v-if="
                                                                        errors.instagram_url
                                                                    "
                                                                    class="error"
                                                                    >{{
                                                                        errors
                                                                            .instagram_url[0]
                                                                    }}</span
                                                                >
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
                                                        <img
                                                            :src="images.cancel"
                                                        />
                                                        Cancel
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="btn btn-save  mx-2 px-3"
                                                        data-toggle="modal"
                                                        data-target="#saveModal"
                                                    >
                                                        <img
                                                            :src="images.save"
                                                        />
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
                                                    <div
                                                        class="col-3 d-flex justify-content-center align-content-center"
                                                    >
                                                        <img
                                                            :src="
                                                                images.save_modal_icon
                                                            "
                                                        />
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
                                                                <span
                                                                    aria-hidden="true"
                                                                    >&times;</span
                                                                >
                                                            </button>
                                                            Are you sure you
                                                            want to save?
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 py-3  d-flex justify-content-end align-content-center"
                                                    >
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
            editmodal: false,
            images: {
                save: "dashboard/imgs/save.svg",
                cancel: "dashboard/imgs/cancel.svg",
                update_file: "dashboard/imgs/update_file.png",
                icon_add: "dashboard/imgs/icon_add.svg",
                go_back: "dashboard/imgs/go_back.svg",
                save_modal: "dashboard/imgs/save_modal.svg",
                save_modal_icon: "dashboard/imgs/save_modal_icon.png",
                cancel_modal: "dashboard/imgs/cancel_modal.svg",
                cancel_modal_icon: "dashboard/imgs/cancel_modal_icon.png"
            },
            contact_information: [],
            errors: [],
            isDisabled: false,
            form: new Form({
                id: "",
                facebook_url: "",
                twitter_url: "",
                instagram_url: "",
            })
        };
    },
    methods: {
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
        creating() {
            this.isDisabled = true;
            setTimeout(() => this.displayItems(), 2000);
            let formData = new FormData();
            formData.append("facebook_url", this.form.facebook_url);
            formData.append("twitter_url", this.form.twitter_url);
            formData.append("instagram_url", this.form.instagram_url);
            axios
                .post("api/contact_information", formData)
                .then(res => {
                    this.errors = [];
                    $("#saveModal").modal("hide");
                    $("#createModal").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Item created in successfully"
                    });
                    setTimeout(() => (this.isDisabled = false), 2000);
                })
                .catch(err => {
                    this.errors = err.response.data.errors;
                    $("#saveModal").modal("hide");
                    Toast.fire({
                        icon: "error",
                        title: "Something went wrong creating Item"
                    });
                    setTimeout(() => (this.isDisabled = false), 2000);
                });
        },
        updateing(id) {
            this.isDisabled = true;
            setTimeout(() => this.displayItems(), 2000);
            let formData = new FormData();
            formData.append("facebook_url", this.form.facebook_url);
            formData.append("twitter_url", this.form.twitter_url);
            formData.append("instagram_url", this.form.instagram_url);
            formData.append("_method", "put");

            axios
                .post("api/contact_information/" + this.form.id, formData)
                .then(res => {
                    this.errors = [];
                    $("#saveModal").modal("hide");
                    $("#createModal").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Item updated in successfully"
                    });
                    setTimeout(() => (this.isDisabled = false), 2000);
                })
                .catch(err => {
                    this.errors = err.response.data.errors;
                    $("#saveModal").modal("hide");
                    Toast.fire({
                        icon: "error",
                        title: "Something went wrong update item"
                    });
                    setTimeout(() => (this.isDisabled = false), 2000);
                });
        },
        displayItems() {
            axios.get("api/contact_information").then(response => {
                this.contact_information = response.data;
            });
        }
    },
    mounted() {
        this.displayItems();
        setTimeout(() => {
            this.initialize();
        }, 2000);
        this.updateCoordinates();
    }
};
</script>
