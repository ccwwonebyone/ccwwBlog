<template>
<div id="loginForm">
    <!-- <el-col :span="8"><div class="grid-content bg-purple-dark"></div></el-col>
    <el-col :span="8"><div class="grid-content bg-purple-dark">
      <el-input v-model="loginInfo.username" placeholder="用户名"></el-input>
      <el-input v-model="loginInfo.password" type="password" placeholder="密码"></el-input>
    </div></el-col>
    <el-col :span="8"><div class="grid-content bg-purple-dark"></div></el-col> -->
   <!--  <el-form ref="form" :model="form">
      <el-input v-model="loginInfo.username" style="width: 220px;" placeholder="用户名"></el-input>
      <el-input v-model="loginInfo.password" style="width: 220px;" type="password" placeholder="密码"></el-input>
    </el-form> -->
    <el-row type="flex" >
  <el-col :span="8"><div class="grid-content bg-purple"></div></el-col>
  <el-col :span="8"><div class="grid-content bg-purple-light">
    <el-form ref="form" :model="form" label-width="80px">
  <el-form-item label="活动名称">
    <el-input v-model="form.name"></el-input>
  </el-form-item>
  <el-form-item label="活动名称">
    <el-input v-model="form.name"></el-input>
  </el-form-item>
</el-form>
  </div></el-col>
  <el-col :span="8"><div class="grid-content bg-purple"></div></el-col>
</el-row>

</div>
</template>
<script type="text/javascript">
  export default {
    data() {
      return {
        form: {
          name: '',
          region: '',
          date1: '',
          date2: '',
          delivery: false,
          type: [],
          resource: '',
          desc: ''
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
        var screen_height = document.documentElement.clientHeight;
        var el = document.getElementById(elId);
        var el_height = el.clientHeight;
        el.style.marginTop = (screen_height - el_height)/2 + 'px';
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
