<template>
<div >
  <el-form ref="form" :model="form" id="loginForm" style="background-color: #fff;width: 300px;">
    <el-form-item>
      <el-input v-model="form.username" placeholder="用户名"></el-input>
    </el-form-item>
    <el-form-item>
      <el-input v-model="form.password" type="password" placeholder="密码"></el-input>
    </el-form-item>
    <el-form-item>
      <el-button type="text">忘记密码？</el-button>
      <el-button type="primary">登录</el-button>
    </el-form-item>
  </el-form>
</div>
</template>
<script type="text/javascript">
  export default {
    data() {
      return {
        form: {
          username: 'admin',
          password: ''
        },
        dom:{
          loginForm:'loginForm'
        }
      }
    },
    methods: {
      onSubmit() {
        console.log('submit!');
      },
      vetical:function(elId){
        var screen_height   = document.documentElement.clientHeight;
        var screen_width    = document.documentElement.clientWidth;
        var el              = document.getElementById(elId);
        var el_height       = el.clientHeight;
        var el_width        = el.clientWidth;
        console.log(screen_height,screen_width,el_height,el_width);
        el.style.marginTop  = (screen_width - el_height)/2 + 'px';
        el.style.marginLeft = (screen_height - el_width)/2 + 'px';
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

	/*export default{
		name:'login',
		data(){
			return {
				info:'ManPro',
        message:'',
        alert:false,
        dom:{
            loginForm:'loginForm'
        },
        loginInfo:{
            username:'admin',
            password:''
        },
			}
		},
		methods:{
			vetical:function(elId){
				var screen_height = document.documentElement.clientHeight;
        var el = document.getElementById(elId);
        var el_height = el.clientHeight;
        el.style.marginTop = (screen_height - el_height)/2 + 'px';
			},
      login:function(){
        var self = this;
        this.$axios({
          method:'post',
          url:'/user/login',
          data:this.loginInfo
        })
        .then(function(response){
          self.alert = true;
          self.message = response.data.message;
        });
      },
      close_alert:function(){
        this.alert = false;
      }
		},
		mounted:function(){       //挂载完成时
			var self = this;
      self.vetical(self.dom.loginForm);
      window.onresize = function(){
          self.vetical(self.dom.loginForm);
       }
		}
	}*/
</script>
<style type="text/css">

</style>
