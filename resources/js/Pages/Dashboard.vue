<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div
                            class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert"
                            v-if="$page.flash.message"
                        >
                            <div class="flex">
                                <div>
                                    <p class="text-sm">
                                        {{ $page.flash.message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-6 sm:px-20 bg-white border-b border-gray-200"
                        >
                            <div class="text-right">
                                <button
                                    @click="edit(data)"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
                                >
                                    Ubah
                                </button>
                            </div>

                            <div class="mt-8 text-2xl">
                                Selamat datang di panel admin Maleo Project
                            </div>

                            <div class="mt-6 text-gray-500">
                                {{ data.tag_line }}
                            </div>

                            <div class="mt-8 text-1xl">
                                Tentang kami
                            </div>

                            <div class="mt-6 text-gray-500">
                                {{ data.about_us }}
                            </div>

                            <div class="mt-6 text-1xl">
                                alamat : {{ data.alamat ? data.alamat : "-" }}
                            </div>
                        </div>

                        <div
                            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3"
                        >
                            <div class="p-6">
                                <div class="flex items-center">
                                    <svg
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                        ></path>
                                    </svg>
                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        <a href="https://laravel.com/docs"
                                            >Design, Visual, dan
                                            Communication</a
                                        >
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-gray-500">
                                        {{ data.d1 }}
                                    </div>
                                </div>
                            </div>

                            <div
                                class="p-6 border-t border-gray-200 md:border-t-0 md:border-l"
                            >
                                <div class="flex items-center">
                                    <svg
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                        ></path>
                                        <path
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                                        ></path>
                                    </svg>
                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        Branding, Marketing dan Business
                                        Consultant
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-gray-500">
                                        {{ data.d2 }}
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 border-t border-gray-200">
                                <div class="flex items-center">
                                    <svg
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        Riset dan Konsultan Penelitian
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-gray-500">
                                        {{ data.d3 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2"
                        >
                            <div
                                class="p-6 border-t border-gray-200 md:border-l"
                            >
                                <div class="flex items-center">
                                    <svg
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        ></path>
                                    </svg>
                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        Software Development
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-gray-500">
                                        {{ data.d4 }}
                                    </div>
                                </div>
                            </div>

                            <div
                                class="p-6 border-t border-gray-200 md:border-l"
                            >
                                <div class="flex items-center">
                                    <svg
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        viewBox="0 0 24 24"
                                        class="w-8 h-8 text-gray-400"
                                    >
                                        <path
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        ></path>
                                    </svg>
                                    <div
                                        class="ml-4 text-lg text-gray-600 leading-7 font-semibold"
                                    >
                                        Leadership, Problem Solving, dan Public
                                        Speaking
                                    </div>
                                </div>

                                <div class="ml-12">
                                    <div class="mt-2 text-sm text-gray-500">
                                        {{ data.d5 }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-6 sm:px-20 bg-white border-b border-gray-200"
                        >
                            <div class="mt-8 text-2xl">
                                Sosial Media
                            </div>

                            <div class="mt-6 text-1xl">
                                Email : {{ data.email ? data.email : "-" }}
                            </div>
                            <div class="mt-6 text-1xl">
                                Wa :
                                {{
                                    data.handphone ? "+" + data.handphone : "-"
                                }}
                            </div>
                            <div class="mt-6 text-1xl">
                                Instagram : {{ data.ig ? data.ig : "-" }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"
                v-if="isOpen"
            >
                <div
                    class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                >
                    <div class="fixed inset-0 transition-opacity">
                        <div
                            class="absolute inset-0 bg-gray-500 opacity-75"
                        ></div>
                    </div>
                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span
                        class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    ></span
                    >​
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <form>
                             <!-- {{ csrf_field() }} -->
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="">
                                    

                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput1"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Tagline:</label
                                        >
                                        <input
                                            type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput1"
                                            placeholder="Masukan Tagline"
                                            v-model="form.tag_line"
                                        />
                                        <div
                                            v-if="$page.errors.tag_line"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.tag_line[0] }}
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput2"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Alamat:</label
                                        >
                                        <textarea
                                            rows="4"
                                            class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput2"
                                            v-model="form.alamat"
                                            placeholder="Masukan Alamat"
                                        ></textarea>
                                        <div
                                            v-if="$page.errors.alamat"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.alamat[0] }}
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput2"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >About us:</label
                                        >
                                        <textarea
                                            rows="4"
                                            class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput2"
                                            v-model="form.about_us"
                                            placeholder="Masukan about_us"
                                        ></textarea>
                                        <div
                                            v-if="$page.errors.about_us"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.about_us[0] }}
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput1"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Email:</label
                                        >
                                        <input
                                            type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput1"
                                            placeholder="Masukan email"
                                            v-model="form.email"
                                        />
                                        <div
                                            v-if="$page.errors.email"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.email[0] }}
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput2"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Design, Visual, dan
                                            Communication:</label
                                        >
                                        <textarea
                                            rows="4"
                                            class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput2"
                                            v-model="form.d1"
                                            placeholder="Masukan penjelasan"
                                        ></textarea>
                                        <div
                                            v-if="$page.errors.d1"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.d1[0] }}
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput2"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Branding, Marketing dan Business
                                            Consultant:</label
                                        >
                                        <textarea
                                            rows="4"
                                            class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput2"
                                            v-model="form.d2"
                                            placeholder="Masukan penjelasan"
                                        ></textarea>
                                        <div
                                            v-if="$page.errors.d2"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.d2[0] }}
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput2"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Riset dan Konsultan
                                            Penelitian:</label
                                        >
                                        <textarea
                                            rows="4"
                                            class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput2"
                                            v-model="form.d3"
                                            placeholder="Masukan penjelasan"
                                        ></textarea>
                                        <div
                                            v-if="$page.errors.d3"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.d3[0] }}
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput2"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Software Development:</label
                                        >
                                        <textarea
                                            rows="4"
                                            class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput2"
                                            v-model="form.d4"
                                            placeholder="Masukan Body"
                                        ></textarea>
                                        <div
                                            v-if="$page.errors.d4"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.d4[0] }}
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label
                                            for="exampleFormControlInput2"
                                            class="block text-gray-700 text-sm font-bold mb-2"
                                            >Leadership, Problem Solving, dan
                                            Public Speaking:</label
                                        >
                                        <textarea
                                            rows="4"
                                            class="shadow appearance-none border rounded w-full py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="exampleFormControlInput2"
                                            v-model="form.d5"
                                            placeholder="Masukan Body"
                                        ></textarea>
                                        <div
                                            v-if="$page.errors.d5"
                                            class="text-red-500"
                                        >
                                            {{ $page.errors.d5[0] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                            >
                                <span
                                    class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                                >
                                    <button
                                        wire:click.prevent="store()"
                                        type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                        v-show="!editMode"
                                        @click="save(form)"
                                    >
                                        Save
                                    </button>
                                </span>
                                <span
                                    class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                                >
                                    <button
                                        wire:click.prevent="store()"
                                        type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                        v-show="editMode"
                                        @click="update(form)"
                                    >
                                        Update
                                    </button>
                                </span>
                                <span
                                    class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                                >
                                    <button
                                        @click="closeModal()"
                                        type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                    >
                                        Cancel
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
// import Welcome from "./../Jetstream/Welcome";
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
    components: {
        AppLayout,
        vueDropzone: vue2Dropzone

        // Welcome
    },

    props: ["data", "errors"],
    data() {
        console.log( document.head.querySelector('[Cookie="XSRF-TOKEN"]'))
        return {
            editMode: false,
            isOpen: false,
            form: {
                tag_line: null,
                about_us: null,
                handphone: null,
                email: null,
                ig: null,
                fb: null,
                d1: null,
                d2: null,
                d3: null,
                d4: null,
                d5: null
            },
            dropzoneOptions: {
                url: "http://127.0.0.1:8000/dropzone/store/test",
                thumbnailWidth: 150,
                maxFilesize: 0.5,
                maxFiles: 1,
                addRemoveLinks: true,
                 headers : {
                        'X-XSRF-TOKEN': document.head.querySelector('[name="XSRF-TOKEN"]')
                    }
            }
        };
    },
    methods: {
        uploadSuccess: function(file, response) {
            console.log(file)
            console.log(response)
        },
        openModal: function() {
            this.isOpen = true;
        },
        closeModal: function() {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
        },
        reset: function() {
            this.form = {
                title: null,
                body: null
            };
        },
        save: function(data) {
            this.$inertia.post("/posts", data);
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function(data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function(data) {
            data._method = "PATCH";
            this.$inertia.post("/maleo-profile/update/" + data.id, data);
            console.log(this.$inertia.page.props.flash.message);
            // if(this.$inertia.page.props.flash.message!=null){
            console.log(this.$inertia.page);
            this.closeModal();
            // }
        },
        deleteRow: function(data) {
            if (!confirm("Are you sure want to remove?")) return;
            data._method = "DELETE";
            this.$inertia.post("/posts/" + data.id, data);
            this.reset();
            this.closeModal();
        }
    }
};
</script>
