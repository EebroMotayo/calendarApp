<template>
    <form>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Feature Image</h5>
            </div>

            <div class="card-body">
                <div class="mb-4">
                    <div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card" style="margin: 0px auto">
                        <div class="card" style="border: none; text-align: center">
                            <div class="card-body">
                                <label>Featured Image</label>
                                <input type="file" @change="updateProfile" data-height="100" name="feature_image" class="dropify">


<!--                                <textarea class="form-control" id="description" rows="5" name="body"></textarea>-->
                                <div ref="summernoteRefElement"></div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-12">
                                        <button @click.prevent="updateInfo" type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</template>

<script>
import {inject, ref} from "vue";

import $ from "jquery";
// You must import summernote js and css for yourself
// https://summernote.org/deep-dive/#callbacks

import * as summernote from  '../summernote/summernote-lite.js';
import * as  css from  '../summernote/summernote-lite.css';

import events from "./events";
if (!window.SUMMERNOTE_DEFAULT_CONFIGS) {
    window.SUMMERNOTE_DEFAULT_CONFIGS = {
        tabsize: 2, height: 350,
        toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']], ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview',]],]
    };
}

export default {
    name: "blogCreate",

    props: {
        modelValue: {
            default: null,
            required: true,
            event: "change",
            validator(value) {
                return (
                    value === null || typeof value === "string" || value instanceof String
                );
            },
        },
        // https://summernote.org/deep-dive/
        config: {
            type: Object,
            default: () => window.SUMMERNOTE_DEFAULT_CONFIGS,
        },
    },

    data(){
        return {
            model: {
                fimage: ""
            },
            elem: null,

        }
    },
    mounted() {
        console.log('Component mounted.')
        this.elem = $(this.$refs.summernoteRefElement);
        this.elem.summernote(this.config);
        $(this.elem).on("summernote.change", this.onChange);
        if (this.modelValue) {
            $(this.elem).summernote("code", this.modelValue);
        }
        this.registerEvents();
    },

    watch: {
        modelValue(newValue) {
            const currValue = $(this.elem).summernote("code");
            if (newValue !== currValue) {
                $(this.elem).summernote("code", newValue);
            }
        },
    },
    methods:{
        updateInfo(){
            //console.log(this.modelValue)
            //this.summerValue = $(this.elem).summernote("code");
            axios.put('/admin/blogcreatee', this.model)
                .then(()=>{

                })
                .catch(() => {

                });

            /*axios.get("api/profile")
                .then(({ data }) => (this.form.fill(data)));*/
        },
        updateProfile(e){
            //console.log('hhhh')
            let file = e.target.files[0];
            let reader = new FileReader();

            let limit = 1024 * 1024 * 2;
            if(file['size'] > limit){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'You are uploading a large file',
                })
                return false;
            }

            reader.onloadend = (file) => {
                //console.log(reader.result)
                //this.form.photo = reader.result;
                this.model['fimage'] = reader.result;
            }
            reader.readAsDataURL(file);
        },

        onChange(event) {
            const value = $(this.elem).summernote("code");
            this.$emit("update:modelValue", value);
        },
        registerEvents() {
            for (var realName in events) {
                this.elem.on(`${realName}`, (...args) => {
                    this.$emit(`${events[realName]}`, ...args);
                });
            }
        },

    },
    beforeUnmount() {
        if (this.elem) {
            this.elem.summernote("destroy");
            this.elem = null;
        }
    },
}
</script>

<style scoped>

</style>
