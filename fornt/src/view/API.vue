<template>
<div>
  <div style="width: 200px;position: absolute;left: 0px;"></div>
  <el-card class="box-card" shadow="always" style="margin-left: 190px;min-width: 800px">
    <el-row>
      <el-col :span="2" style="width: 100px;">
        <el-dropdown>
          <el-button type="primary" style="width: 100px;">
            {{request.active}}<i class="el-icon-arrow-down el-icon--right"></i>
          </el-button>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item v-for="item in request.types" :key="item" v-on:click.native="active(item)">{{item}}</el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>
      </el-col>
      <el-col :span="14">
        <el-input v-model="request.url" placeholder=""></el-input>
      </el-col>
      <el-col :span="6" style="min-width: 210px;">
        <el-button-group>
          <el-button type="warning">参数</el-button>
          <el-button type="primary">发送</el-button>
          <el-button type="success">保存</el-button>
        </el-button-group>
    </el-col>
  </el-row>
  <div style="margin-top: 20px;"></div>
    <el-table
    :data="tableData"
    empty-text=" "
    border
    style="width: 100%">
    <el-table-column
      prop="date"
      label="key"
      width="300">
    </el-table-column>
    <el-table-column
      prop="name"
      label="value"
      width="300">
    </el-table-column>
    <el-table-column
      prop="address"
      label="描述">
    </el-table-column>
  </el-table>
  </el-card>
</div>
</template>
<script>
  export default {
    data() {
      return {
        request:{
          types:['GET','POST','PUT','PATCH','DELETE'],
          active:'GET',
          url:''
        }
      }
    },
    methods: {
      active:function(item) {
        this.request.active = item;
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
