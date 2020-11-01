<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Portofolio
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  content-center place-content-center">
                <div
                    class="bg-white   shadow-xl sm:rounded-lg px-4 py-4"
                >
                    <div
                        class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert"
                        v-if="$page.flash.message"
                    >
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.flash.message }}</p>
                            </div>
                        </div>
                    </div>
                    <button
                        @click="openModal()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3"
                    >
                        Create New Post
                    </button>
                    <table class=" table-auto w-full content-center">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Gambar</th>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Jenis</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row,id) in data" :key="row">
                                <td class="border px-4 py-2">{{ id+1 }}.</td>
                                <td class="border px-4 py-2">
                                    <div v-for="(dt,idx) in JSON.parse(row.gambar)" :key="dt">
                                        <div class="justify-center flex" v-if="idx==0" >
                                            <a  :href="dt" class="bg-white ">
                                                <!-- <h1 class="text-3xl p-6">{{dt}}</h1> -->
                                                <img   class="w-16 md:w-32 lg:w-48 " :src="dt" alt="A photo of a fox">
                                            </a>
                                        </div>
                                        <div v-else >
                                            <a :href="dt" class="bg-white " target="_blank">
                                                <p class="text-center">Klik untuk lihat Foto</p>
                                            </a>
                                        </div>
                                    </div>
                                   
                                  
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.judul }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.jenis }}
                                </td>
                                <td class="border px-4 py-2">
                                    <!-- <button
                                        @click="edit(row)"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Edit
                                    </button> -->
                                    <button
                                        @click="deleteRow(row)"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                                    <div
                                        class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                                    >
                                        <div class="">
                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Gambar:</label
                                                >
                                                <vue-dropzone
                                        ref="myVueDropzone"
                                        id="dropzone"
                                        :options="dropzoneOptions"
                                         v-on:vdropzone-success="uploadSuccess"
                                         v-on:vdropzone-removed-file="removeThisFile"
                                    ></vue-dropzone>
                                                <input
                                                    type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Enter Title"
                                                    v-model="form.gambar"
                                                />
                                                <div
                                                    v-if="$page.errors.gambar"
                                                    class="text-red-500"
                                                >
                                                    {{ $page.errors.gambar[0] }}
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput2"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Judul:</label
                                                >
                                                <textarea
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput2"
                                                    v-model="form.judul"
                                                    placeholder="Enter Body"
                                                ></textarea>
                                                <div
                                                    v-if="$page.errors.judul"
                                                    class="text-red-500"
                                                >
                                                    {{ $page.errors.judul[0] }}
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput2"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Jenis:</label
                                                >

                                                <select
                                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-state"
                                                    v-model="form.jenis"
                                                >
                                                    <option>Riset</option>
                                                    <option>Marketing</option>
                                                    <option>DCV</option>
                                                    <option>IT</option>
                                                    <option>Public Speaking</option>
                                                </select>
                                                <div
                                                    v-if="$page.errors.jenis"
                                                    class="text-red-500"
                                                >
                                                    {{ $page.errors.jenis[0] }}
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
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    components: {
        AppLayout,
        Welcome,
        vueDropzone: vue2Dropzone

    },
    props: ["data", "errors"],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                gambar: [],
                namaGambar: [],
                judul: null,
                jenis: null
            },
             dropzoneOptions: {
                url: "http://127.0.0.1:8000/dropzone/store/portofolio",
                thumbnailWidth: 150,
                maxFilesize: 5.5,
                maxFiles: 3,
                addRemoveLinks: true,
                 headers : {
                        'X-XSRF-TOKEN': document.head.querySelector('[name="XSRF-TOKEN"]')
                    }
            }
        };
    },
    methods: {
         removeThisFile (file) {

        let FileName = file.name // (I think here is the problem )
        let self = this
        let index = this.form.namaGambar.indexOf(file.name)
        let url = this.form.gambar[index]+'/hapus';
        let finalUrl = url.replace("images", "img")
        axios.get(finalUrl).then(( {data }) => console.log(data));
        // this.$inertia.get(,null);
        this.form.namaGambar.splice(index,1);
        this.form.gambar.splice(index,1);
        console.log( this.form.gambar);
        console.log(this.form.namaGambar)


      },
      uploadSuccess: function(file, response) {

            console.log(file.name)
            console.log("sebelum")
            console.log(this.form.namaGambar);
            console.log(this.form.gambar);
            this.form.namaGambar=[...this.form.namaGambar,file.name]
            this.form.gambar=[...this.form.gambar,response.success];

            console.log("sesudah")
            console.log(this.form.namaGambar);
            console.log(this.form.gambar);
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
                gambar: null,
                judul: null,
                jenis: null
            };
        },
        save: function(data) {
            data.gambar = JSON.stringify(data.gambar)
          console.log(data)
            this.$inertia.post("/admin-panel/portofolio/create", data);
            // data.gambar = JSON.parse(data.gambar)

            this.closeModal();
            this.editMode = false;
        },
        edit: function(data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function(data) {
            data._method = "Patch ";
            this.$inertia.post("/admin-panel/portofolio/update", data);
            this.reset();
            this.closeModal();
        },
        deleteRow: function(data) {
            if (!confirm("Are you sure want to remove?")) return;
            data._method = "DELETE";
            this.$inertia.post("/admin-panel/portofolio/delete", data);
            this.reset();
            this.closeModal();
        }
    }
};
</script>
