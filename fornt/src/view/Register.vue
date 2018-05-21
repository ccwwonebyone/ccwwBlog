<template>
  <div>
    注册页面
  </div>

</template>
<script type="text/javascript">
  export default{
    name:'register',
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
    }
  }
</script>
<style type="text/css">

</style>
