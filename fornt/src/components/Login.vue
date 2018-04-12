<template>
	<div class="container">
		<div id="loginForm">
            <div class="row">
                <div class="col-xs-6 col-sm-4"></div>
                <div id="form-inner" class="col-xs-6 col-sm-4">
                    <form class="form-horizontal">
                      <div class="form-group">
                          <input type="text" class="form-control" id="inputPassword" placeholder="用户名">
                      </div>
                      <div class="form-group">
                          <input type="password" class="form-control" id="inputPassword" placeholder="密码">
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
				info:'ManPro'
			}
		},
		methods:{
			init:function(){
				console.log(document.documentElement.clientHeight);
			}
		},
		created:function(){
			this.init();
			console.log(window.screen.availHeight);
		}
	}
</script>
<style type="text/css">
	#loginForm{
		margin-top: 300px;
	}
    #form-inner{
        height: 250px;
        border: 1px solid silver;
    }
</style>
