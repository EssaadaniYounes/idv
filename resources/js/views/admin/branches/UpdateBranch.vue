<template>
    <div class="row">
        <div class="col-3"></div>
        <v-app class="col-6">
            <div class="modal-body">
                <div class="row justify-content-md-center">
                    <div class="mb-3">
                        <label>Brand :</label>
                        <input type="text" ref="title" class="form-control" v-model="brand.brand">
                    </div>
                    <div class="mb-3">
                        <label>Title :</label>
                        <input type="text" ref="title" class="form-control" v-model="brand.title">
                    </div>
                    <div class="mb-3">
                        <label>Description :</label>
                        <textarea class="form-control" v-model="brand.description"></textarea>

                    </div>
                    <div class="mb-3">
                        <label>Address :</label>
                        <input type="text" class="form-control" v-model="brand.address"/>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Postal Code:</label>
                        <input type="text" class="form-control" v-model="brand.postal_code" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City :</label>
                        <input type="text" class="form-control" v-model="brand.city">
                    </div>
                    <div class="mb-3">
                        <label>Country :</label>
                        <input type="text" class="form-control" v-model="brand.country">
                    </div>
                    <div class="mb-3">
                        <label>Telephone :</label>
                        <input type="text" class="form-control" v-model="brand.tel">
                    </div>
                    <div class="mb-3">
                        <label>Fax :</label>
                        <input type="text" class="form-control" v-model="brand.fax">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" @click="updateBrand">Save Change</button>
            </div>
        </v-app>
    </div>
</template>


<script>
import api from '../../../mixin';
export  default ({
    mixins:[api],
    props:['id'],
    data(){
        return{
            brand:{
                brand:'',
                title:'',
                description:'',
                address:'',
                postal_code:'',
                city:'',
                country:'',
                tel:'',
                fax:''
            }
        }
    },
    methods:{
        async getBrand(){
            await this.api('branches/'+this.id).then((res)=>{
                this.brand = res.data;
            })
        },
        async updateBrand(){
            await this.api('branches/'+this.id,'put',this.brand)
            .then((res)=>{
                if(res.data == 1){
                    this.$router.push({name:'Branches'})
                }
            })
        }
    },
    mounted() {
        this.getBrand();
    }
})
</script>
