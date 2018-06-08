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
          <el-button type="primary" v-on:click.native="showParams">参数</el-button>
          <el-button type="success">发送</el-button>
          <el-button type="primary">保存</el-button>
        </el-button-group>
      </el-col>
    </el-row>
    <div style="margin-top: 20px;"></div>
    <key-value-table :params="params"></key-value-table>
  <el-tabs v-model="tabs.active" @tab-click="handleClick">
    <el-tab-pane label="body" name="body">
      <key-value-table :params="bodyParams"></key-value-table>
    </el-tab-pane>
    <el-tab-pane label="权限" name="auth">权限</el-tab-pane>
    <el-tab-pane label="请求头" name="headers">
      <key-value-table :params="headersParams"></key-value-table>
    </el-tab-pane>
  </el-tabs>
</el-card>
<div class="panel">响应</div>
<el-card class="box-card" shadow="always" style="margin-left: 190px;min-width: 800px">
html
</el-card>
</div>
</template>
<script>
  import KeyValueTable from '@/components/KeyValueTable'
  export default {
    data() {
      return {
        request:{
          types:['GET','POST','PUT','PATCH','DELETE'],
          active:'GET',
          url:''
        },
        params:{
          show:false,
          data:[{
            key:'',
            value:'',
            detail:'',
            showdel:false
          }]
        },
        bodyParams:{
          show:true,
          data:[{
            key:'',
            value:'',
            detail:'',
            showdel:false
          }]
        },
        headersParams:{
          show:true,
          data:[{
            key:'',
            value:'',
            detail:'',
            showdel:false
          }]
        },
        tabs:{
          active:'body'
        }
      }
    },
    methods: {
      active:function(item) {   //请求方式
        this.request.active = item;
      },
      showParams:function(){     //显示参数列表
        this.params.show = this.params.show ? false : true;
      },

      handleClick:function(tab,event){

      }
    },
    components: {
      KeyValueTable
    }
  };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
body{
  background-color: #fff;
}
.panel{
  margin-left: 190px;
  min-width: 800px;
  background-color: #909399;
  height: 50px;
  margin-top: 30px 0;
  line-height: 50px;
  color: #fff;
  padding-left: 30px;
  border-radius: 5px;
}
</style>
