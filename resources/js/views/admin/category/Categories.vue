<template>
  <div>
    <v-app>

      <!-- Categories List -->
        <div>
          <v-card >
              <header class="row content-header">
                <div class="col-6 content-title">
                  <i class="fas fa-list"></i>   <span>{{ $t("categories.title") }}</span>
                </div>
                <div class="col-6 content-actions clients">
                  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#CategoryAdd">
                    <i class="fas fa-plus"></i> <span>   {{ $t("categories.add") }}</span>
                  </button>
                </div>
              </header>
              <v-card-title>
                    <v-text-field
                  v-model="search"
                  append-icon="mdi-magnify"
                  :label="$t('categories.search')"
                  single-line
                  hide-details
                ></v-text-field>
              </v-card-title>
              <v-data-table
                :headers="category_headers"
                :items="categories"
                :search="search"
              >
              <template v-slot:item="row">
                    <tr>
                      <td> {{row.item.title}}</td>
                      <td>
                          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#CategoryUpdate" @click="showData(row.item)"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-sm" @click="deleteCategory(row.item.id)">
                              <i class="fas fa-times"></i>
                          </button>
                      </td>
                    </tr>
                </template>
              </v-data-table>

          </v-card>
        </div>
      <!--------------------------------->

      <!-- Modals -->
        <!-- Add -->
        <div class="modal fade" id="CategoryAdd" tabindex="-1" aria-labelledby="CategoryAddLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="CategoryAddLabel">{{ $t('categories.addCategory') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ref="CategoryAddClose"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label>{{ $t('categories.categoryTitle') }} :</label>
                  <input type="text" ref="title" class="form-control" v-model="category.title">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="addCategory">{{ $t('categories.save') }}</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Update -->
        <div class="modal fade" id="CategoryUpdate" tabindex="-1" aria-labelledby="CategoryUpdateLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="CategoryUpdateLabel">{{ $t('categories.updateCategory') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ref="CategoryUpdateClose"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" v-model="id">
                <div class="mb-3">
                  <label>{{ $t('categories.categoryTitle') }} :</label>
                  <input type="text" ref="title" class="form-control" v-model="category.title">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="updateCategory">{{ $t('categories.save') }}</button>
              </div>
            </div>
          </div>
        </div>
      </v-app>
  </div>
</template>

<script>
import api from '../../../mixin/';
export default {

  mixins:[api],
  data(){
    return{
      id:'',
      categories:[],
      category:{title:''},//title
      search:'',
      category_headers:[
        {text:this.$t('categories.titles'),value:'title'},
        {text:"",value:''},
        ]
    }
  },

  methods:{
    async getCategories(){
      await this.api('categories').then((response)=>{
        this.categories = response.data;
      })
    },

    async addCategory(){
      await this.api('categories','post',this.category).then((response)=>{
        this.getCategories();
        this.$refs.CategoryAddClose.click();
        this.category.title="";
        this.handleResponse(response,this.$t('dialog.addMessage'))
      })
    },

    async deleteCategory(id){
      if(confirm(this.$t('dialog.deleteConfirm'))){

        await this.api('categories/' + id, 'delete').then((response)=>{
        this.getCategories();
        this.handleResponse(response,this.$t('dialog.deleteMessage'))
      })
      }
    },

    async updateCategory(){
      await this.api('categories/' + this.id, 'put', this.category).then((response)=>{
        this.getCategories();
        this.$refs.CategoryUpdateClose.click();
        this.category.title="";
        this.handleResponse(response,this.$t('dialog.updateMessage'))
      })
    },

    showData(category){
      this.id = category.id;
      this.category.title = category.title;

    },

    handleResponse(response,message){
      if(response.status==200){
        this.$notify.success(message);
      }
      if(response.status==401){
        this.$notify.info("غير مصرح لك الدخول")
        this.$router.push({name:'Login'});
      }
      if(response.status==404){
        this.$notify.warning("هذه الصفحة غير موجودة")
      }
    }
  },

  mounted(){
    this.getCategories();

  }
}
</script>

<style>

</style>
