<template>
  <div>
    <div id="nav" v-if="$route.name!='Login'">
    <links-header ></links-header>
    </div>
    <div>
      <router-view/>
    </div>
  </div>
</template>
<script>
import Components from "./components";
export default {
  components:{
    'links-header':Components.Header
  }
  
}
</script>
<style>
@import './assets/css/all.min.css';
@import './assets/css/style.css';

#app {
  color: #2c3e50;
}

#nav {
  padding: 0px;
}

#nav a.router-link-exact-active {
  color: #42b983 !important;
}
.v-application a{
    color: white ;
}

</style>
