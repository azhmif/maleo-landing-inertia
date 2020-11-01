<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Member Area
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
                    <table class=" table-auto w-full content-center">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row,id) in data" :key="row">
                                <td class="border px-4 py-2">{{ id+1 }}.</td>
                             
                                <td class="border px-4 py-2">
                                    {{ row.name }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.email }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.phone }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.address }}
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                   
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
                pertanyaan: null,
                jawaban: null
            },
        };
    },
    methods: {
       
    }
};
</script>
