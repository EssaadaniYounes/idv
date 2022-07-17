<template>
  <div>
    <div class="card container" style="width: 18rem; margin-top: 100px">
      <div class="card-image">
        <i class="fas fa-shower w-25 p-3 h1"></i>
      </div>
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-user"></i> &nbsp; Login</h5>
        <hr />
        <div class="mb-3 text-start">
          <label class="justify-self-end">Email :</label>
          <input
            type="text"
            v-model="user.email"
            ref="user_email"
            class="form-control"
            autofocus
          />
        </div>
        <div class="mb-3 text-start">
          <label class="justify-self-end">Password :</label>
          <input
            type="password"
            v-model="user.password"
            ref="password"
            class="form-control"
          />
        </div>
        <button class="btn btn-primary btn-lg-12" @click="logIn()">
          <i class="fas fa-sign-in-alt"></i> Login
        </button>
      </div>
    </div>
  </div>
</template>

<script>

import api from '../../mixin';

export default {
  mixins:[api],
  data() {
    return {
      user:{
        email: '',
        password: '',
      }
    };
  },
  methods: {
    async logIn() {
      // validation
      if (this.user.email && this.user.password) {
        let response;
        await this.api('login','post',this.user)
        .then((res)=>{
          if(res.status==200){
            response = res
            this.$notify.success("تم تسجيل الدخول بنجاح!!"); 
          }
        });
        await localStorage.setItem("user_token",response.data.data.token);
        await localStorage.setItem("user",response.data.data.name);
        this.$router.push({name:'Products'})
      }
    },
  },
    mounted() {
        console.log('mounted');

    }
};
</script>

<style>
</style>
