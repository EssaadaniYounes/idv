<template>
    <div class="row">
      <div class="col-3"></div>
        <v-app class="col-6">
              <div class="modal-body">
                 <div class="row justify-content-md-center">
                <div class="mb-3">
                  <label>{{$t('products.productTitle')}} :</label>
                  <input type="text" ref="title" class="form-control" v-model="product.title">
                </div>
                <div class="mb-3">
                  <label>{{$t('products.productReference')}} :</label>
                  <input type="text" ref="title" class="form-control" v-model="product.reference">
                </div>
                <div class="mb-3">
                  <label>{{$t('products.productCategory')}} :</label>
                  <select class="form-control" v-model="product.category_id">
                      <option v-for="category in categories" :value="category.id" :key="category.id">
                          {{ category.title }}
                      </option>
                  </select>
                </div><div class="mb-3">
                  <label>Branch :</label>
                  <select class="form-control" v-model="product.branch_id" >
                    <option v-for="branch in branches" :key="branch.id" :value="branch.id">{{branch.brand}}</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label>{{$t('products.productDescription')}} :</label>
                  <textarea class="form-control" v-model="product.description"></textarea>
                </div>
                <div class="mb-3 row">
                    <div class="col-5">
                        <img id="main_prv"  style="width: 100px" :src="'/images/products/main_images/'+product.main_img">
                    </div>
                    <div class="col-6">
                      <label class="form-label">{{ $t('products.mainImage') }} :</label>
                      <input class="form-control" type="file" ref="main_img" accept=".png, .jpg, .jpeg" @change="readMainImageUrl($event)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-5">
                        <img  v-for="img in product.extra_imgs"
                              :key="img" :src="'/images/products/extra/'+img "
                              class="extra_img"
                              style="width: 100px; max-height: 120px"
                              alt="">
                    </div>
                    <div class="col-6">
                      <label class="form-label">{{ $t('products.subImages') }} :</label>
                      <input class="form-control" type="file" ref="extra_imgs" accept=".png, .jpg, .jpeg" multiple @change="readExtraImagesUrl($event)">
                    </div>
                </div>
                <div class="mb-3">
                  <label>{{$t('products.productVideoLink')}} :</label>
                  <input type="text" ref="title" class="form-control" v-model="product.video_link">
                </div>
                <div class="mb-3">
                  <label>{{$t('products.productFonctionalities')}} : <b>Click Enter To Add Item</b></label>
                  <input type="text" ref="title" class="form-control" v-model="functionality" @keyup="addFunctionality">
                  <div class="functionalities">
                    <span v-for="functionality in product.functionalities" :key="functionality" class="functionality">{{functionality}}</span>
                  </div>
                </div>
              </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-primary" v-if="!id" @click="postProduct">Save</button>
                <button type="button" class="btn btn-warning" v-else  @click="editProduct">Save</button>
              </div>
        </v-app>
    </div>
</template>

<script>

import api from '../../../mixin/'
export default {
  props:["id"],
  mixins:[api],
  data(){
    return{
          functionality:'',
          branches : [],
          categories : [],
          product:{
          title :'',
          reference  :'',
          category_id :'',
          branch_id:0,
          description :'',
          video_link :'',
          main_img  :'',
          extra_imgs :[],
          functionalities :[],
        },
    }
  },

  methods:{
    readMainImageUrl(e){
      let img = document.querySelector(`#main_prv`);
      let file = this.$refs.main_img.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function (e) {
          img.setAttribute('src', e.target.result);
      }
    },
    readExtraImagesUrl(e){
        let images = document.querySelectorAll('.extra_img');
        let extra_images = this.$refs.extra_imgs;

        for (let i = 0; i < extra_images.files.length; i++) {
            let file = extra_images.files[i];
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function (e) {
                //console.log( e.target.result);
                images[i].setAttribute('src', e.target.result);
            }
        }
    },

    addFunctionality(e){
    if(e.key =="Enter"){
    this.product.functionalities.push(this.functionality);
    this.functionality='';
    }
    },
    uploadFile(e, type) {
    if(type == 'single'){
        this.product.main_img = this.$refs.main_img.files[0];
    }
    },

    async postMainImage(){
        //main img code
            const mainImgData = new FormData();
            mainImgData.append('main_img',this.$refs.main_img.files[0]);
            await this.api('products/store_imgs','post',mainImgData).then((response)=>{
                //console.log(response.data.file);
                this.product.main_img = response.data.file;
            });
    },
    async postExtrasImages() {
    //extra images code
        this.product.extra_imgs = [];
        const formData = new FormData();
        let TotalImages = this.$refs.extra_imgs.files.length;
            let images = this.$refs.extra_imgs;
            for (let i = 0; i < TotalImages; i++) {
                formData.append('images' + i, images.files[i]);
                this.product.extra_imgs[i] = images.files[i].name;
            }
            formData.append('TotalImages', TotalImages);
            await this.api('products/store_imgs','post',formData).then(()=>{
                console.log(this.product.extra_imgs)
            });
    },

    async getProduct(){
        await this.api('products/'+this.id).then((res)=>{

            this.product = res.data;
            this.product.extra_imgs=JSON.parse(res.data.extra_imgs);
            this.product.functionalities=JSON.parse(res.data.functionalities);
        })
    },
    async postProduct(){
        await this.postMainImage();
        await this.postExtrasImages();
        this.api('products','post',this.product).then((response)=>{
            if(response.status == 200){
                this.$router.push({name:'Products'})
            }
        })
    },
    async editProduct(){
        //if(this.$refs.main_img.files.length>0 && this.$refs.extra_imgs.length>0){
            await this.postMainImage();
            await this.postExtrasImages();
        //}
        await this.api('products/'+this.id,'put',this.product).then((res)=>{
            if(res.status == 200){
                this.$router.push({name:'Products'})
            }
        })
    },

    async getBranches(){
    await this.api('branches').then((response)=>{
    this.branches = response.data;
    })
    },
    async getCategories(){
        await this.api('categories').then((res)=>{
            this.categories = res.data;
        });
    }

  },
  mounted() {
      if(this.id){
          this.getProduct();

      }
      this.getBranches();
      this.getCategories();
  }
}
</script>

<style>
.functionality{
  padding: 0 1.5rem;
  background-color: #dadbd9;
  border-radius: 8px;
  font-weight: 700;
}
.functionalities{
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 1.5rem;
  padding-top: 1rem;
}
</style>
