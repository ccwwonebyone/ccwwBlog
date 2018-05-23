<template>
<div id="login-form">
  <el-form ref="form" :model="form">
    <el-form-item>
      <el-input v-model="form.username" placeholder="用户名"></el-input>
    </el-form-item>
    <el-form-item>
      <el-input v-model="form.password" type="password" placeholder="密码"></el-input>
    </el-form-item>
    <el-form-item>
      <el-button type="text">忘记密码？</el-button>
      <el-button type="primary" style="margin-left: 214px;" v-on:click="login">登录</el-button>
    </el-form-item>
  </el-form>
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
      vetical:function(elId){
        var screen_height   = document.documentElement.clientHeight;
        var screen_width    = document.documentElement.clientWidth;
        var el              = document.getElementById(elId);
        var el_height       = el.clientHeight;
        var el_width        = el.clientWidth;
        console.log(screen_height,screen_width,el_height,el_width);
        el.style.marginTop  = (screen_height - el_height)/2 + 'px';
        el.style.marginLeft = (screen_width - el_width)/2 + 'px';
      },
      login:function(){
        this.$axios({
          method:'post',
          url:'user/login',
          data:this.form
        })
        .then(response => {
          if(response.data.code == '200'){
            var type = 'success';
          }else{
            var type = 'error';
          }
          this.$message({
            message: response.data.message,
            type: type
          });
          if(response.data.code == '200') window.location.href = '#/';
        });
      }
    },
    mounted:function(){       //挂载完成时
      var self = this;
      self.vetical(self.dom.loginForm);
      window.onresize = function(){
          self.vetical(self.dom.loginForm);
       }
    }
  }
</script>
<style type="text/css">
  body{
    background-color: #242c39;
  }
  #login-form{
    width: 360px;
    height: 200px;
    background-color: #fff;
    padding: 45px 30px 0 30px;
    border-radius:5px;
  }
</style>
