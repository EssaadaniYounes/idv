<template>
<div>
    <v-app>
        <div>
            <v-card>
            <header class="row content-header">
        <div class="col-6 content-title">
        <i class="fas fa-list"></i>   <span>{{$t('products.title')}}</span>
        </div>
        <div class="col-6 content-actions clients">
        <router-link class="btn btn-success btn-sm" :to="{name:'AddProduct'}">
        <i class="fas fa-plus"></i> <span>   {{$t('products.add')}}</span>
        </router-link>
        </div>
        </header>

            <v-card-title>
                <v-text-field
                    v-model="search"
                    append-icon="mdi-magnify"
                    :label="$t('products.search')"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                :headers="product_headers"
                :items="products"
                :search="search"
            >
                <template v-slot:item="row">
                    <tr>
                        <td> <img style="width: 100px" :src="$hostname+'/images/products/main_images/'+row.item.main_img"></td>
                        <td> {{row.item.title}}</td>
                        <td> {{row.item.reference}}</td>
                        <td> {{row.item.category_title}}</td>
                        <td> {{row.item.brand}}</td>
                        <td>
                            <router-link :to="{name:'AddProduct',params:{id:row.item.id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></router-link>
                            <button class="btn btn-danger btn-sm" @click="deleteProduct(row.item.id)">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>
                </template>
            </v-data-table>
        </v-card>
        </div>
    </v-app>
</div>

</template>


<script>
import api from '../../../mixin';
export default {
  mixins:[api],
  data(){
    return{
        products:[],
        search:'',
        product_headers:[
          {text:'Image',value:'main_img'},
          {text:'Product Title',value:'title'},
          {text:"Reference",value:'reference'},
          {text:"Category",value:'category_title'},
          {text:"Branch",value:'brand'},
          {text:"",value:''},
        ]
    }
  },
  methods:{
      async getProducts(){
      await this.api('products').then((response)=>{
        this.products = response.data;
      })
    },
      async deleteProduct(id){
          if (confirm(this.$t('dialog.deleteConfirm'))){
              await  this.api('products/'+id, 'delete').then((res)=>{
                  this.getProducts();
              })
          }
      }
    },

  mounted() {
    this.getProducts()
  }
}
</script>

<style scoped>
.functionalities{
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  padding: 5px 10px;
  align-items: center;
}
.functionalities .functionality{
    display: inline-block;
    margin: 20px 10px 0 0;
    padding: 6px 12px;
    background-color: #eee;
    border-radius: 20px;
    font-size: 12px;
    letter-spacing: 1px;
    font-weight: bold;
    color: #666;
    cursor: pointer;
    transition: 0.5s;
}

.functionality:hover{
    background-color: #eff;
}
a{
  color: white !important;
}
</style>
