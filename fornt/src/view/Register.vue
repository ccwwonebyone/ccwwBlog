<template>
<div id="register-form">
  <el-form ref="form" :model="form">
    <el-form-item>
      <el-input v-model="form.username" placeholder="用户名"></el-input>
    </el-form-item>
    <el-form-item>
      <el-input v-model="form.password" type="password" placeholder="密码"></el-input>
    </el-form-item>
    <el-form-item>
      <el-input v-model="form.password_confirm" type="password" placeholder="确认密码"></el-input>
    </el-form-item>
    <el-form-item>
      <el-button type="primary" v-on:click="register" style="width: 100%;text-align: center;">注册</el-button>
      <div style="width: 100%;text-align: center;">or</div>
      <router-link to="/login" style="width: 100%;text-align: center;">已有帐号？登录</router-link>
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
          password: '',
          password_confirm:''
        },
        dom:{
          loginForm:'register-form'
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
        el.style.marginTop  = (screen_height - el_height)/2 + 'px';
        el.style.marginLeft = (screen_width - el_width)/2 + 'px';
      },
      register:function(){
        this.$axios({
          method:'post',
          url:'/admin/user',
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
        });
      },
      toLogin:function(){
        this.$router.push('/login');
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
<style scoped>
  body{
    background-color: #242c39;
  }
  #register-form{
    width: 360px;
    /*height: 200px;*/
    background-color: #fff;
    padding: 45px 30px 10px 30px;
    border-radius:5px;
  }
</style>
