<template>
<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="navbar-brand logo">
        <img src="/assets/img/logo.png" alt="" style="width: 140px"> &nbsp;
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-10 ">

           <li class="nav-item dropdown">

           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <span>
               <i class="fas fa-language"></i>
             </span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

              <li class="nav-item " @click="changeLocale('en')">
                <span class="dropdown-item">en</span>
              </li>
              <li class="nav-item " @click="changeLocale('ar')">
                <span class="dropdown-item">ar</span>
              </li>
              <li class="nav-item " @click="changeLocale('es')">
                <span class="dropdown-item">es</span>
              </li>

           </ul>

         </li>
            <li class="nav-item">
              <router-link class="nav-link active" :to="{name:'Categories'}" aria-current="page">
                <span><i class="fas fa-stream" ></i>
                {{ $t('main.categories') }} </span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name:'Products'}">
              <span><i class="fas fa-sitemap"></i>
               {{ $t('main.products') }}</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{name:'Branches'}">
              <span><i class="fas fa-code-branch"></i>
               {{ $t('main.branchs') }}</span>
              </router-link>
            </li>
          <li class="nav-item">
             <span class="nav-link">
                 <span>
                      <i class="fas fa-user"/>
                      {{current_user}}
                 </span>
             </span>

          </li>
          <li class="nav-item">
              <a href="/" class="nav-link" >
                  <span>
                      <i class="fas fa-sign-out-alt"/>
                      Logout
                  </span>
              </a>
          </li>
      </ul>
    </div>
  </div>
</nav>
</div>
</template>

<script>


export default {
    data(){
      return{
        current_user:{'name':''}
      }
    },
    methods:{
      changeLocale(language) {
        this.$i18n.locale = language;
        localStorage.setItem('lang',language);
        if (language == 'ar') {
            document.querySelector('html').classList.add('is-rtl')
        }
        else{
          document.querySelector('html').classList.remove('is-rtl')
        }
      },
      redirect(){
          this.$router.push('/');
      }

    },
    mounted(){
      this.current_user = localStorage.getItem('user');
      this.changeLocale(localStorage.getItem('lang'));
    }
}
</script>

<style>

li{
  color: white !important;
}
.navbar{
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 50px;
  background-color: #222;

  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  z-index: 3;
  position: relative;
}
.navbar .logo {
    margin: 0 30px 0 0;
    color: white;
}
.navbar ul{
  margin-left: 5px;
  transition: 0s;
}
.navbar li:hover{
    color: #444;
}
.navbar ul li a,
.navbar-dark .navbar-nav .nav-link {
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    font-family: 'Cairo', sans-serif;
    display: flex;
    align-items: center;
    gap: 40px;
    min-width: 100px;
    position: relative;
    color: #f5f5f5 !important;
}
.navbar ul li:hover> :not( a.active),.navbar ul li:hover> :not( a.active) i{
  color: #fff !important;
}


.hamburger{
  display: none;
  height: 30px;
  padding-top: 5px;
  margin-left: 15px;
  cursor: pointer;
}
.line{
  width: 20px;
  height: 3px;
  display: block;
  background-color: rgb(255, 255, 255);
  margin: 3px;
}
@media (max-width:767px){
  .hamburger{
    display: block;
  }
  ul.nav{
    width: 0px;
    opacity: 0;
    margin-top: 50px;
  }
  ul.active{
    visibility:visible;
    background-color: red;
    display: flex;
    flex-direction: column;
    opacity: 1;
    position: absolute;
    right: -5px;
    top: 0px;
    width: 40%;
    height: 92vh;
    align-items: center;
    padding-top: 60px;
    transition: 1s cubic-bezier(0.075, 0.82, 0.165, 1);
  }
  ul.active li{
    margin-bottom: 40px;
  }
  ul li a{
min-width: 150px;  }
}


@media (min-width: 992px){
  .navbar-expand-lg .navbar-collapse {
      justify-content: flex-end;
  }
}

.dropdown-item.router-link-active{

  color: #333 !important;
}
@media (max-width:991px){
#navbarNavDropdown{
    margin: 2px 0px 0px;
    background: #2125299e;
    min-width: 100vw;
    position: absolute;
    top: 48px;
    left: 0px;
    padding: 10px 25px;
}}
</style>
