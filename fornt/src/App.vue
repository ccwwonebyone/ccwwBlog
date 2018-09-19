<template>
  <div id="app">
    <template v-if="this.$route.name.toLowerCase() == 'login'">
      <router-view/>
    </template>
    <template v-else>
      <div>
        <div class="content-title">
          <img v-bind:src="this.$root.$data.web_company.brand" width="200" height="70" v-bind:alt="this.$root.$data.web_company.name">
            <template v-if="this.$root.$data.username">
              <div id="user">
                <el-dropdown>
                  <span class="el-dropdown-link">
                    <img v-bind:src="this.$root.$data.web_company.header" width="32" height="32" style="border-radius: 25px;" class="el-icon-arrow-down el-icon--right">
                  </span>
                  <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item disabled>{{this.$root.$data.username}}</el-dropdown-item>
                    <el-dropdown-item>
                      <el-button type="text">修改密码</el-button>
                    </el-dropdown-item>
                    <el-dropdown-item>
                      <el-button type="text" @click="loginOut()">退出登录</el-button>
                    </el-dropdown-item>
                  </el-dropdown-menu>
                </el-dropdown>
              </div>
            </template>
        </div>
      </div>
      <div style="height:100%;">
        <el-scrollbar class="content-left" style="height:100%;">
        <nav-menu></nav-menu>
        <div class="copy">copyright©️<el-button type="text">{{this.$root.$data.web_company.copyright}}</el-button></div>
        </el-scrollbar>
        <el-scrollbar  style="height:100%;padding-left:300px;">
          <router-view/>
        </el-scrollbar>
      </div>

    </template>
  </div>
</template>

<script>
import NavMenu from '@/components/NavMenu'

export default {
  name: 'App',
  components: {
      NavMenu
  },
  methods:{
    loginOut(){
      this.$axios({
        method:'post',
        url:'/admin/user/login_out'
      })
      .then(response => {
        this.$root.$data.username = '';
        this.$router.push('/login');
      })
    }
  },
  beforeCreate(){
    this.$router.beforeEach((to, from, next) => { //全局钩子函数
      to.matched.some((route) => {
          if(route.path != '/login' && this.$root.$data.username == ''){
            next('/login')
          }else{
            next()
          }
      });
    });
    this.$axios({
      method:'get',
      url:'/admin/profile'
    })
    .then(response => {
      if(response.data.data){
        this.$root.$data.username = response.data.data.username;
      }else{
        this.$router.push('/login');
      }
    })
    this.$axios({
      method:'get',
      url:'/admin/company'
    })
    .then( response => {
      this.$root.$data.web_company = response.data.data
    })
  }
}
</script>

<style>
body,html{
	margin: 0;
	padding: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
#app{
  width: 100%;
  height:100%;
  overflow-y: hidden;
  min-height: auto;
}
.content-left{
  width: 300px;
  position: fixed;
  background-color: #545c64;
  z-index: 1500;
}
.copy{
  color: #fff;
  position: fixed;
  bottom: 20px;
  left: 20px;
}
.content-title{
  color: #fff;
  height: 70px;
  font-size: 60px;
  line-height: 60px;
  padding-left: 30px;
  background-color: #343a40;
}
#user{
  color: #fff;
  float: right;
  margin-right: 100px;
  margin-top: 0;
  margin-bottom: 0;
}
.el-scrollbar__wrap {
  overflow-x: hidden;
}
</style>
