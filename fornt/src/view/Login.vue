<template>
	<div class="container">
		<div id="loginForm">
            <div class="row">
                <div class="col-xs-6 col-sm-4"></div>
                <div id="form-inner" class="col-xs-6 col-sm-4">
                    <form class="form-horizontal">
                      <div class="form-group">
                          <input type="text" v-bind:value="loginInfo.username" class="form-control" placeholder="用户名">
                      </div>
                      <div class="form-group">
                          <input type="password" v-bind:value="loginInfo.password" class="form-control" placeholder="密码">
                      </div>
                    </form>
                </div>
                <!-- Optional: clear the XS cols if their content doesn't match in height -->
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-6 col-sm-4"></div>
            </div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
		name:'login',
		data(){
			return {
				info:'ManPro',
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

</style>
