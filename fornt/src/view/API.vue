<template>
<div>
<div style="width: 200px;position: absolute;left: 0px;">

</div>
<div style="margin-left: 190px;">
  <el-card class="box-card" shadow="always">
<el-input placeholder="请输入内容" v-model="input5" class="input-with-select">
    <el-select v-model="select" slot="prepend" placeholder="请选择">
      <el-option label="餐厅名" value="1"></el-option>
      <el-option label="订单号" value="2"></el-option>
      <el-option label="用户电话" value="3"></el-option>
    </el-select>
    <el-button slot="append" icon="el-icon-search"></el-button>
  </el-input>
  </el-card>
</div>
</div>
</template>

<script>
  export default {
    data() {
      return {
        input3: '',
        input4: '',
        input5: '',
        select: '',
        request:{
          types:['GET','POST','PUT','PATCH','DELETE'],
          active:'GET',
          url:''
        }
      }
    },
    methods: {
        methodActive:function(type){
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
.el-select .el-input {
  width: 130px;
}
</style>
