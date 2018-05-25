<template>
<div>
<div style="width: 200px;position: absolute;left: 0px;">

</div>
<div style="margin-left: 190px;">
  <el-card class="box-card" shadow="always">
    <el-dropdown>
  <el-button type="primary">
    {{request.active}}<i class="el-icon-arrow-down el-icon--right"></i>
  </el-button>
  <el-dropdown-menu slot="dropdown">
      <el-dropdown-item v-for="type in request.types" @node-click="methodActive(type)" :key="type">{{type}}</el-dropdown-item>
  </el-dropdown-menu>
</el-dropdown>
  </el-card>
</div>
</div>
</template>

<script>
  export default {
    data() {
      return {
        request:{
          types:['GET','POST','PUT','PATCH','DELETE'],
          active:'GET'
        }
      }
    },
    methods: {
        methodActive:function(type){
          console.log(type);
            this.request.active = type;
        }
    }
  };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
body{
  background-color: #fff;
}
</style>
