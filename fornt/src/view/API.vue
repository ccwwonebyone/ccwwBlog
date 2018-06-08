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
          <el-button type="warning" v-on:click.native="showParams">参数<i class="el-icon-caret-bottom"></i></el-button>
          <el-button type="primary">发送</el-button>
          <el-button type="success">保存</el-button>
        </el-button-group>
      </el-col>
    </el-row>
    <div style="margin-top: 20px;"></div>
    <KeyValueTable v-model="params"></KeyValueTable>
  <el-tabs v-model="tabs.active" @tab-click="handleClick">
    <el-tab-pane label="body" name="body">用户管理</el-tab-pane>
    <el-tab-pane label="权限" name="auth">配置管理</el-tab-pane>
    <el-tab-pane label="请求头" name="headers">角色管理</el-tab-pane>
  </el-tabs>
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
      showdel:function(index){      //显示删除按钮
        if(index != this.params.data.length-1) this.params.data[index].showdel = true;
      },
      hiddendel:function(index){    //隐藏删除按钮
        if(index != this.params.data.length-1) this.params.data[index].showdel = false;
      },
      removeParam:function(index){    //移除参数
        this.params.data.splice(index,1);
      },
      handleClick:function(tab,event){

      }
    },
    watch:{
      params:{    //参数列表的数据变化
        handler(val,oldVal){
          var data = val.data[val.data.length-1];
          if(data.key || data.value || data.detail) this.params.data.push({key:'',value:'',detail:'',showdel:false});
        },
        deep:true
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
</style>
