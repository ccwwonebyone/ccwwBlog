<template>
<div id="login_body">
  <div id="login-form">
    <el-form ref="form" :model="form">
      <el-form-item>
        <el-input v-model="form.username" placeholder="用户名"></el-input>
      </el-form-item>
      <el-form-item>
        <el-input v-model="form.password" type="password" placeholder="密码"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" style="margin-left: 280px;" v-on:click="login()">登录</el-button>
      </el-form-item>
    </el-form>
  </div>
</div>
</template>
<script type="text/javascript">
  export default {
    data() {
      return {
        form: {
          username: '',
          password: ''
        },
        dom:{
          loginForm:'login-form'
        }
      }
    },
    methods: {
      login:function(){
        this.$axios({
          method:'post',
          url:'/admin/user/login',
          data:this.form
        })
        .then(response => {
          if(response.data.code == 200){
              sessionStorage.setItem("username",this.form.username);
              this.$root.$data.username = this.form.username;
              this.$router.push('/company');
          }
        });
      }
    }
  }
</script>
<style>
  #login_body{
    background-color: #242c39;
    width: 100%;
    height: 100%;
    position: relative;
    /*display: table-cell;*/
    /*vertical-align: middle;*/
    /*text-align: center;*/
  }
  #login-form{
    width: 360px;
    height: 200px;
    background-color: #fff;
    padding: 45px 30px 0 30px;
    border-radius:5px;
    position: absolute;
    margin: auto;
    top: 0; left: 0; bottom: 0; right: 0;
  }
</style>
